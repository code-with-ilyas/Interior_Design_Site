<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
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
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #003f3a;
            margin-bottom: 10px;
            border-bottom: 2px solid #003f3a;
            padding-bottom: 5px;
        }
        .info-item {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 100px;
        }
        .message {
            background-color: #f8f9fa;
            border-left: 4px solid #003f3a;
            padding: 15px;
            margin-top: 10px;
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
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(135deg, #003f3a 0%, #005a55 100%);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
            <p>You have received a new inquiry from your website</p>
        </div>

        <div class="content">
            <div class="section">
                <div class="section-title">Contact Information</div>
                <div class="info-item">
                    <span class="label">Name:</span> {{ $contact->name }}
                </div>
                <div class="info-item">
                    <span class="label">Email:</span> {{ $contact->email }}
                </div>
                <div class="info-item">
                    <span class="label">Phone:</span> {{ $contact->phone }}
                </div>
                <div class="info-item">
                    <span class="label">Subject:</span> {{ $contact->subject }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">Message</div>
                <div class="message">
                    {{ $contact->message }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">Submission Details</div>
                <div class="info-item">
                    <span class="label">Date:</span> {{ $contact->created_at->format('F j, Y g:i A') }}
                </div>
                <div class="info-item">
                    <span class="label">IP Address:</span> {{ request()->ip() }}
                </div>
            </div>
        </div>

        <div class="footer">
            <p>This email was sent from your H24 Renovation website contact form.</p>
            <p>Please respond to the customer in a timely manner.</p>
        </div>
    </div>
</body>
</html>
