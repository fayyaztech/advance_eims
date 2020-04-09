@extends('backend.admin.main')
@section('title','Classes');
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Classes Form</h3>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <form action="{{$classes->url ?? '/classes/save'}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$classes->id ?? ''}}">
                <div class="form-group">
                  <label for="name">Name Of Class</label>
                <input type="text" value="{{$classes->name ?? ''}}"
                    class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="1st A, 1st, 1">
                  <small id="helpId" class="form-text text-muted">Class name Should be anythig like Class 1st A, Or Without devision 1st, Or Only Numeric 1</small>
                </div>
                <input type="hidden" name="academic_year_id" value="{{Session::get("academic_year_id")}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
