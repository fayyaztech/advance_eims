@extends('backend.admin.main')
@section('title','Row Classes');
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Row Classes</h3>
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
                    @foreach ($row_classes as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->name }}</td>
                        <td>
                            <a href="/rowclasses/edit/{{$item->id}}" class="btn btn-primary"><i class="fa fa-edit"
                                    aria-hidden="true"></i></a>
                            <a href="/rowclasses/delete/{{$item->id}}"
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
