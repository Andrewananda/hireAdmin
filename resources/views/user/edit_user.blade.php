@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
        </div>
        @include('layouts.message')
        <form enctype="multipart/form-data" method="post" action="{{ route('user.create') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="last_name">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="Enter Name">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id_number">Id Number</label>
                            <input type="number" name="id_number" value="{{ $user->id_number }}" class="form-control" id="id_number" placeholder="Enter Id Number">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control select2" name="gender" style="width: 100%;">
                                <option selected="selected">Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="phone" placeholder="Enter phone number">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="Enter Email">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ $user->password }}" class="form-control" id="password" placeholder="Enter Password">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
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
