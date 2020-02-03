@extends('backend.admin.main')
@section('title','Row Subjects');
@section('wrapper')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Row Subjects Form</h3>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <form action="{{$row_Subjects->url ?? '/row_subjects/save'}}" method="post">
                @csrf
                @if ($row_Subjects->id ?? '') <input type="hidden" name="id" value="{{$row_Subjects->id}}"> @endif
                <div class="form-group">
                    <label for="name">Row Class Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                placeholder="Row Subjects name" value="{{$row_Subjects->name ?? ''}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
