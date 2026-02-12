@extends('layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <!-- Horizontal Layout -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Left Column - Calendar (40-45%) -->
                        <div class="col-lg-5 border-end">
                            <div class="p-4">
                                <!-- Month Navigation -->
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <button id="prev-month" class="btn btn-outline-secondary rounded-circle p-2">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <div class="text-center">
                                        <h3 id="current-month-year" class="h5 fw-semibold mb-0"></h3>
                                    </div>
                                    <button id="next-month" class="btn btn-outline-secondary rounded-circle p-2">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>

                                <!-- Calendar Grid -->
                                <div class="mb-4">
                                    <!-- Weekday Headers -->
                                    <div class="row gx-1 mb-2">
                                        <div class="col text-center small text-muted py-2 fw-medium">SUN</div>
                                        <div class="col text-center small text-muted py-2 fw-medium">MON</div>
                                        <div class="col text-center small text-muted py-2 fw-medium">TUE</div>
                                        <div class="col text-center small text-muted py-2 fw-medium">WED</div>
                                        <div class="col text-center small text-muted py-2 fw-medium">THU</div>
                                        <div class="col text-center small text-muted py-2 fw-medium">FRI</div>
                                        <div class="col text-center small text-muted py-2 fw-medium">SAT</div>
                                    </div>

                                    <!-- Calendar Days -->
                                    <div id="calendar-grid" class="row gx-1">
                                        <!-- Calendar will be populated by JavaScript -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Time Slots and Form (55-60%) -->
                        <div class="col-lg-7">
                            <div class="p-4">
                                <!-- Success/Error Message Container -->
                                <div id="booking-message" class="alert alert-dismissible fade d-none mb-4" role="alert">
                                    <div class="d-flex align-items-start">
                                        <i id="message-icon" class="fas fa-check-circle me-2 mt-1"></i>
                                        <div class="flex-grow-1">
                                            <strong id="message-title">Success!</strong>
                                            <p id="message-text" class="mb-0 mt-1"></p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <!-- Duration Pill -->
                                <div class="d-flex justify-content-center mb-4">
                                    <span class="badge bg-primary rounded-pill px-3 py-2">
                                        <i class="fas fa-clock me-1"></i>
                                        15 mins
                                    </span>
                                </div>

                                <!-- Time Slots Section -->
                                <div id="time-slots-section">
                                    <!-- Time Slots Content Wrapper -->
                                    <div id="time-slots-content">
                                        <!-- Time Slots Header -->
                                        <div class="text-center mb-4">
                                            <h2 class="h4 fw-semibold mb-2">What time works best?</h2>
                                            <p id="selected-date-display" class="text-muted mb-0">Select a date to view available times</p>
                                        </div>

                                        <!-- Timezone Selector -->
                                        <div class="mb-4">
                                            <label class="form-label fw-medium mb-2">Timezone</label>
                                            <select id="timezone-select" class="form-select">
                                                <!-- Timezone options will be populated by JavaScript -->
                                            </select>
                                        </div>

                                        <!-- Time Slots Container -->
                                        <div id="time-slots-container" class="mb-4" style="max-height: 300px; overflow-y: auto;">
                                            <div class="text-center py-5 text-muted">
                                                <i class="fas fa-clock fa-2x mb-3 text-secondary"></i>
                                                <p class="mb-0">Select a date to view available times</p>
                                            </div>
                                        </div>

                                        <!-- Selected Time Display -->
                                        <div id="selected-time-display" class="alert alert-info d-none">
                                            <p class="mb-1 fw-medium">Selected time:</p>
                                            <p id="selected-time-text" class="h5 mb-1"></p>
                                            <p id="selected-time-timezone" class="mb-0 small"></p>
                                        </div>
                                    </div>

                                    <!-- Booking Form (Hidden initially, appears when time slot selected) -->
                                    <div id="booking-form-container" class="d-none">
                                        <form id="booking-form">
                                            @csrf
                                            <input type="hidden" name="host_id" value="{{ $host->id }}">
                                            <input type="hidden" id="selected-date" name="selected_date">
                                            <input type="hidden" id="guest-timezone" name="guest_timezone">
                                            <input type="hidden" id="start_time" name="start_time">
                                            <input type="hidden" id="end_time" name="end_time">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="guest_first_name" class="form-label fw-medium">First Name *</label>
                                                    <input type="text" id="guest_first_name" name="guest_first_name" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="guest_last_name" class="form-label fw-medium">Last Name *</label>
                                                    <input type="text" id="guest_last_name" name="guest_last_name" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="guest_email" class="form-label fw-medium">Email Address *</label>
                                                <input type="email" id="guest_email" name="guest_email" required class="form-control">
                                            </div>

                                            <div class="mb-4">
                                                <label for="guest_phone" class="form-label fw-medium">Phone Number *</label>
                                                <input type="tel" id="guest_phone" name="guest_phone" required class="form-control">
                                            </div>

                                            <div class="bg-light rounded p-3 mb-4">
                                                <h5 class="fw-medium mb-3">Booking Summary</h5>
                                                <div class="small">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <span>With:</span>
                                                        <span class="fw-medium">{{ $host->name }}</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <span>Date:</span>
                                                        <span id="summary-date" class="fw-medium">Not selected</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <span>Time:</span>
                                                        <span id="summary-time" class="fw-medium">Not selected</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>Duration:</span>
                                                        <span class="fw-medium">15 minutes</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" id="back-to-selection" class="btn btn-outline-secondary">
                                                    <i class="fas fa-arrow-left me-1"></i> Back
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-check me-1"></i> Complete Booking
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    :root {
        --primary-color: #003f3a;
        --primary-hover: #024e48;
        --background-light: #F7F5F2;
        --text-dark: #003f3a;
    }

    /* Booking message styling */
    #booking-message {
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    #booking-message.alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    #booking-message.alert-success strong,
    #booking-message.alert-success p,
    #booking-message.alert-success i {
        color: #155724 !important;
    }

    #booking-message.alert-danger {
        background-color: #f8d7da;
        border-color: #f5c2c7;
        color: #842029;
    }

    #booking-message.alert-danger strong,
    #booking-message.alert-danger p,
    #booking-message.alert-danger i {
        color: #842029 !important;
    }

    #booking-message.alert-warning {
        background-color: #fff3cd;
        border-color: #ffecb5;
        color: #664d03;
    }

    #booking-message.alert-warning strong,
    #booking-message.alert-warning p,
    #booking-message.alert-warning i {
        color: #664d03 !important;
    }

    #booking-message.alert-info {
        background-color: #cff4fc;
        border-color: #b6effb;
        color: #055160;
    }

    #booking-message.alert-info strong,
    #booking-message.alert-info p,
    #booking-message.alert-info i {
        color: #055160 !important;
    }

    /* Duration pill with theme color */
    .badge.bg-primary {
        background-color: var(--primary-color) !important;
    }

    /* Primary buttons with theme color */
    .btn-primary {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: white !important;
    }

    .btn-primary:hover {
        background-color: var(--primary-hover) !important;
        border-color: var(--primary-hover) !important;
    }

    /* Month navigation buttons */
    .btn-outline-secondary {
        color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }

    .btn-outline-secondary:hover {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: white !important;
    }

    /* Fix color visibility issues */
    #selected-time-display.alert-info {
        background-color: var(--background-light) !important;
        border-color: var(--primary-color) !important;
        color: var(--text-dark) !important;
    }

    #selected-time-display .h5 {
        color: var(--text-dark) !important;
    }

    #selected-time-display .small {
        color: var(--text-dark) !important;
    }

    /* Improve booking summary visibility */
    .bg-light {
        background-color: var(--background-light) !important;
    }

    .bg-light .small {
        color: var(--text-dark) !important;
    }

    .bg-light .fw-medium {
        color: var(--text-dark) !important;
    }

    /* Calendar day styling with theme colors */
    .calendar-day {
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 0.875rem;
        background-color: transparent;
        color: var(--text-dark);
        font-weight: normal;
        min-height: 48px;
        text-align: center;
    }

    .calendar-day:hover {
        background-color: var(--background-light);
    }

    .calendar-day.selected {
        background-color: var(--primary-color) !important;
        color: white !important;
        border: 2px solid var(--primary-hover) !important;
    }

    .calendar-day.selected:hover {
        background-color: var(--primary-hover) !important;
    }

    .calendar-day.today {
        background-color: var(--background-light);
        color: var(--primary-color);
        font-weight: 800;
        border: 2px solid var(--primary-color);
        font-size: 24px;
    }

    .calendar-day.available {
        background-color: rgba(0, 63, 58, 0.05);
        border: 1px solid var(--primary-color);
    }

    .calendar-day.available:hover {
        background-color: rgba(0, 63, 58, 0.1);
    }

    .calendar-day.other-month {
        color: #adb5bd;
        cursor: default;
    }

    .calendar-day.other-month:hover {
        background-color: transparent;
    }

    .calendar-day.unavailable {
        opacity: 0.4;
        cursor: not-allowed;
        color: #6c757d;
    }

    .calendar-day.unavailable:hover {
        background-color: transparent;
    }

    /* Time slot buttons with theme colors */
    .time-slot-btn {
        width: 100%;
        text-align: left;
        padding: 0.75rem 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        color: var(--text-dark);
        transition: all 0.2s ease;
        margin-bottom: 0.5rem;
        background-color: white;
    }

    .time-slot-btn:hover:not(.unavailable) {
        border-color: var(--primary-color);
        background-color: rgba(0, 63, 58, 0.05);
    }

    .time-slot-btn.selected {
        border-color: var(--primary-color) !important;
        background-color: rgba(0, 63, 58, 0.1) !important;
        color: var(--primary-color) !important;
        font-weight: 500;
    }

    .time-slot-btn.unavailable {
        opacity: 0.6;
        cursor: not-allowed !important;
        background-color: #f8f9fa !important;
        color: #6c757d !important;
        border-color: #dee2e6 !important;
        text-decoration: line-through;
    }

    .time-slot-btn.unavailable:hover {
        background-color: #f8f9fa !important;
        border-color: #dee2e6 !important;
    }

    /* Form controls */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(0, 63, 58, 0.25);
    }

    /* Card styling */
    .card {
        background-color: white;
        border: 1px solid #e0e0e0;
    }

    /* Month/Year header */
    #current-month-year {
        color: var(--primary-color);
        font-weight: 600;
    }

    /* Default calendar day styling */
    .calendar-day {
        border: 1px solid transparent;
        background-color: transparent;
    }

    @media (max-width: 992px) {
        .calendar-day {
            height: 40px;
            font-size: 0.75rem;
        }

        .border-end {
            border-right: none !important;
            border-bottom: 1px solid #dee2e6 !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Debug: Check if jQuery is working
    // console.log('jQuery version:', $.fn.jquery);
    // console.log('Document ready fired');

    // Debug: Check if elements exist on page load
    // console.log('Time slots section on load:', $('#time-slots-section').length);
    // console.log('Booking form container on load:', $('#booking-form-container').length);
    // console.log('Time slots section visible on load:', $('#time-slots-section').is(':visible'));
    // console.log('Booking form container visible on load:', $('#booking-form-container').is(':visible'));
    // State management
    const state = {
        currentDate: new Date(),
        selectedDate: null,
        selectedTime: null,
        selectedTimezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        hostId: '{{ $host->id }}',
        bookedSlots: [], // Track booked slots in this session - will be initialized after DOM elements
        formData: {
            firstName: '',
            lastName: '',
            email: '',
            phone: ''
        }
    };

    // Session storage for tracking booked slots (timezone-aware)
    function getSessionBookedSlots() {
        // Use state.selectedTimezone if $timezoneSelect is not yet initialized
        const timezone = (typeof $timezoneSelect !== 'undefined' && $timezoneSelect.val())
            ? $timezoneSelect.val()
            : state.selectedTimezone;
        const key = 'bookedSlots_' + state.hostId + '_' + timezone.replace(/\//g, '_');
        const stored = sessionStorage.getItem(key);
        return stored ? JSON.parse(stored) : [];
    }

    function addSessionBookedSlot(startTime, endTime) {
        const timezone = $timezoneSelect.val() || state.selectedTimezone;
        const key = 'bookedSlots_' + state.hostId + '_' + timezone.replace(/\//g, '_');
        const bookedSlots = getSessionBookedSlots();
        bookedSlots.push({ start: startTime, end: endTime, timezone: timezone });
        sessionStorage.setItem(key, JSON.stringify(bookedSlots));
        state.bookedSlots = bookedSlots;
        // console.log('Added booked slot to session:', { start: startTime, end: endTime, timezone: timezone });
    }

    function isSlotBookedInSession(startTime, endTime) {
        const bookedSlots = getSessionBookedSlots();
        const isBooked = bookedSlots.some(slot => slot.start === startTime && slot.end === endTime);
        // console.log('Checking if slot is booked:', { start: startTime, end: endTime, isBooked: isBooked });
        return isBooked;
    }

    // Message display functions
    function showMessage(type, title, text) {
        const $message = $('#booking-message');
        const $icon = $('#message-icon');
        const $title = $('#message-title');
        const $text = $('#message-text');

        // Remove previous classes
        $message.removeClass('alert-success alert-danger alert-warning alert-info');

        // Set type-specific styling
        if (type === 'success') {
            $message.addClass('alert-success');
            $icon.removeClass().addClass('fas fa-check-circle me-2 mt-1');
        } else if (type === 'error') {
            $message.addClass('alert-danger');
            $icon.removeClass().addClass('fas fa-exclamation-circle me-2 mt-1');
        } else if (type === 'warning') {
            $message.addClass('alert-warning');
            $icon.removeClass().addClass('fas fa-exclamation-triangle me-2 mt-1');
        } else {
            $message.addClass('alert-info');
            $icon.removeClass().addClass('fas fa-info-circle me-2 mt-1');
        }

        $title.text(title);
        $text.text(text);

        // Show message with animation
        $message.removeClass('d-none').addClass('show');

        // Scroll to message
        $message[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        // Auto-hide after 8 seconds for success messages
        if (type === 'success') {
            setTimeout(() => {
                $message.removeClass('show').addClass('d-none');
            }, 8000);
        }
    }

    function hideMessage() {
        $('#booking-message').removeClass('show').addClass('d-none');
    }

    // DOM Elements
    const $prevMonthBtn = $('#prev-month');
    const $nextMonthBtn = $('#next-month');
    const $currentMonthYear = $('#current-month-year');
    const $calendarGrid = $('#calendar-grid');
    const $timezoneSelect = $('#timezone-select');
    const $timeSlotsContainer = $('#time-slots-container');
    const $selectedDateDisplay = $('#selected-date-display');
    const $selectedTimeDisplay = $('#selected-time-display');
    const $selectedTimeText = $('#selected-time-text');
    const $selectedTimeTimezone = $('#selected-time-timezone');

    // Initialize booked slots from session AFTER $timezoneSelect is declared
    state.bookedSlots = getSessionBookedSlots();
    // console.log('Initial booked slots loaded:', state.bookedSlots);

    // Initialize timezone selector
    // Initialize timezone selector with grouped options
    function initializeTimezoneSelector() {
        // Load timezone data from JSON file
        $.getJSON('/js/timezones-grouped.json', function(timezoneData) {
            timezoneData.forEach(group => {
                const $optgroup = $('<optgroup>').attr('label', group.group);

                group.options.forEach(tz => {
                    const $option = $('<option>').val(tz.value).text(tz.label);
                    if (tz.value === state.selectedTimezone) {
                        $option.prop('selected', true);
                    }
                    $optgroup.append($option);
                });

                $timezoneSelect.append($optgroup);
            });

            // console.log('Timezone selector initialized with browser timezone:', state.selectedTimezone);

            // Load calendar AFTER timezone selector is populated
            loadCalendarData();

            // Auto-select next available date after calendar loads
            setTimeout(() => {
                selectNextAvailableDate();
            }, 1500);
        }).fail(function() {
            console.error('Failed to load timezone data, using fallback');
            // Fallback to simple list if JSON fails
            const fallbackTimezones = [
                { value: 'America/New_York', label: '(UTC-05:00) New York' },
                { value: 'America/Chicago', label: '(UTC-06:00) Chicago' },
                { value: 'America/Los_Angeles', label: '(UTC-08:00) Los Angeles' },
                { value: 'Europe/London', label: '(UTC+00:00) London' },
                { value: 'Europe/Paris', label: '(UTC+01:00) Paris' },
                { value: 'Asia/Tokyo', label: '(UTC+09:00) Tokyo' },
                { value: 'Asia/Shanghai', label: '(UTC+08:00) Shanghai' },
                { value: 'Asia/Dubai', label: '(UTC+04:00) Dubai' },
                { value: 'Asia/Karachi', label: '(UTC+05:00) Karachi' },
                { value: 'Australia/Sydney', label: '(UTC+11:00) Sydney' }
            ];

            fallbackTimezones.forEach(tz => {
                const $option = $('<option>').val(tz.value).text(tz.label);
                if (tz.value === state.selectedTimezone) {
                    $option.prop('selected', true);
                }
                $timezoneSelect.append($option);
            });

            // Load calendar AFTER fallback timezone selector is populated
            loadCalendarData();

            // Auto-select next available date after calendar loads
            setTimeout(() => {
                selectNextAvailableDate();
            }, 1500);
        });
    }

    // Update calendar header
    function updateCalendarHeader() {
        const monthName = state.currentDate.toLocaleDateString('en-US', {
            month: 'long',
            year: 'numeric'
        });
        $currentMonthYear.text(monthName);
        // console.log('Calendar header updated to:', monthName);
        // console.log('Current date state:', state.currentDate);
        // console.log('Current month (0-indexed):', state.currentDate.getMonth());
        // console.log('Current year:', state.currentDate.getFullYear());
    }

    // Load calendar data from backend
    function loadCalendarData() {
        const timezone = $timezoneSelect.val();

        // Check if timezone is available
        if (!timezone) {
            console.error('Timezone not selected yet, waiting...');
            setTimeout(loadCalendarData, 100); // Retry after 100ms
            return;
        }

        const formData = new FormData();
        formData.append('host_id', state.hostId);
        formData.append('month', state.currentDate.getMonth() + 1);
        formData.append('year', state.currentDate.getFullYear());
        formData.append('timezone', timezone);
        formData.append('_token', '{{ csrf_token() }}');

        // console.log('Sending calendar request with:');
        // console.log('Host ID:', state.hostId);
        // console.log('Month:', state.currentDate.getMonth() + 1);
        // console.log('Year:', state.currentDate.getFullYear());
        // console.log('Timezone:', timezone);
        // console.log('Date object:', state.currentDate);

        // Show loading state
        $calendarGrid.html('<div class="col-12 text-center py-4 text-muted">Loading...</div>');

        $.ajax({
            url: '{{ route("booking.calendar") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log('Calendar data received:', data);
                if (data.calendar) {
                    renderCalendarFromData(data.calendar);
                } else {
                    console.error('Error loading calendar:', data.error);
                    $calendarGrid.html('<div class="col-12 text-center py-4 text-danger">Error loading calendar</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Calendar AJAX Error:', {
                    status: xhr.status,
                    statusText: xhr.statusText,
                    error: error,
                    response: xhr.responseJSON || xhr.responseText
                });

                let errorMsg = 'Error loading calendar';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMsg += ': ' + JSON.stringify(xhr.responseJSON.error);
                }

                $calendarGrid.html('<div class="col-12 text-center py-4 text-danger">' + errorMsg + '</div>');
            }
        });
    }

    // Render calendar from backend data
    function renderCalendarFromData(calendarData) {
        $calendarGrid.empty();

        // console.log('Rendering calendar with data:', calendarData);
        // console.log('Calendar grid element:', $calendarGrid);
        // console.log('Calendar grid children before:', $calendarGrid.children().length);

        // Clear any existing selections
        state.selectedDate = null;
        $('.calendar-day.selected').each(function() {
            $(this).removeClass('selected').css({
                'background-color': '',
                'color': ''
            });
        });

        // Create calendar with proper 7-column grid layout
        let $currentRow = $('<div>').addClass('row gx-1');
        let dayCount = 0;

        calendarData.forEach(day => {
            const $dayElement = $('<div>').addClass('calendar-day col').text(day.day).attr('data-date', day.date);

            if (!day.is_current_month) {
                $dayElement.addClass('other-month unavailable');
            } else {
                if (day.is_today) {
                    $dayElement.addClass('today');
                }

                if (!day.is_available) {
                    $dayElement.addClass('unavailable');
                    if (day.is_booked) {
                        $dayElement.attr('title', 'Fully booked');
                    } else if (!day.is_working_day) {
                        $dayElement.attr('title', 'Not a working day');
                    } else if (!day.is_future) {
                        $dayElement.attr('title', 'Past date');
                    } else {
                        $dayElement.attr('title', 'Not available');
                    }
                } else {
                    // Make available days clickable
                    $dayElement.addClass('available').css({
                        'cursor': 'pointer'
                    });

                    $dayElement.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        // console.log('Calendar day clicked:', day.date);
                        // console.log('Day element classes:', $(this).attr('class'));
                        // console.log('State before click:', {
                        //     selectedDate: state.selectedDate,
                        //     currentDate: state.currentDate
                        // });

                        // Remove previous selection from ALL calendar days
                        $('.calendar-day').each(function() {
                            $(this).removeClass('selected');
                            // CSS classes will handle styling
                        });

                        // Select current day
                        $(this).addClass('selected');
                        state.selectedDate = new Date(day.date + 'T00:00:00');

                        // Update display
                        updateSelectedDateDisplay();

                        // Load available time slots
                        loadTimeSlots();
                    });
                }
            }

            // Check if this day should be selected based on state
            if (state.selectedDate) {
                const selectedDateStr = new Date(state.selectedDate).toISOString().split('T')[0];
                if (day.date === selectedDateStr) {
                    $dayElement.addClass('selected');
                }
            }

            // Add day to current row
            $currentRow.append($dayElement);
            dayCount++;

            // Start new row every 7 days (end of week)
            if (dayCount % 7 === 0) {
                $calendarGrid.append($currentRow);
                $currentRow = $('<div>').addClass('row gx-1');
            }
        });

        // Add the last row if it's not complete
        if ($currentRow.children().length > 0) {
            $calendarGrid.append($currentRow);
        }

        // console.log('Calendar rendering complete.');
        // console.log('Calendar grid children after:', $calendarGrid.children().length);
        // console.log('Total calendar days:', $('.calendar-day').length);
        // console.log('Available days count:', $('.calendar-day.available').length);
        // console.log('Sample calendar day HTML:', $('.calendar-day').first().html());
    }

    // Update selected date display
    function updateSelectedDateDisplay() {
        if (state.selectedDate) {
            const formattedDate = state.selectedDate.toLocaleDateString('en-US', {
                weekday: 'long',
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });
            $selectedDateDisplay.text(`Showing times for ${formattedDate}`);
            $('#summary-date').text(formattedDate);
        } else {
            $selectedDateDisplay.text('Select a date to view available times');
            $('#summary-date').text('Not selected');
        }
    }

    // Load time slots for selected date
    function loadTimeSlots() {
        // console.log('loadTimeSlots called with state:', state);

        if (!state.selectedDate) {
            // console.log('No selected date, clearing time slots');
            $timeSlotsContainer.html('<div class="text-center py-5 text-muted"><p>Select a date to view available times</p></div>');
            return;
        }

        const dateStr = state.selectedDate.toISOString().split('T')[0];

        // console.log('Loading time slots for date:', dateStr);
        // console.log('Host ID:', state.hostId);
        // console.log('Timezone:', $timezoneSelect.val());

        $timeSlotsContainer.html('<div class="text-center py-4 text-muted">Loading available times...</div>');

        const formData = new FormData();
        formData.append('date', dateStr);
        formData.append('host_id', state.hostId);
        formData.append('timezone', $timezoneSelect.val());
        formData.append('_token', '{{ csrf_token() }}');

        // console.log('Making AJAX request with:', {
        //     date: dateStr,
        //     host_id: state.hostId,
        //     timezone: $timezoneSelect.val()
        // });

        $.ajax({
            url: '{{ route("booking.slots") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log('Time slots data received:', data);
                // console.log('Slot count:', data.slots ? data.slots.length : 'No slots array');
                if (data.slots !== undefined) {
                    renderTimeSlots(data.slots);
                } else {
                    console.error('Error loading time slots:', data.error);
                    $timeSlotsContainer.html('<div class="text-center py-4 text-danger">Error loading time slots: ' + (data.error || 'Unknown error') + '</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                $timeSlotsContainer.html('<div class="text-center py-4 text-danger">Error loading time slots. Please try again.</div>');
            }
        });
    }

    // Render time slots
    function renderTimeSlots(slots) {
        $timeSlotsContainer.empty();

        // console.log('renderTimeSlots called with', slots.length, 'slots');
        // console.log('Current timezone:', $timezoneSelect.val());
        // console.log('Session booked slots:', state.bookedSlots);

        if (slots.length === 0) {
            $timeSlotsContainer.html('<div class="text-center py-4"><p class="text-dark mb-0">No available times for this date</p></div>');
            $selectedTimeDisplay.addClass('d-none');
            return;
        }

        const $slotsContainer = $('<div>').addClass('d-grid gap-2 pe-2'); // Add padding for scrollbar

        slots.forEach(slot => {
            // Check if this slot was already booked in this session
            const isBookedInSession = isSlotBookedInSession(slot.start_time, slot.end_time);

            const $slotBtn = $('<button>')
                .addClass('time-slot-btn')
                .attr('type', 'button') // Explicitly set button type
                .text(slot.display_time)
                .attr('data-start-time', slot.start_time)
                .attr('data-end-time', slot.end_time)
                .attr('data-display-time', slot.display_time);

            // Mark as unavailable if booked in this session
            if (isBookedInSession) {
                $slotBtn.addClass('unavailable').prop('disabled', true);
                $slotBtn.attr('title', 'You already booked this time slot');
                $slotBtn.append(' <small class="text-muted">(Booked)</small>');
            } else {
                $slotBtn.on('click', function(e) {
                    e.preventDefault(); // Prevent any default behavior
                    e.stopPropagation(); // Stop event bubbling

                    // console.log('Time slot clicked:', slot.display_time);
                    // console.log('Current timezone at click:', $timezoneSelect.val());

                    // Hide any previous messages
                    hideMessage();

                    // Remove previous selection
                    $('.time-slot-btn.selected').removeClass('selected');

                    // Select current slot
                    $(this).addClass('selected');
                    state.selectedTime = {
                        start_time: slot.start_time,
                        end_time: slot.end_time,
                        display_time: slot.display_time
                    };

                    // Update display
                    $selectedTimeText.text(slot.display_time);
                    $selectedTimeTimezone.text(`Timezone: ${$timezoneSelect.find('option:selected').text()}`);
                    $selectedTimeDisplay.removeClass('d-none');
                    $('#summary-time').text(slot.display_time);

                    // Show booking form directly (improved UX)
                    // console.log('Showing booking form...');
                    // console.log('Time slots section exists:', $('#time-slots-section').length);
                    // console.log('Booking form container exists:', $('#booking-form-container').length);

                    // Hide time slots content (not the entire section)
                    $('#time-slots-content').hide();

                    // Show booking form
                    $('#booking-form-container').removeClass('d-none').show();

                    // Set form values
                    $('#selected-date').val(state.selectedDate.toISOString().split('T')[0]);
                    $('#guest-timezone').val($timezoneSelect.val());
                    $('#start_time').val(slot.start_time);
                    $('#end_time').val(slot.end_time);

                    // Restore previously entered form data if available
                    if (state.formData.firstName) {
                        $('#guest_first_name').val(state.formData.firstName);
                    }
                    if (state.formData.lastName) {
                        $('#guest_last_name').val(state.formData.lastName);
                    }
                    if (state.formData.email) {
                        $('#guest_email').val(state.formData.email);
                    }
                    if (state.formData.phone) {
                        $('#guest_phone').val(state.formData.phone);
                    }

                    // console.log('Form values set:', {
                    //     date: $('#selected-date').val(),
                    //     timezone: $('#guest-timezone').val(),
                    //     start: $('#start_time').val(),
                    //     end: $('#end_time').val()
                    // });

                    // Verify form is visible
                    setTimeout(function() {
                        // console.log('Form visible after timeout:', $('#booking-form-container').is(':visible'));
                        // console.log('Time slots content visible after timeout:', $('#time-slots-content').is(':visible'));
                    }, 100);
                });
            }

            $slotsContainer.append($slotBtn);
        });

        $timeSlotsContainer.append($slotsContainer);
        // console.log('Time slots rendered successfully');
    }

    // Event Listeners
    $prevMonthBtn.on('click', function() {
        state.currentDate.setMonth(state.currentDate.getMonth() - 1);
        updateCalendarHeader();
        // Clear selections when changing months
        state.selectedDate = null;
        state.selectedTime = null;
        $('.calendar-day.selected').each(function() {
            $(this).removeClass('selected');
        });
        $timeSlotsContainer.html('<div class="text-center py-5 text-muted"><p>Select a date to view available times</p></div>');
        $selectedTimeDisplay.addClass('d-none');
        $('#booking-form-container').addClass('d-none').hide();
        $('#time-slots-content').removeClass('d-none').show();
        loadCalendarData();
    });

    $nextMonthBtn.on('click', function() {
        state.currentDate.setMonth(state.currentDate.getMonth() + 1);
        updateCalendarHeader();
        // Clear selections when changing months
        state.selectedDate = null;
        state.selectedTime = null;
        $('.calendar-day.selected').each(function() {
            $(this).removeClass('selected');
        });
        $timeSlotsContainer.html('<div class="text-center py-5 text-muted"><p>Select a date to view available times</p></div>');
        $selectedTimeDisplay.addClass('d-none');
        $('#booking-form-container').addClass('d-none').hide();
        $('#time-slots-content').removeClass('d-none').show();
        loadCalendarData();
    });

    $timezoneSelect.on('change', function() {
        // console.log('Timezone changed to:', $(this).val());

        state.selectedTimezone = $(this).val();

        // Load booked slots for the new timezone
        state.bookedSlots = getSessionBookedSlots();
        // console.log('Loaded booked slots for new timezone:', state.bookedSlots);

        // Completely reset the booking flow when timezone changes
        // Clear all selections and states
        state.selectedDate = null;
        state.selectedTime = null;

        // Reset UI to initial state - use simple show/hide
        $('#booking-form-container').addClass('d-none').hide();
        $('#time-slots-content').removeClass('d-none').show();
        $selectedTimeDisplay.addClass('d-none');

        // Clear any calendar day selections
        $('.calendar-day.selected').each(function() {
            $(this).removeClass('selected');
        });

        // Reset time slots display
        $timeSlotsContainer.html('<div class="text-center py-5 text-muted"><p>Select a date to view available times</p></div>');

        // Reset date display
        $selectedDateDisplay.text('Select a date to view available times');
        $('#summary-date').text('Not selected');
        $('#summary-time').text('Not selected');

        // Store the current month/year before reloading to maintain month view
        const currentMonth = state.currentDate.getMonth();
        const currentYear = state.currentDate.getFullYear();

        // Reset to the same month/year to maintain view
        state.currentDate = new Date(currentYear, currentMonth, 1);

        // Reload calendar data with new timezone
        // console.log('Reloading calendar with new timezone');
        loadCalendarData();

        // Update header
        updateCalendarHeader();
    });

    // Removed confirm booking button - form now appears directly when time slot is selected

    // Handle form submission
    $('#booking-form').on('submit', function(e) {
        e.preventDefault();

        const $submitBtn = $(this).find('button[type="submit"]');
        const originalText = $submitBtn.text();
        $submitBtn.prop('disabled', true).text('Processing...');

        const formData = new FormData(this);

        // console.log('Form data being sent:');
        // for (let [key, value] of formData.entries()) {
        //     console.log(key, ':', value);
        // }

        // console.log('Submitting booking:', Object.fromEntries(formData));

        $.ajax({
            url: '{{ route("booking.store") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data) {
                if (data.success) {
                    // Add booked slot to session storage
                    const startTime = $('#start_time').val();
                    const endTime = $('#end_time').val();
                    addSessionBookedSlot(startTime, endTime);

                    // Show success message (not alert)
                    showMessage(
                        'success',
                        'Booking Confirmed!',
                        'Your appointment has been successfully booked. A confirmation email has been sent to your email address.'
                    );

                    // Reset form and go back to calendar
                    $('#booking-form')[0].reset();
                    $('#booking-form-container').addClass('d-none').hide();
                    $('#time-slots-content').removeClass('d-none').show();

                    // Clear selections
                    state.selectedDate = null;
                    state.selectedTime = null;
                    $('.calendar-day.selected').each(function() {
                        $(this).removeClass('selected');
                    });
                    $timeSlotsContainer.html('<div class="text-center py-5 text-muted"><p>Select a date to view available times</p></div>');
                    $selectedTimeDisplay.addClass('d-none');

                    // Reload calendar to reflect the new booking
                    loadCalendarData();
                } else {
                    showMessage('error', 'Booking Failed', data.error || 'Unable to complete your booking. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errorMsg = '';
                    $.each(xhr.responseJSON.errors, function(field, messages) {
                        errorMsg += messages.join(', ') + ' ';
                    });
                    showMessage('error', 'Validation Error', errorMsg.trim());
                } else {
                    showMessage('error', 'Error', 'An error occurred while processing your booking. Please try again.');
                }
            },
            complete: function() {
                // Always reset button state
                $submitBtn.prop('disabled', false).text(originalText);
            }
        });
    });

    // Back to selection button
    $('#back-to-selection').on('click', function() {
        // console.log('Back to selection clicked');

        // Save form values before hiding
        state.formData = {
            firstName: $('#guest_first_name').val(),
            lastName: $('#guest_last_name').val(),
            email: $('#guest_email').val(),
            phone: $('#guest_phone').val()
        };

        // Hide form and show time slots content
        $('#booking-form-container').addClass('d-none').hide();
        $('#time-slots-content').removeClass('d-none').show();

        // Don't clear form values - keep them for when user comes back
        // $('#booking-form')[0].reset(); // REMOVED

        // Clear selected time state
        state.selectedTime = null;
        $('.time-slot-btn.selected').removeClass('selected');
        $selectedTimeDisplay.addClass('d-none');
        $('#summary-time').text('Not selected');
    });

    // Auto-select next available date
    function selectNextAvailableDate() {
        const today = new Date();
        const todayStr = today.toISOString().split('T')[0];

        // console.log('Attempting to select today:', todayStr);

        setTimeout(() => {
            // First try to find today if it's available
            const $todayElement = $(`.calendar-day[data-date="${todayStr}"].available`);
            if ($todayElement.length) {
                // console.log('Selecting today:', todayStr);
                $todayElement.trigger('click');
                return;
            }

            // console.log('Today not available, looking for alternatives');

            // If today isn't available, find the next available date in current month
            const $availableDays = $('.calendar-day.available:not(.other-month)');
            if ($availableDays.length > 0) {
                // console.log('Selecting first available date');
                $availableDays.first().trigger('click');
            } else {
                // console.log('No available dates found');
            }
        }, 1500); // Increased delay to ensure calendar is fully loaded
    }

    // Initialize
    initializeTimezoneSelector(); // This will load calendar and auto-select date after timezone selector is ready
    updateCalendarHeader();
    updateSelectedDateDisplay();
});
</script>
@endpush
