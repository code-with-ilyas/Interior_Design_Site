<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_timezone',
        'start_time',
        'end_time',
        'duration_minutes',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Get the user that owns the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get start time in guest timezone.
     */
    public function getStartTimeInGuestTimezoneAttribute()
    {
        return $this->start_time->setTimezone($this->guest_timezone);
    }

    /**
     * Get end time in guest timezone.
     */
    public function getEndTimeInGuestTimezoneAttribute()
    {
        return $this->end_time->setTimezone($this->guest_timezone);
    }

    /**
     * Get start time in host timezone.
     */
    public function getStartTimeInHostTimezoneAttribute()
    {
        return $this->start_time->setTimezone($this->user->timezone);
    }

    /**
     * Get end time in host timezone.
     */
    public function getEndTimeInHostTimezoneAttribute()
    {
        return $this->end_time->setTimezone($this->user->timezone);
    }

    /**
     * Get formatted date for display.
     */
    public function getFormattedDateAttribute()
    {
        return $this->start_time_in_guest_timezone->format('l, F j, Y');
    }

    /**
     * Get formatted time range for display.
     */
    public function getFormattedTimeRangeAttribute()
    {
        $start = $this->start_time_in_guest_timezone->format('g:i A');
        $end = $this->end_time_in_guest_timezone->format('g:i A T');
        return "$start - $end";
    }

    /**
     * Scope a query to only include confirmed bookings.
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope a query to only include pending bookings.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Check if booking conflicts with another booking.
     */
    public function conflictsWith(self $other): bool
    {
        return $this->start_time->lt($other->end_time) && $this->end_time->gt($other->start_time);
    }
}
