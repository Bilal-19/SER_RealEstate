<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            font-family: "inter";
        }

        th {
            text-align: left;
            width: 200px;
        }

        td {
            height: 10px;
            vertical-align: middle;
        }

        td,
        th {
            padding: 5px;
        }

        h4 {
            font-size: 30px;
            font-family: "poppins";
        }

        img {
            height: 100px;
            width: 100px;
        }
    </style>
</head>

<body>

    {{-- <img src="{{ asset('images/company_logo.png') }}" alt="Company Logo" height="100" width="100"> --}}


    <h4>Personal Information</h4>
    <table>
        <tr>
            <th>Customer Name: </th>
            <td>{{ $fetchRecord->first_name }} {{ $fetchRecord->last_name }}</td>
        </tr>

        <tr>
            <th>Email: </th>
            <td>{{ $fetchRecord->email }}</td>
        </tr>

        <tr>
            <th>Phone Number: </th>
            <td>{{ $fetchRecord->phone_number }}</td>
        </tr>

        <tr>
            <th>Address: </th>
            <td>{{ $fetchRecord->address }}</td>
        </tr>

        <tr>
            <th>Postal Code: </th>
            <td>{{ $fetchRecord->postal_code }}</td>
        </tr>

        <tr>
            <th>Country: </th>
            <td>{{ $fetchRecord->country }}</td>
        </tr>

        <tr>
            <th>Message: </th>
            <td>{{ $fetchRecord->message }}</td>
        </tr>
    </table>

    <h4>Booking Information</h4>
    <table>
        <tr>
            <th>Check In Date: </th>
            <td>{{ date('d M Y', strtotime($fetchRecord->check_in)) }}</td>
        </tr>

        <tr>
            <th>Check Out Date: </th>
            <td>{{ date('d M Y', strtotime($fetchRecord->check_out)) }}</td>
        </tr>

        <tr>
            <th>Total Night Stay: </th>
            <td>{{ $fetchRecord->total_days_to_stay }}</td>
        </tr>

        <tr>
            <th>Payment Status: </th>
            <td>{{ $fetchRecord->payment_status }}</td>
        </tr>

        <tr>
            <th>Number of Occupants: </th>
            <td>{{ $fetchBookingRecord->totalAdults }} Adults, {{ $fetchBookingRecord->totalChildrens }} Childrens</td>
        </tr>

        <tr>
            <th>Apartment Name: </th>
            <td>
                {{ $fetchBookingRecord->area_name }}
            </td>
        </tr>

        <tr>
            <th>Street Address: </th>
            <td>
                {{ $fetchBookingRecord->street_address }}
            </td>
        </tr>

    </table>
</body>

</html>
