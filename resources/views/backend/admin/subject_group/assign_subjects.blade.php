@extends('backend.admin.main')
@section('title','Subject groups')
@section('section')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h3 class="text-center">Assign Subjects to groups</h3>
        @if (session()->has("message"))
        @include('layouts.notification')
        @endif
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <form class="box-body" action="/subject_groups/save_assigned_subjects" method="post">
            @csrf
            <input type="hidden" name="group_id" value="{{$group->id}}">
            <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Select Sabjects to <b>{{$group->name}}</b></h3>
                </div>
            @foreach ($subjects as $key => $item)
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="subjects[]" id="" value="{{$key}}" @if (isset($already_assigned_subjects[$key]))
                    checked
                @endif>{{$subjects[$key]}}
                </label>
            </div>

            @endforeach
            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
</div>
@endsection
