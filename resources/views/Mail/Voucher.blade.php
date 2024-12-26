<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif; color: #343a40; padding: 20px;">
    <div class="container" style="max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #007bff;">Payment Voucher</h2>
        <hr>
        <p><strong>Check In:</strong>{{ $checkIn }}</p>
        <p><strong>Check Out:</strong> {{ $checkOut }}</p>
        <p><strong>Location:</strong> {{ $location }}</p>
        <p><strong>Per Night Price:</strong> {{ $perNightPrice }}</p>
        <p><strong>Tax:</strong> {{ $vatAmount }}%</p>
        <p><strong>Duration:</strong> {{ $totalStay }} nights</p>
        <p><strong>Total Amount:</strong> ${{ $perNightPrice * $totalStay }}</p>
        <hr>
        <footer style="text-align: center; color: #6c757d; font-size: 14px; margin-top: 20px;">
            Thank you for your payment. If you have any questions, please contact us at support@example.com.
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
