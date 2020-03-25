@extends('backend.admin.main')
@section('title',"Teachers")
@section('section')
<div class="box">
    <div class="box-header">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Parents</h3>
            @if (session()->has("message"))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{session()->get("message")}}
            </div>
            @endif
            <hr>
            <a name="" id="" class="btn btn-primary pull-right" href="/parent/add" role="button">ADD PARENT</a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped table-border" id="dataTable">
                <thead>
                    <tr>
                        <th>Sr. no</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Qualification</th>
                        <th>Occupation</th>
                        <th>Aadhaar</th>
                        <th>Name Of Organization</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parents as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->photo }}</td>
                        <td>{{$item->name }}</td>
                        <td>{{$item->contact }}</td>
                        <td>{{$item->email }}</td>
                        <td>{{$item->address }}</td>
                        <td>{{$item->qualification }}</td>
                        <td>{{$item->occupation }}</td>
                        <td>{{$item->aadhaar }}</td>
                        <td>{{$item->name_of_organization }}</td>
                        <td>
                            <a href="parent/edit/{{$item->id}}" class="btn btn-primary"><i class="fa fa-edit"
                                    aria-hidden="true"></i></a>
                            <a href="parent/delete/{{$item->id}}"
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
