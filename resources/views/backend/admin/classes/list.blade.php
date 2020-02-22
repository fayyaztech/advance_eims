@extends('backend.admin.main')
@section('title','Row Classes');
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Row Classes</h3>
            @if (session()->has("message"))
            @include('layouts.notification')
            @endif
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <a name="" id="" class="btn btn-primary" href="/classes/add" role="button">Add Class</a>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Classes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr. no</th>
                                <th>Class Name</th>
                                <th>Assigned Groups</th>
                                <th>Assigned Subjects</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($row_classes as $item)
                            <tr>
                                <td scope="row">{{$item->id}}</td>
                                <td>{{$item->name }}</td>
                                <td> @foreach (json_decode($item->subjects) ?? [] as $i)
                                    {{$subjects[$i]}},
                                    @endforeach</td>
                                <td> @foreach (json_decode($item->subject_groups) ?? [] as $i)
                                    {{$subject_groups[$i]}},
                                    @endforeach</td>
                                <td>
                                    <a href="/classes/assign_subjects/{{$item->id}}"
                                        class="btn btn-primary"><i class="fa fa-book" aria-hidden="true"></i></a>
                                    <a href="/classes/assign_groups/{{$item->id}}"
                                        class="btn btn-success"><i class="fa fa-list" aria-hidden="true"></i></a>
                                    <a href="/classes/delete/{{$item->id}}"
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
