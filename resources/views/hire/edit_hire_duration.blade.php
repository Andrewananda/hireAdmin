@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Hire Duration</h3>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ route('hire.save_edit', ['id'=>$hire_duration->id]) }}">
            @csrf
            <div class="row">
                @include('layouts.message')
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name">Duration</label>
                            <input type="text" value="{{$hire_duration->name}}" name="name" class="form-control" id="name" placeholder="Enter hire duration (1 week etc)">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Description</label>
                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter duration description" cols="100" rows="10">{{$hire_duration->description}}</textarea>
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
