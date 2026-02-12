<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for your renovation request!</title>
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
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .badge-intent {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        .badge-category {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        .summary-box {
            background-color: #e8f4f3;
            border-left: 4px solid #003f3a;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }
        .response-time {
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
            <h1>Thank You for Your Renovation Request!</h1>
            <p>We've received your request and will respond shortly</p>
        </div>

        <div class="content">
            <div class="greeting">
                Dear {{ $submission->first_name }} {{ $submission->last_name }},
            </div>

            <p>Thank you for submitting your renovation request to H24 Renovation. We appreciate your interest in our services and have received your request.</p>

            <div class="section">
                <div class="section-title">Your Request Summary:</div>
                <div class="summary-box">
                    <div style="margin-bottom: 10px;">
                        <strong>Request Type:</strong> <span class="badge badge-intent">{{ $intent->label() }}</span>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <strong>Category:</strong> <span class="badge badge-category">{{ $category->label() }}</span>
                    </div>
                    <div>
                        <strong>Submitted on:</strong> {{ $submission->created_at->format('F j, Y g:i A') }}
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Your Contact Information:</div>
                <div class="info-item">
                    <span class="label">Name:</span> {{ $submission->full_name }}
                </div>
                <div class="info-item">
                    <span class="label">Email:</span> {{ $submission->email }}
                </div>
                @if($submission->phone)
                <div class="info-item">
                    <span class="label">Phone:</span> {{ $submission->phone }}
                </div>
                @endif
                @if($submission->address || $submission->city || $submission->postal_code)
                <div class="info-item">
                    <span class="label">Location:</span>
                    {{ collect([$submission->address, $submission->postal_code, $submission->city])->filter()->implode(', ') }}
                </div>
                @endif
            </div>

            <div class="response-time">
                <strong>Response Time:</strong> Our team typically responds to renovation requests within 24-48 hours.
                You can expect to hear from us soon regarding your project details.
            </div>

            <div class="section">
                <div class="section-title">Next Steps:</div>
                <ul>
                    <li>Our team will review your renovation request</li>
                    <li>We'll contact you to discuss your project requirements in detail</li>
                    <li>We'll provide you with a customized proposal for your project</li>
                    <li>We'll answer any questions you may have about the renovation process</li>
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
