@extends('layouts.app')
@section('content')
    <div class="col-xl-12 col-lg-12" style="padding: 15px">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Cat Model</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{ route('car.save_edit_car_model',['id'=>$model->id]) }}">
                        @include('layouts.message')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input name="title" id="title" value="{{$model->title}}" type="text" class="form-control" placeholder="Enter Car Model Title">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea id="description" name="description" style="padding: 10px" placeholder="Enter Car Model Description" cols="100" rows="10">{{ $model->description }}</textarea>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
