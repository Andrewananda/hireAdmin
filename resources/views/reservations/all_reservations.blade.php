@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Reservations</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            @include('layouts.message')
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Number plate</th>
                                <th>Number of seats</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->enquiry->user->name }}</td>
                                    <td>{{ $reservation->car->number_plate }}</td>
                                    <td>{{ $reservation->car->number_of_seats }}</td>
                                    <td>{{ $reservation->start_date}}</td>
                                    <td>{{ $reservation->message }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('reservation.approve',['id'=> $reservation->id]) }}">Approve</a>
                                        <a class="btn btn-success" href="{{ route('reservation.edit',['id'=>$reservation->id]) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('reservation.delete',['id'=>$reservation->id]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>User Name</th>
                                <th>Number plate</th>
                                <th>Number of seats</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
