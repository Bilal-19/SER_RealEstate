@extends('AdminLayout.DashboardTemplate')

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Booking</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Amount</th>
                        <th>Total Days to Stay</th>
                        <th>Download PDF</th>
                    </tr>

                    @foreach ($fetchBookingRecords as $record)
                        <tr>
                            <td>{{ $record->first_name }} {{ $record->last_name }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->phone_number }}</td>
                            <td>${{ $record->total_amount }}</td>
                            <td>{{$record->total_days_to_stay}}</td>
                            <td class="text-center">
                                <a href="{{route('Generate.PDF', ['id'=>$record->id])}}" class="text-primary">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
@endsection
