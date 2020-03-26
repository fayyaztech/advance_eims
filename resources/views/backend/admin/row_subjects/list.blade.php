@extends('backend.admin.main')
@section('title','Row Subjects')
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Row Subjects</h3>
            @if (session()->has("message"))
            @include('layouts.notification')
            @endif
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <a name="" id="" class="btn btn-primary" href="/row_subjects/add" role="button">Add New
                        Row Subject</a>
                    <div class="box">
                        <div class="box-header">

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr. no</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($row_subjects as $item)
                                    <tr>
                                        <td scope="row">{{$item->id}}</td>
                                        <td>{{$item->name }}</td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary" href="/row_subjects/edit/{{$item->id}}" role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="/row_subjects/delete/{{$item->id}}"
                                                onclick="return confirm('Are you sure want to delete ?');"
                                                class="btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
