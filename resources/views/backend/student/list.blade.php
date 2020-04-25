@extends('backend.admin.main')
@section('title',"Teachers")
@section('section')
<div class="box">
    <div class="box-header">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Students</h3>
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
                        <th>Sr. no</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($parents as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->name }}</td>
                        <td>{{$item->contact }}</td>
                        <td>{{$item->email }}</td>
                        <td>
                            <a href="parent/edit/{{$item->id}}" class="btn btn-primary"><i class="fa fa-edit"
                                    aria-hidden="true"></i></a>
                            <a href="parent/delete/{{$item->id}}"
                                onclick="return confirm('Are you sure want to delete ?');" class="btn btn-danger"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-primary" onclick="profileInfo('{{json_encode($item)}}');"><i class="fa fa-info-circle" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="parentProfile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Parent Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <span id="pPhoto"></span>
                    </div>
                    <div class="col-lg-8">
                        <p>Name :<span id="pName"></span></p>
                        <p>Email: <span id="pEmail"></span> </p>
                        <p>Contact: <span id="pContact"></span> </p>
                        <p>Adhar: <span id="pAdhar"></span> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p>address: <span id="pAddress"></span> </p>
                        <p>qualification: <span id="pQualification"></span> </p>
                        <p>occupation: <span id="pOccupation"></span> </p>
                        <p>name_of_organization: <span id="pOrganization"></span> </p>
                    </div>
                </div>
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
    function profileInfo(params){
        var d =jQuery.parseJSON(params);
        $("#pPhoto").text(d.photo);
        $("#pName").text(d.name);
        $("#pEmail").text(d.email);
        $("#pContact").text(d.contact);
        $("#pAdhar").text(d.adhar);
        $("#pAddress").text(d.address);
        $("#pQualificatoin").text(d.qualificatoin);
        $("#pOccupation").text(d.occupation);
        $("#pOrganization").text(d.name_of_organization);
        $("#parentProfile").modal("show");
    }
</script>
@endsection