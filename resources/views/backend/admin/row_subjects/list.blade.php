@extends('backend.admin.main')
@section('title','Row Subjects');
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <a href="/row_subjects/add" type="button" class="btn btn-primary float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Subject</a>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Row Subjects</h3>
            @if (session()->has("message"))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{session()->get("message")}}</strong>
            </div>
            @endif
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <table class="table" id="dataTable">
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
                            <a href="/row_subjects/delete/{{$item->id}}"
                                onclick="return confirm('Are you sure want to delete ?');" class="btn btn-danger"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
