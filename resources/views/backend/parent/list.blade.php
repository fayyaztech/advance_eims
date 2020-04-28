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
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parents as $item)
                    <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td>{{$item->first_name }} {{$item->last_name}}</td>
                        <td>{{$item->contact }}</td>
                        <td>{{$item->email }}</td>
                        <td>
                            <a href="parent/edit/{{$item->id}}" class="btn btn-primary"><i class="fa fa-edit"
                                    aria-hidden="true"></i></a>
                            <a href="parent/delete/{{$item->id}}"
                                onclick="return confirm('Are you sure want to delete ? If You deleted parent student under parent will automaticaly deleted');" class="btn btn-danger"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-primary" onclick="profileInfo('{{$item->id}}');"><i class="fa fa-info-circle" aria-hidden="true"></i>
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
    function profileInfo(id){
        var loading = '<div class="overlay text-center"><i class="fa fa-refresh fa-spin fa-3x"></i>Loading Please wait...</div>';
        $(".modal-body").html(loading);
        $("#parentProfile").modal("show");
        $.get("/parent/profile/"+id,
            function (data,) {
                $(".modal-body").html(data);
            }
        );
    }
</script>
@endsection