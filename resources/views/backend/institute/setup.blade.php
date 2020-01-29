@extends('backend.admin.main')
@section('title')
Institute Setup
@endsection
@section('wrapper')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Update Institute Settings</h3>
            @if (session()->has("message"))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{session()->get("message")}}</strong>
            </div>
            @endif
            <form action="/update_institute_details" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="institute">
                <div class="form-group">
                    <label for="name">Institute Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                        placeholder="Institute name">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="name">Contact</label>
                    <input type="text" class="form-control" name="contact" id="name" aria-describedby="helpId"
                        placeholder="Contact">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="name" aria-describedby="helpId"
                        placeholder="Email">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="logo">Logo</label>
                  <input type="file" class="form-control-file" name="logo" id="logo" placeholder="logo" aria-describedby="logo">
                  <small id="logo" class="form-text text-muted">200X200</small>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
</div>
@endsection
