@extends('backend.admin.main')
@section('title','Subject group');
@section('section')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Subject group Form</h3>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <form action="{{$subject_group->url ?? '/subject_groups/save'}}" method="post">
                @csrf
                @if ($subject_group->id ?? '') <input type="hidden" name="id" value="{{$subject_group->id}}"> @endif
                <div class="form-group">
                    <label for="name">Subject group Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                placeholder="Subject group name" value="{{$subject_group->name ?? ''}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js',"<script>
    $('#my-select, #pre-selected-options').multiSelect()
    </script>")
