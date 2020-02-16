@extends('backend.admin.main')
@section('title','Classes');
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Classes Form</h3>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <form action="{{$url ?? '/classes/save'}}" method="post">
                @csrf
                {{-- @if ($classes->id ?? '') <input type="hidden" name="id" value="{{$classes->id}}"> @endif --}}
                <div class="form-group">
                    <label for="row_class_id">Select Class</label>
                    <select class="form-control" name="row_class_id" id="row_class_id">
                        <option value="">select</option>
                        @foreach ($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="section_id">Select Section</label>
                    <select class="form-control" name="section_id" id="section_id">
                        <option value="">select section</option>
                        @foreach ($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="academic_year_id" value="{{Session::get("academic_year_id")}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
