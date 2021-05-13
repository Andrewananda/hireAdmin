@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Model</h3>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ route('car.create_car_model') }}">
            @csrf
            <div class="row">
                @include('layouts.message')
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Car Model Title">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Description</label>
                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Car Model Description" cols="100" rows="10"></textarea>
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
