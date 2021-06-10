@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Reservation</h3>
        </div>
        @include('layouts.message')
        <form enctype="multipart/form-data" method="post" action="{{ route('enquiry.create') }}">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label>User</label>
                            <select class="form-control select2" name="enquiry_id" id="enquiry_id" style="width: 100%;">
                                <option selected="selected">Enquiries</option>
                                @foreach($enquiries as $enquiry)
                                    <option value="{{ $enquiry->id }}">{{ $enquiry->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Cars</label>
                            <select class="form-control select2" name="car_id" id="car_id" style="width: 100%;">
                                <option selected="selected">Car</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{$car->number_plate . " Number of seats " . $car->number_of_seats }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="start_date">Date</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <textarea placeholder="Enter message" name="message" id="message" rows="10" cols="70"></textarea>
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
