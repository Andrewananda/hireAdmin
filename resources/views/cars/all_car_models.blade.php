@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Car Models</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            @include('layouts.message')
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($car_models as $model)
                                <tr>
                                    <td>{{ $model->title }}</td>
                                    <td>{{ $model->description }}</td>
                                    <td>{{ date_format($model->created_at, 'd-m-Y') }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('edit.car_model',['id'=> $model->id]) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('delete.car_model',['id'=>$model->id]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
