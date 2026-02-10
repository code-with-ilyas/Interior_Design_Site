// Fixed calendar rendering function
function renderCalendarFromData(calendarData) {
    $calendarGrid.empty();

    console.log('Rendering calendar with data:', calendarData);
    console.log('Calendar grid element:', $calendarGrid);
    console.log('Calendar grid children before:', $calendarGrid.children().length);

    // Clear any existing selections
    state.selectedDate = null;
    $('.calendar-day.selected').each(function() {
        $(this).removeClass('selected').css({
            'background-color': '',
            'color': ''
        });
    });

    // Create calendar with proper grid layout
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
                    'cursor': 'pointer',
                    'background-color': '#e0f2fe',
                    'border': '2px solid #0ea5e9',
                    'padding': '5px'
                });

                $dayElement.on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    console.log('Calendar day clicked:', day.date);
                    console.log('Day element classes:', $(this).attr('class'));
                    console.log('State before click:', {
                        selectedDate: state.selectedDate,
                        currentDate: state.currentDate
                    });

                    // Remove previous selection from ALL calendar days
                    $('.calendar-day.selected').each(function() {
                        $(this).removeClass('selected');
                        if ($(this).hasClass('available')) {
                            $(this).css({
                                'background-color': '#e0f2fe',
                                'color': '',
                                'border': '2px solid #0ea5e9'
                            });
                        } else {
                            $(this).css({
                                'background-color': '',
                                'color': '',
                                'border': ''
                            });
                        }
                    });

                    // Select current day
                    $(this).addClass('selected').css({
                        'background-color': '#0d6efd',
                        'color': 'white',
                        'border': '2px solid #0b5ed7'
                    });
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
                $dayElement.addClass('selected').css({
                    'background-color': '#0d6efd',
                    'color': 'white',
                    'border': '2px solid #0b5ed7'
                });
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

    console.log('Calendar rendering complete.');
    console.log('Calendar grid children after:', $calendarGrid.children().length);
    console.log('Total calendar days:', $('.calendar-day').length);
    console.log('Available days count:', $('.calendar-day.available').length);
    console.log('Sample calendar day HTML:', $('.calendar-day').first().html());
}
