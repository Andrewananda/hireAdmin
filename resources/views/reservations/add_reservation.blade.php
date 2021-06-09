@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">Add Reservation For {{$enquiry->user->name}}</h4>
        </div>
        @include('layouts.message')
        <form enctype="multipart/form-data" method="post" action="{{ route('user.create') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$enquiry->user->name}}" id="name" placeholder="Enter Name">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id_number">Id Number</label>
                            <input type="number" name="id_number" value="{{ $enquiry->user->id_number }}" class="form-control" id="id_number" placeholder="Enter Id Number">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="{{ $enquiry->user->phone }}" class="form-control" id="phone" placeholder="Enter phone number">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ $enquiry->user->email }}" name="email" class="form-control" id="email" placeholder="Enter Email">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Enter Start Date">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="Enter End Date">
                        </div>
                    </div>
                </div>


            </div>
            <div class="box-body">
                <button type="submit" style="display:block;margin: 0% 35%; width: 300px" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
