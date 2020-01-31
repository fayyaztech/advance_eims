@extends('backend.admin.main')
@section('title','Sections');
@section('wrapper')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Sections Form</h3>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <form action="{{$section->url ?? '/sections/save'}}" method="post">
                @csrf
                @if ($section ?? '') <input type="hidden" name="id" value="{{$section ?? ''->id}}"> @endif
                <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                placeholder="Section name" value="{{$section->name ?? ''}}">
                    NOTE : if no sections in your institute please create A as default</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
