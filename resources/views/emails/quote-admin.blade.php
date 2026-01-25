<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Quote Request Submission</title>
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
            width: 130px;
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
            <h1>New Quote Request Submission</h1>
            <p>You have received a new quote request from your website</p>
        </div>

        <div class="content">
            <div class="section">
                <div class="section-title">Contact Information</div>
                <div class="info-item">
                    <span class="label">First Name:</span> {{ $quote->first_name }}
                </div>
                <div class="info-item">
                    <span class="label">Last Name:</span> {{ $quote->last_name }}
                </div>
                <div class="info-item">
                    <span class="label">Email:</span> {{ $quote->email }}
                </div>
                <div class="info-item">
                    <span class="label">Phone:</span> {{ $quote->phone ?? 'N/A' }}
                </div>
                <div class="info-item">
                    <span class="label">Company:</span> {{ $quote->company ?? 'N/A' }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">Address Information</div>
                <div class="info-item">
                    <span class="label">Address:</span> {{ $quote->address ?? 'N/A' }}
                </div>
                <div class="info-item">
                    <span class="label">Postal Code:</span> {{ $quote->postal_code ?? 'N/A' }}
                </div>
                <div class="info-item">
                    <span class="label">City:</span> {{ $quote->city ?? 'N/A' }}
                </div>
                <div class="info-item">
                    <span class="label">Country:</span> {{ $quote->country ?? 'N/A' }}
                </div>
                <div class="info-item">
                    <span class="label">Cities:</span> {{ $quote->cities ?? 'N/A' }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">Message</div>
                <div class="message">
                    {{ $quote->mesage ?? 'N/A' }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">Submission Details</div>
                <div class="info-item">
                    <span class="label">Date:</span> {{ $quote->created_at->format('F j, Y g:i A') }}
                </div>
                <div class="info-item">
                    <span class="label">Status:</span> {{ ucfirst($quote->status) }}
                </div>
                <div class="info-item">
                    <span class="label">IP Address:</span> {{ request()->ip() }}
                </div>
            </div>
        </div>

        <div class="footer">
            <p>This email was sent from your H24 Renovation website quote request form.</p>
            <p>Please review and respond to the customer in a timely manner.</p>
        </div>
    </div>
</body>
</html>
