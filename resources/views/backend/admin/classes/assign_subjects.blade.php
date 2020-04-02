@extends('backend.admin.main')
@section('title','Subject groups')
@section('section')
<div class="box">
    <div class="box-header">
        <h3 class="text-center">Assign Subjects to groups</h3>
        @if (session()->has("message"))
        @include('layouts.notification')
        @endif
    </div>
    <div class="box-body">
        <form action="/classes/save_assigned_subjects" method="post">
            @csrf
            <input type="hidden" name="class_id" value="{{$class_id}}">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Select Subjects to <b>{{$class_name}}</b></h3>
                </div>
                @foreach ($subjects as $key => $item)
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="subjects[]" id=""
                            value="{{$subjects[$key]}}">{{$subjects[$key]['name']}}
                    </label>
                </div>

                @endforeach
                <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
</div>
@endsection
