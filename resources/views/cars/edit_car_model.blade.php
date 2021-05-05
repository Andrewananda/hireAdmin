@extends('layouts.app')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Cat Model</h3>
        </div>
        @include('layouts.message')
        <form enctype="multipart/form-data" method="post" action="{{ route('car.save_edit_car_model',['id'=>$model->id]) }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Title</label>
                            <input name="title" id="title" value="{{$model->title}}" type="text" class="form-control" placeholder="Enter Car Model Title">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <textarea id="description" name="description" style="padding: 10px" placeholder="Enter Car Model Description" cols="100" rows="10">{{ $model->description }}</textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box-body">
                <button type="submit" style="display:block;margin: 0% 35%; width: 300px" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection
