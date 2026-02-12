<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Renovation Request Submission</title>
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
        .form-response {
            background-color: #f8f9fa;
            border-left: 4px solid #003f3a;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .question {
            font-weight: bold;
            color: #003f3a;
            margin-bottom: 8px;
        }
        .answer {
            color: #333;
            padding-left: 10px;
        }
        .answer-list {
            list-style: none;
            padding-left: 10px;
            margin: 5px 0;
        }
        .answer-list li:before {
            content: "• ";
            color: #003f3a;
            font-weight: bold;
            margin-right: 5px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Renovation Request Submission</h1>
            <p>You have received a new renovation request from your website</p>
        </div>

        <div class="content">
            <div class="section">
                <div class="section-title">Request Type</div>
                <div class="info-item">
                    <span class="label">Intent:</span>
                    <span class="badge badge-intent">{{ $intent->label() }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Category:</span>
                    <span class="badge badge-category">{{ $category->label() }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Contact Information</div>
                <div class="info-item">
                    <span class="label">First Name:</span> {{ $submission->first_name }}
                </div>
                <div class="info-item">
                    <span class="label">Last Name:</span> {{ $submission->last_name }}
                </div>
                <div class="info-item">
                    <span class="label">Email:</span> {{ $submission->email }}
                </div>
                <div class="info-item">
                    <span class="label">Phone:</span> {{ $submission->phone ?? 'N/A' }}
                </div>
            </div>

            @if($submission->address || $submission->city || $submission->postal_code)
            <div class="section">
                <div class="section-title">Address Information</div>
                @if($submission->address)
                <div class="info-item">
                    <span class="label">Address:</span> {{ $submission->address }}
                </div>
                @endif
                @if($submission->postal_code)
                <div class="info-item">
                    <span class="label">Postal Code:</span> {{ $submission->postal_code }}
                </div>
                @endif
                @if($submission->city)
                <div class="info-item">
                    <span class="label">City:</span> {{ $submission->city }}
                </div>
                @endif
            </div>
            @endif

            <div class="section">
                <div class="section-title">Form Responses</div>
                @forelse($formData as $stepData)
                    <div class="form-response">
                        <div class="question">{{ $stepData['title'] ?? 'Question' }}</div>
                        @if(!empty($stepData['description']))
                            <p style="font-size: 13px; color: #666; margin: 5px 0 10px 0;">{{ $stepData['description'] }}</p>
                        @endif
                        <div class="answer">
                            @if(is_array($stepData['response'] ?? null))
                                <ul class="answer-list">
                                    @foreach($stepData['response'] as $value)
                                        <li>{{ $value }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ $stepData['response'] ?? 'No response' }}
                            @endif
                        </div>
                    </div>
                @empty
                    <p style="color: #999; font-style: italic;">No form responses recorded.</p>
                @endforelse
            </div>

            <div class="section">
                <div class="section-title">Submission Details</div>
                <div class="info-item">
                    <span class="label">Date:</span> {{ $submission->created_at->format('F j, Y g:i A') }}
                </div>
                <div class="info-item">
                    <span class="label">Status:</span> {{ ucfirst($submission->status) }}
                </div>
                <div class="info-item">
                    <span class="label">IP Address:</span> {{ $submission->ip_address ?? 'N/A' }}
                </div>
            </div>
        </div>

        <div class="footer">
            <p>This email was sent from your H24 Renovation website renovation request form.</p>
            <p>Please review and respond to the customer in a timely manner.</p>
        </div>
    </div>
</body>
</html>
