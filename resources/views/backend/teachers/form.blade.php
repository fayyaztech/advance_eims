@extends('backend.admin.main')
@section('title',"Teacher_form")
@section('wrapper')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Add Teacher Form</h3>
            <form action="@if ($teacher) /update_teacher @else /save_teacher @endif" method="post">
                @csrf
            @if ($teacher) <input type="hidden" name="id" value="{{$teacher->id}}"> @endif
                <div class="form-group">
                    <label class="col-form-label" for="validationCustom02">Name</label>
                    <input type="text" required="" name="name" class="form-control @error('name') is-invalid @enderror"
                id="validationCustom02" value="@if($teacher){{$teacher->name}}@endif">
                    <div class="invalid-feedback">@error('name'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="contact">Contact</label>
                    <input type="text" required="" name="contact" class="form-control @error('contact') is-invalid @enderror"
                        id="contact" value="@if ($teacher){{$teacher->contact}}@endif">
                    <div class="invalid-feedback">@error('contact'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="email">Email</label>
                    <input type="text" required="" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" value="@if ($teacher){{ $teacher->email }}@endif">
                    <div class="invalid-feedback">@error('email'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="dob">Date Of Birth</label>
                    <input type="date" required="" name="dob" class="form-control @error('dob') is-invalid @enderror"
                        id="dob" value="@if ($teacher){{ $teacher->dob }}@endif">
                    <div class="invalid-feedback">@error('dob'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="joining_data">Joining Data</label>
                    <input type="date" required="" name="joining_date" class="form-control @error('joining_data') is-invalid @enderror"
                        id="joining_data" value="@if ($teacher){{ $teacher->joining_date }}@endif">
                    <div class="invalid-feedback">@error('joining_data'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="address">Address</label>
                    <textarea type="text" required="" name="address" class="form-control @error('address') is-invalid @enderror"
                        id="address">@if ($teacher){{ $teacher->address }}@endif</textarea>
                    <div class="invalid-feedback">@error('address'){{ $message }}@enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
