@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Hire Durations</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            @include('layouts.message')
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($durations as $duration)
                                <tr>
                                    <td>{{ $duration->name }}</td>
                                    <td>{{ $duration->description }}</td>
                                    <td>{{ $duration->created_at }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('hire_duration.edit',['id'=>$duration->id]) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('hire_duration.delete',['id'=>$duration->id]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
