<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details - TouriStay</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #4F46E5;
        }
        .logo span {
            color: #F59E0B;
        }
        .content {
            padding: 30px 0;
        }
        .transaction-details {
            background-color: #f3f4f6;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .property-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 15px;
            text-align: right;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .button {
            display: inline-block;
            background-color: #4F46E5;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #1f2937;
        }
        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">touri<span>Stay</span></div>
            <p>Your home wherever you go</p>
        </div>
        
        <div class="content">
            <h2>Reservation Placed</h2>
            <p>Dear {{ $landlord->name }},</p>
            <p>{{$tourist->name }} Placed successfully placed a reservation in your listing : {{$listing->name}}</p>
            
            <div class="detail-row">
                <div>Property:</div>
                <div><strong>{{ $listing->name }}</strong></div>
            </div>
            <div class="detail-row">
                <div>Address:</div>
                <div>{{ $listing->location }}</div>
            </div>
            
            <div class="section-title" style="margin-top: 20px;">Booking Information</div>
            <div class="detail-row">
                <div>Check-in Date:</div>
                <div>{{ Carbon\Carbon::parse($reservation->startdate)->format('M d, Y') }}</div>
            </div>
            <div class="detail-row">
                <div>Check-out Date:</div>
                <div>{{ Carbon\Carbon::parse($reservation->enddate)->format('M d, Y') }}</div>
            </div>
            
            <div class="section-title" style="margin-top: 20px;">Payment Summary</div>
            <div class="detail-row">
                <div>Nightly Rate:</div>
                <div>${{ number_format($listing->price, 2) }}</div>
            </div>
            <div class="detail-row">
                <div>Nights:</div>
                @php
                $startdate = Carbon\Carbon::parse($reservation->startdate);
                $enddate = Carbon\Carbon::parse($reservation->enddate);
                $nights = $startdate->diffInDays($enddate);
                @endphp
                <div>{{ (int)$nights }}</div>
            </div>
            
            <div class="total">
                Total: ${{ number_format($transaction->amount, 2) }}
            </div>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('listings.show', $listing->id) }}" class="button">View listing Details</a>
            </div>
            
            <p style="margin-top: 30px;">If you have any questions about your booking or need assistance, please don't hesitate to contact our support team at support@touristay.com.</p>
            
            <p>Thank you for choosing TouriStay!</p>
            
            <p>Best regards,<br>The TouriStay Team</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} TouriStay. All rights reserved.</p>
            <p>123 Vacation Street, Travel City, TC 12345</p>
        </div>
    </div>
</body>
</html>