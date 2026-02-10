<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Mail\BookingConfirmationMail;
use App\Mail\BookingNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;

class BookingController extends Controller
{
    /**
     * Display the booking page for a specific host.
     */
    public function index(User $host)
    {
        // Ensure the user has booking configuration
        if (!$host->timezone) {
            $host->update([
                'timezone' => 'UTC',
                'working_hours_start' => '09:00:00',
                'working_hours_end' => '17:00:00',
                'working_days' => '1,2,3,4,5'
            ]);
        }

        return view('booking', compact('host'));
    }

    /**
     * Get calendar data for AJAX requests.
     */
    public function calendar(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'host_id' => 'required|exists:users,id',
                'month' => 'required|integer|between:1,12',
                'year' => 'required|integer',
                'timezone' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $host = User::findOrFail($request->host_id);
            $timezone = $request->timezone;
            $month = $request->month;
            $year = $request->year;

            // Validate timezone
            try {
                $testDate = Carbon::now($timezone);
            } catch (\Exception $e) {
                \Log::error('Invalid timezone', ['timezone' => $timezone, 'error' => $e->getMessage()]);
                return response()->json(['error' => 'Invalid timezone provided'], 422);
            }

            // Create Carbon instance for the first day of the month
            $date = Carbon::create($year, $month, 1, 0, 0, 0, $timezone);

            // Get the first day of the calendar (Sunday of the week containing the 1st)
            $startDay = $date->copy()->startOfMonth()->startOfWeek(Carbon::SUNDAY);

            // Get the last day of the calendar (Saturday of the week containing the last day)
            $endDay = $date->copy()->endOfMonth()->endOfWeek(Carbon::SATURDAY);

            $calendar = [];
            $currentDay = $startDay->copy();

            // Note: We don't mark entire dates as unavailable anymore
            // Only individual time slots are checked for availability
            // This allows multiple bookings per day

            while ($currentDay->lte($endDay)) {
                // Ensure we compare against the original month in the requested timezone
                $isCurrentMonth = $currentDay->format('Y-m') === $date->format('Y-m');
                $isToday = $currentDay->isToday();
                $isWorkingDay = in_array($currentDay->dayOfWeek, $host->working_days_array);
                $isFuture = $currentDay->isFuture() || $currentDay->isToday();

                $calendar[] = [
                    'date' => $currentDay->format('Y-m-d'),
                    'day' => $currentDay->day,
                    'is_current_month' => $isCurrentMonth,
                    'is_today' => $isToday,
                    'is_booked' => false, // Never mark entire day as booked
                    'is_future' => $isFuture,
                    'is_available' => $isCurrentMonth && $isWorkingDay && $isFuture,
                    'is_working_day' => $isWorkingDay
                ];

                $currentDay->addDay();
            }

            return response()->json([
                'calendar' => $calendar,
                'month_name' => $date->format('F Y'),
                'prev_month' => $date->copy()->subMonth()->month,
                'prev_year' => $date->copy()->subMonth()->year,
                'next_month' => $date->copy()->addMonth()->month,
                'next_year' => $date->copy()->addMonth()->year
            ]);
        } catch (\Exception $e) {
            \Log::error('Calendar generation error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return response()->json(['error' => 'Error generating calendar: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Get available time slots for a specific date.
     */
    public function slots(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'host_id' => 'required|exists:users,id',
            'date' => 'required|date_format:Y-m-d',
            'timezone' => 'required|string'
        ]);

        if ($validator->fails()) {
            \Log::info('Slot validation failed', [
                'errors' => $validator->errors()->toArray(),
                'request_data' => $request->all()
            ]);
            return response()->json(['error' => $validator->errors()], 422);
        }

        $host = User::findOrFail($request->host_id);
        $date = Carbon::createFromFormat('Y-m-d', $request->date)->setTimezone($request->timezone);
        $timezone = $request->timezone;

        \Log::info('Slot request received', [
            'requested_date' => $request->date,
            'parsed_date' => $date->format('Y-m-d'),
            'requested_timezone' => $timezone,
            'day_of_week' => $date->dayOfWeek,
            'is_working_day' => in_array($date->dayOfWeek, $host->working_days_array),
            'is_future' => $date->isFuture(),
            'working_days' => $host->working_days_array
        ]);

        // Check if it's a working day
        if (!in_array($date->dayOfWeek, $host->working_days_array)) {
            \Log::info('Not a working day', [
                'date' => $date->format('Y-m-d'),
                'day_of_week' => $date->dayOfWeek,
                'working_days' => $host->working_days_array
            ]);
            return response()->json(['slots' => []]);
        }

        // Check if date is in the future
        if (!$date->isFuture()) {
            \Log::info('Date is not in future', [
                'date' => $date->format('Y-m-d'),
                'is_future' => $date->isFuture()
            ]);
            return response()->json(['slots' => []]);
        }

        // Get working hours in the host's timezone
        $workingStart = Carbon::createFromTimeString($host->working_hours_start)->setTimezone($host->timezone);
        $workingEnd = Carbon::createFromTimeString($host->working_hours_end)->setTimezone($host->timezone);

        // Generate slots in host timezone, then convert to requested timezone
        $slots = [];
        $slotDuration = 15; // minutes

        // Create working day in host timezone
        $workingDayHost = $workingStart->copy()->setDate($date->year, $date->month, $date->day);
        $workingEndHost = $workingEnd->copy()->setDate($date->year, $date->month, $date->day);

        // Generate 15-minute slots in host timezone
        $currentSlot = $workingDayHost->copy();

        while ($currentSlot->lt($workingEndHost)) {
            // Check for conflicts with existing bookings
            $slotStartUTC = $currentSlot->copy()->setTimezone('UTC');
            $slotEndUTC = $currentSlot->copy()->addMinutes($slotDuration)->setTimezone('UTC');

            $conflict = Booking::where('user_id', $host->id)
                ->where('status', 'confirmed')
                ->where(function ($query) use ($slotStartUTC, $slotEndUTC) {
                    $query->whereBetween('start_time', [$slotStartUTC, $slotEndUTC])
                          ->orWhereBetween('end_time', [$slotStartUTC, $slotEndUTC])
                          ->orWhere(function ($q) use ($slotStartUTC, $slotEndUTC) {
                              $q->where('start_time', '<', $slotStartUTC)
                                ->where('end_time', '>', $slotEndUTC);
                          });
                })
                ->exists();

            if (!$conflict) {
                // Convert slot times to requested timezone for display
                $slotStartRequested = $currentSlot->copy()->setTimezone($request->timezone);
                $slotEndRequested = $currentSlot->copy()->addMinutes($slotDuration)->setTimezone($request->timezone);

                $slots[] = [
                    'time' => $slotStartRequested->format('H:i'),
                    'display_time' => $slotStartRequested->format('g:i A'),
                    'start_time' => $slotStartUTC->format('Y-m-d H:i:s'),
                    'end_time' => $slotEndUTC->format('Y-m-d H:i:s')
                ];
            }

            $currentSlot->addMinutes($slotDuration);
        }

        \Log::info('Generated slots', [
            'date' => $request->date,
            'timezone' => $request->timezone,
            'host_timezone' => $host->timezone,
            'slot_count' => count($slots),
            'working_start_host' => $workingDayHost->format('Y-m-d H:i:s T'),
            'working_end_host' => $workingEndHost->format('Y-m-d H:i:s T'),
            'first_slot' => $slots[0] ?? null,
            'last_slot' => end($slots) ?? null
        ]);

        return response()->json([
            'date' => $request->date,
            'timezone' => $request->timezone,
            'slots' => $slots
        ]);
    }

    /**
     * API endpoint for available slots (as suggested in requirements)
     */
    public function availableSlots(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'timezone' => 'required|string',
            'host_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $host = User::findOrFail($request->host_id);
        $date = Carbon::createFromFormat('Y-m-d', $request->date)->setTimezone($request->timezone);

        // Check if it's a working day
        if (!in_array($date->dayOfWeek, $host->working_days_array)) {
            return response()->json(['slots' => []]);
        }

        // Check if date is in the future
        if (!$date->isFuture()) {
            return response()->json(['slots' => []]);
        }

        // Get working hours in the specified timezone
        $workingStart = Carbon::createFromTimeString($host->working_hours_start)->setTimezone($host->timezone);
        $workingEnd = Carbon::createFromTimeString($host->working_hours_end)->setTimezone($host->timezone);

        // Convert to requested timezone for slot calculation
        $workingStartLocal = $workingStart->copy()->setDate($date->year, $date->month, $date->day)->setTimezone($request->timezone);
        $workingEndLocal = $workingEnd->copy()->setDate($date->year, $date->month, $date->day)->setTimezone($request->timezone);

        $slots = [];
        $slotDuration = 15; // minutes

        // Generate 15-minute slots
        $currentSlot = $workingStartLocal->copy();

        while ($currentSlot->lt($workingEndLocal)) {
            // Check for conflicts with existing bookings
            $slotStartUTC = $currentSlot->copy()->setTimezone('UTC');
            $slotEndUTC = $currentSlot->copy()->addMinutes($slotDuration)->setTimezone('UTC');

            $conflict = Booking::where('user_id', $host->id)
                ->where('status', 'confirmed')
                ->where(function ($query) use ($slotStartUTC, $slotEndUTC) {
                    $query->whereBetween('start_time', [$slotStartUTC, $slotEndUTC])
                          ->orWhereBetween('end_time', [$slotStartUTC, $slotEndUTC])
                          ->orWhere(function ($q) use ($slotStartUTC, $slotEndUTC) {
                              $q->where('start_time', '<', $slotStartUTC)
                                ->where('end_time', '>', $slotEndUTC);
                          });
                })
                ->exists();

            if (!$conflict) {
                $slots[] = [
                    'time' => $currentSlot->format('H:i'),
                    'display_time' => $currentSlot->format('g:i A'),
                    'start_time' => $slotStartUTC->format('Y-m-d H:i:s'),
                    'end_time' => $slotEndUTC->format('Y-m-d H:i:s')
                ];
            }

            $currentSlot->addMinutes($slotDuration);
        }

        return response()->json([
            'date' => $request->date,
            'timezone' => $request->timezone,
            'slots' => $slots
        ]);
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'host_id' => 'required|exists:users,id',
            'guest_first_name' => 'required|string|max:255',
            'guest_last_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:50',
            'guest_timezone' => 'required|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $host = User::findOrFail($request->host_id);

        // Check for conflicts
        $startTimeUTC = Carbon::createFromFormat('Y-m-d H:i:s', $request->start_time, 'UTC');
        $endTimeUTC = Carbon::createFromFormat('Y-m-d H:i:s', $request->end_time, 'UTC');

        $conflict = Booking::where('user_id', $host->id)
            ->where('status', 'confirmed')
            ->where(function ($query) use ($startTimeUTC, $endTimeUTC) {
                $query->whereBetween('start_time', [$startTimeUTC, $endTimeUTC])
                      ->orWhereBetween('end_time', [$startTimeUTC, $endTimeUTC])
                      ->orWhere(function ($q) use ($startTimeUTC, $endTimeUTC) {
                          $q->where('start_time', '<', $startTimeUTC)
                            ->where('end_time', '>', $endTimeUTC);
                      });
            })
            ->exists();

        if ($conflict) {
            return response()->json(['error' => 'This time slot is no longer available. Please select another time.'], 422);
        }

        // Create the booking
        $booking = Booking::create([
            'user_id' => $host->id,
            'guest_name' => $request->guest_first_name . ' ' . $request->guest_last_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'guest_timezone' => $request->guest_timezone,
            'start_time' => $startTimeUTC,
            'end_time' => $endTimeUTC,
            'duration_minutes' => 15,
            'status' => 'confirmed'
        ]);

        // Send confirmation emails
        try {
            // Send to guest
            Mail::to($booking->guest_email)->send(new BookingConfirmationMail($booking));

            // Send to host/admin
            Mail::to($host->email)->send(new BookingNotificationMail($booking));
        } catch (\Exception $e) {
            // Log error but don't fail the booking
            \Log::error('Booking email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Your booking has been confirmed!',
            'booking_id' => $booking->id
        ]);
    }
}
