<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Voucher</title>
</head>
@php
    use Carbon\Carbon;
    function day($date)
    {
        return Carbon::parse($date)->format('l'); // 'l' gives the full day name
    }
@endphp

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif; color: #343a40; padding: 20px;">
    <div
        style="max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="width:590px; padding: 5px 0px; font-size: 18px;">
            <img src="{{ $message->embed(public_path() . '/company_logo.png') }}" alt="Company Logo"
                style="height: 100px;">
            <h2 style="color: #0e1b29; font-size: 20px; float: right;">Payment Voucher</h2>
        </div>
        <h2>Booking Confirmed</h2>

        <hr>
        <p style="width:590px; padding: 5px 0px; font-size: 18px;">
            <strong>Check In:</strong>
            <span style="float: right;">{{ day($checkIn) }}
                {{ date('d M Y', strtotime($checkIn)) }}</span>
        </p>
        <p style="width:590px; padding: 5px 0px; font-size: 18px;">
            <strong>Check Out:</strong>
            <span style="float: right;">
                {{ day($checkOut) }} {{ date('d M Y', strtotime($checkOut)) }}
            </span>
        </p>
        <p style="width:590px; padding: 5px 0px; font-size: 18px;"><strong>Location:</strong> <span
                style="float: right;">{{ $location }}</span></p>
        <p style="width:590px; padding: 5px 0px; font-size: 18px;"><strong>You booked for:</strong> <span
                style="float: right;">{{ $adults }} adults, {{ $children }} children</span></p>
        <p style="width:590px; padding: 5px 0px; font-size: 18px;"><strong>Your reservation:</strong> <span
                style="float: right;">{{ $totalStay }} nights</span></p>
        <p style="width:590px; padding: 5px 0px; font-size: 18px;"><strong>Total Received Amount:</strong> <span
                style="float: right;">£{{ $perNightPrice * $totalStay }}</span></p>
        <hr>
        <footer style="text-align: center; color: #6c757d; font-size: 14px; margin-top: 20px;">
            Thank you for your e-payment. If you have any questions, please contact us at info@sterling-executive.com
        </footer>
    </div>
</body>

</html>
