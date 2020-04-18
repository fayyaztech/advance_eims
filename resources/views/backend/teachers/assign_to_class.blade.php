@extends('backend.admin.main')
@section('title',"Teachers")
@section('section')
<div class="box">
    <div class="box-header">
        <div class="box-title">
            <h3>Assign Teacher to Class</h3>
        </div>
        <ul>
            <li>Select Class and assign Teacher to class</li>
        </ul>
    </div>
    <div class="box-body">
        @if ($assigned_class)
        <form class="col-lg-6" action="/teacher/leave_to_class" method="post">
            <h3>Alerady Assigned To Class {{$all_classes[$assigned_class]}}</h3>
            @csrf
            <input type="hidden" name="is_active" value="0">
            <input type="hidden" name="id" value="{{$assigned_class_id ?? ''}}">
            <div class="form-group">
                <label for="leaving_date">Leaving Date</label>
                <input type="date" class="form-control" name="leaving_date" id="joining_date " required>
            </div>
            <button type="submit" class="btn btn-primary">Leave Class</button>
            <a class="btn btn-danger" href="/teacher" role="button">Cancel</a>
        </form>
        @endif
        <form class="col-lg-6" action="{{$url ?? '/teacher/assign_to_class'}}" method="post">
            <h4>Assign <b>{{strtoupper($teacher->name)}}</b> As A Class Teacher for Following Class</h4>
            @csrf
            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
            <input type="hidden" name="id" value="{{$assigned_class_id ?? ''}}">
            <div class="form-group">
                <label for="class_id">Select Class</label>
                <select class="form-control" name="class_id" id="class_id" required>
                    <option value="">-- Select --</option>
                    @foreach ($classes as $key => $item)
                    <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="joining_date">Joining Date</label>
                <input type="date" class="form-control" name="joining_date" id="joining_date " required
                    placeholder="Joining">
            </div>
            <button type="submit" class="btn btn-primary">{{$change_class ?? "Assign Class"}}</button>
            <a class="btn btn-danger" href="/teacher" role="button">Cancel</a>

        </form>
    </div>
</div>
@endsection