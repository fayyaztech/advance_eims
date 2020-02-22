@extends('backend.admin.main')
@section('title','Subject groups');
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Assign Subjects & groups to Class</h3>
            @if (session()->has("message"))
            @include('layouts.notification')
            @endif
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <a name="" id="" class="btn btn-primary" href="/subject_groups/add" role="button">Add New Subject
                    Group</a>
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. no</th>
                                    <th>Class</th>
                                    <th>Subjects</th>
                                    <th>Groups</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject_groups as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->name }}</td>
                                    <td>
                                        @foreach (json_decode($item->subjects) ?? [] as $i)
                                        {{$subjects[$i]}},
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="/subject_groups/edit/{{$item->id}}" class="btn btn-primary"><i
                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="/subject_groups/assign_subjects/{{$item->id}}"
                                            class="btn btn-success"><i class="fa fa-arrow-up"
                                                aria-hidden="true"></i></a>
                                        <a href="/subject_groups/delete/{{$item->id}}"
                                            onclick="return confirm('Are you sure want to delete ?');"
                                            class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
