@extends('backend.admin.main')
@section('title',"Teachers")
@section('section')
<div class="box">
    <div class="box-header">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Students {{$academic_year ?? ''}}</h3>
            @if (session()->has("message"))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{session()->get("message")}}
            </div>
            @endif
            <hr>
            <a name="" id="" class="btn btn-primary pull-right" href="/student/add" role="button">ADD STUDENT</a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped table-border" id="dataTable">
                <thead>
                    <tr>
                        <th>Student id</th>
                        <th>First Name</th>
                        <th>Father Name</th>
                        <th>Last Name</th>
                        <th>Mother Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th class="col-lg-5">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $item)
                    <tr>
                        <td scope="row">{{$item->std_id}}</td>
                        <td>{{$item->name }}</td>
                        <td><a href="javascript:void(0);"
                                onclick="parentInfo({{$item->p_id}});">{{$item->father_name }}</a></td>
                        <td>{{$item->last_name }}</td>
                        <td>{{$item->mother }}</td>
                        <td>{{$item->contact }}</td>
                        <td>{{$item->email }}</td>
                        <td>{{$item->class_name }}</td>
                        <td>
                            <a href="/student/edit/{{$item->std_id}}" class="btn btn-primary"><i class="fa fa-edit"
                                    aria-hidden="true"></i></a>
                            <a href="/student/class/{{$item->std_id}}" class="btn btn-success"><i class="fa fa-users"
                                    aria-hidden="true"></i></a>
                            <a href="/student/delete/{{$item->std_id}}"
                                onclick="return confirm('Are you sure want to delete ?');" class="btn btn-danger"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-primary"
                            onclick="studentInfo({{$item->std_id}});"><i class="fa fa-info-circle"
                                    aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="parentProfile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    function parentInfo(id) {
        var loading =
            '<div class="overlay text-center"><i class="fa fa-refresh fa-spin fa-3x"></i>Loading Please wait...</div>';
        $(".modal-body").html(loading);
        $("#parentProfile").modal("show");
        $.get("/parent/profile/" + id,
            function (data, ) {
                $(".modal-body").html(data);
            }
        );
    }
    function studentInfo(id) {
        var loading =
            '<div class="overlay text-center"><i class="fa fa-refresh fa-spin fa-3x"></i>Loading Please wait...</div>';
        $(".modal-body").html(loading);
        $("#parentProfile").modal("show");
        $.get("/student/profile/" + id,
            function (data, ) {
                $(".modal-body").html(data);
            }
        );
    }
</script>
@endsection