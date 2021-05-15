@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Car Gallery</h3>
        </div>
        @include('layouts.message')
        <form enctype="multipart/form-data" method="post" action="{{ route('car.create_car') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Car</label>
                            <select class="form-control select2" name="status" style="width: 100%;">
                                @foreach($cars as $car)
                                    <option>{{ $car->number_plate }}</option>
                                @endforeach
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
                            <input onchange="readURL(this);" value="1" type="file" id="imageUpload" name="photo[]">
                            <p class="help-block">Upload car photo.</p>
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
                            <input onchange="readURL(this);" value="2" type="file" id="imageUpload" name="photo[]">
                            <p class="help-block">Upload car photo.</p>
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
                            <input onchange="readURL(this);" value="3" type="file" id="imageUpload" name="photo[]">
                            <p class="help-block">Upload car photo.</p>
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
                            <input onchange="readURL(this);" value="4" type="file" id="imageUpload" name="photo[]">
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
