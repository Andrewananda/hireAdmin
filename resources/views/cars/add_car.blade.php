@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Car</h3>
        </div>
        @include('layouts.message')
        <form enctype="multipart/form-data" method="post" action="{{ route('car.create_car') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Plate Number</label>
                            <input type="text" name="number_plate" class="form-control" id="number_plate" placeholder="Enter car plate number">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Number Of Seats</label>
                            <input type="number" name="number_of_seats" class="form-control" id="number_of_seats" placeholder="Enter number of seats">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Year</label>
                            <input type="text" name="year" class="form-control" id="year" placeholder="Enter car year">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Price</label>
                            <input type="text" name="price" class="form-control" id="year" placeholder="Enter car price">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Hire Duration</label>
                            <select class="form-control select2" name="hire_duration_id" style="width: 100%;">
                                <option selected="selected">Select Duration</option>
                                @foreach($hire_durations as $hire_duration)
                                <option value="{{ $hire_duration->id }}">{{ $hire_duration->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Model</label>
                            <select class="form-control select2" name="model_id" style="width: 100%;">
                                <option selected="selected">Model</option>
                                @foreach($car_models as $car_model)
                                    <option value="{{ $car_model->id }}" id="model_id" name="model_id">{{ $car_model->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="status" style="width: 100%;">
                                <option selected="selected">Available</option>
                                <option>Booked</option>
                                <option>Hired</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <div id="imagePreview">
                                <img src="http://placehold.it/300" height="150px" width="180px" id="blah" alt="">
                            </div>
                            <input onchange="readURL(this);" value="4" type="file" id="imageUpload" name="photo">
                            <p class="help-block">Upload car photo.</p>
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
