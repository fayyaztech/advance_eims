@extends('backend.admin.main')
@section('title','Subject groups')
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Subject groups</h3>
            @if (session()->has("message"))
            @include('layouts.notification')
            @endif
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <a name="" id="" class="btn btn-primary" href="/subject_groups/add" role="button">Create New Subject
                    Group</a>
                <div class="box">
                    <div class="box-header">
                        <div class="box-body">
                            <p class="text-danger">
                                <span class="text-danger"><i class="fa fa-info-circle" aria-hidden="true"></i>
                                    HELP::</span>
                                <i class="fa fa-edit"></i>: Edit Group Name |
                                <i class="fa fa-upload" aria-hidden="true"></i>: Assign subject to Group |
                                <i class="fa fa-trash" aria-hidden="true"></i>: Delete Subject Group</p>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. no</th>
                                    <th>Name</th>
                                    <th>Subjects</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject_groups as $group => $item)
                                <tr>
                                    <td scope="row">{{$loop->index+1}}</td>
                                    <td>{{$group}}</td>
                                    <td>
                                        {{json_encode($item['subjects'])}}
                                    </td>
                                    <td>
                                        <a href="/subject_groups/edit/{{$item['id']}}" class="btn btn-primary"><i
                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="/subject_groups/assign_subjects/{{$item['id']}}"
                                            class="btn btn-success"><i class="fa fa-arrow-up"
                                                aria-hidden="true"></i></a>
                                        <a href="/subject_groups/delete/{{$item['id']}}"
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
</div>
@endsection
