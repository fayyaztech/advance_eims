@extends('backend.admin.main')
@section('title','Subject groups');
@section('section')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h3 class="text-center">Assign Subjects to groups</h3>
        @if (session()->has("message"))
        @include('layouts.notification')
        @endif
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="box box-success">
            <form class="box-body" action="/classes/save_assigned_groups" method="post">
                @csrf
                <input type="hidden" name="class_id" value="{{$class->id}}">
                <div class="box-header">
                    <h3 class="box-title">Select Sabjects to <b>{{$class->name}}</b></h3>
                </div>
                <input type="hidden" name="class_id" value="{{$class->id}}">
                @foreach ($groups as $key => $item)
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="groups[]" id=""
                            value="{{$key}}" {{$item['checked']}}>{{$item['name']}}
                    </label>
                </div>

                @endforeach
                <button type="submit" class="btn btn-primary">save</button>
                <a name="" id="" class="btn btn-danger" href="/classes" role="button">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
