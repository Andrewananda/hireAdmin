@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Datatable</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('layouts.message')
                    <table id="example" class="display" style="min-width: 845px;">
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
            </div>
        </div>
    </div>
@endsection
