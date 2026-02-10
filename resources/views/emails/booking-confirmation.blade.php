<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
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
        .important-note {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
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
            <h1>Booking Confirmation</h1>
            <p>Your consultation has been scheduled successfully</p>
        </div>

        <div class="content">
            <div class="greeting">
                Dear {{ $booking->guest_name }},
            </div>

            <p>Thank you for booking a consultation with <strong>H24 Renovation</strong>. Your appointment has been confirmed and we look forward to discussing your project needs.</p>

            <div class="section">
                <div class="section-title">Booking Details:</div>
                <div class="info-item">
                    <span class="label">Consultant:</span> {{ $booking->user->name }}
                </div>
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
                    <span class="label">Your Timezone:</span> {{ $booking->guest_timezone }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">What to Expect:</div>
                <ul>
                    <li>Your consultation will be conducted virtually</li>
                    <li>Please ensure you have a stable internet connection</li>
                    <li>The meeting link will be sent to you 30 minutes before your scheduled time</li>
                    <li>Have any project details or questions ready to discuss</li>
                </ul>
            </div>

            <div class="important-note">
                <strong>Important:</strong> If you need to reschedule or have any questions about your appointment, please contact us as soon as possible. We require at least 24 hours' notice for any changes.
            </div>

            <div class="section">
                <div class="section-title">Preparation Tips:</div>
                <ul>
                    <li>Review your project requirements beforehand</li>
                    <li>Have measurements or floor plans available if applicable</li>
                    <li>Prepare a list of questions for your consultant</li>
                    <li>Ensure your camera and microphone are working properly</li>
                </ul>
            </div>

            <div class="company-info">
                <div class="company-name">H24 Renovation</div>
                <p>Providing exceptional renovation services with attention to detail and quality craftsmanship.</p>
                <p>If you have any urgent questions, please don't hesitate to call us directly.</p>
            </div>
        </div>

        <div class="footer">
            <p>This is an automated confirmation email. Please do not reply to this message.</p>
            <p>For immediate assistance, contact us at {{ config('mail.from.address') }}</p>
            <p>&copy; {{ date('Y') }} H24 Renovation. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
