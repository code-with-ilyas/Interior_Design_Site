<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #003f3a 0%, #005a55 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #003f3a;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #003f3a;
            margin-bottom: 10px;
        }
        .info-item {
            margin-bottom: 8px;
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .urgent-note {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #777;
        }
        .company-info {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        .company-name {
            font-weight: bold;
            color: #003f3a;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Booking Request</h1>
            <p>A new consultation booking requires your attention</p>
        </div>

        <div class="content">
            <div class="greeting">
                Hello {{ $booking->user->name }},
            </div>

            <p>You have received a new booking request for a consultation. Please review the details below and prepare accordingly.</p>

            <div class="section">
                <div class="section-title">Client Information:</div>
                <div class="info-item">
                    <span class="label">Name:</span> {{ $booking->guest_name }}
                </div>
                <div class="info-item">
                    <span class="label">Email:</span> {{ $booking->guest_email }}
                </div>
                <div class="info-item">
                    <span class="label">Phone:</span> {{ $booking->guest_phone }}
                </div>
                <div class="info-item">
                    <span class="label">Client Timezone:</span> {{ $booking->guest_timezone }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">Booking Details:</div>
                <div class="info-item">
                    <span class="label">Date:</span> {{ $booking->formatted_date }}
                </div>
                <div class="info-item">
                    <span class="label">Time:</span> {{ $booking->formatted_time_range }}
                </div>
                <div class="info-item">
                    <span class="label">Duration:</span> {{ $booking->duration_minutes }} minutes
                </div>
                <div class="info-item">
                    <span class="label">Booking ID:</span> #{{ $booking->id }}
                </div>
                <div class="info-item">
                    <span class="label">Booked on:</span> {{ $booking->created_at->format('F j, Y g:i A') }}
                </div>
            </div>

            <div class="urgent-note">
                <strong>Action Required:</strong> Please confirm your availability for this booking and prepare any necessary materials or questions for the consultation. The client will receive a meeting link 30 minutes before the scheduled time.
            </div>

            <div class="section">
                <div class="section-title">Next Steps:</div>
                <ul>
                    <li>Review the booking details above</li>
                    <li>Confirm your availability for the scheduled time</li>
                    <li>Prepare relevant materials or questions for the consultation</li>
                    <li>Ensure your virtual meeting setup is ready</li>
                </ul>
            </div>

            <div class="company-info">
                <div class="company-name">H24 Renovation</div>
                <p>Providing exceptional renovation services with attention to detail and quality craftsmanship.</p>
                <p>Please contact the client directly if you need to discuss any details or make adjustments to the booking.</p>
            </div>
        </div>

        <div class="footer">
            <p>This is an automated notification email. Please do not reply to this message.</p>
            <p>For system issues, contact the administrator.</p>
            <p>&copy; {{ date('Y') }} H24 Renovation. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
