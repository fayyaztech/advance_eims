@extends('backend.admin.main')
@section('title',"Teachers")
@section('section')
<div class="box">
    <div class="box-header text-center">
        <h3 class="text-center box-title">Teachers</h3>
        @if (session()->has("message"))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            {{session()->get("message")}}
        </div>
        @endif
        <a name="" id="" class="btn btn-primary pull-right" href="/teacher/add" role="button"><i
                class="fa fa-plus-circle" aria-hidden="true"></i> Add Teacher</a>
        <hr>
    </div>
    <div class="box-body">
        <div class="alert alert-success" role="alert">
            <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Help:</strong>
            <p>
                <i class="fa fa-edit btn btn-primary"></i>: Edit Info ||
                <i class="fa fa-trash btn btn-danger" aria-hidden="true"></i>: Delete Teacher ||
                <i class="fa fa-key btn btn-primary" aria-hidden="true"></i>: Reset Password ||
                <i class="fa fa-table btn btn-primary" aria-hidden="true"></i>: Assign Class ||
            </p>
        </div>

        <script>
            $(".alert").alert();

        </script>
        <table class="table" id="dataTable">
            <thead>
                <tr>
                    <th>Sr. no</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date Of Birth</th>
                    <th>Joining Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $item)
                <tr>
                    <td scope="row">{{$item->id}}</td>
                    <td>{{$item->name }}</td>
                    <td>{{$item->contact }}</td>
                    <td>{{$item->email }}</td>
                    <td>{{$item->address }}</td>
                    <td>{{$item->dob }}</td>
                    <td>{{$item->joining_date }}</td>
                    <td>
                        <a href="/teacher/edit/{{$item->id}}" class="btn btn-primary"><i class="fa fa-edit"
                                aria-hidden="true"></i></a>
                        <a href="/teacher/delete/{{$item->id}}"
                            onclick="return confirm('Are you sure want to delete ?');" class="btn btn-danger"><i
                                class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
