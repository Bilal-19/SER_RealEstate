@extends('AdminLayout.DashboardTemplate')

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center  fw-bold">Booking</h3>
        </div>

        <div class="row ff-inter">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Download PDF</th>
                    </tr>

                    @foreach ($fetchBookingRecords as $record)
                        <tr>
                            <td>{{ $record->first_name }} {{ $record->last_name }}</td>
                            <td>{{ $record->phone_number }}</td>
                            <td>{{ date('d M Y', strtotime($record->created_at)) }}</td>
                            <td>{{ date('h:i a', strtotime($record->created_at)) }}</td>
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
