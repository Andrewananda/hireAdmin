@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Cars</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            @include('layouts.message')
                            <thead>
                            <tr>
                                <th>Plate Number</th>
                                <th>Year</th>
                                <th>Model</th>
                                <th>Number of seats</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->number_plate }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->model->title }}</td>
                                    <td>{{ $car->number_of_seats }}</td>
                                    <td>{{ $car->status }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('car.edit_car',['id'=> $car->id]) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('car.delete',['id'=>$car->id]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Plate Number</th>
                                <th>Year</th>
                                <th>Model</th>
                                <th>Number of seats</th>
                                <th>Status</th>
                                <th>Actions</th>
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
