@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Enquiries</h3>
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
                            @foreach ($enquiries as $enquiry)
                                <tr>
                                    <td>{{ $enquiry->user->name }}</td>
                                    <td>{{ $enquiry->car->number_plate }}</td>
                                    <td>{{ $enquiry->car->number_of_seats }}</td>
                                    <td>{{ $enquiry->date}}</td>
                                    <td>{{ $enquiry->message }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('car.edit_car',['id'=> $enquiry->id]) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('car.delete',['id'=>$enquiry->id]) }}">Delete</a>
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
