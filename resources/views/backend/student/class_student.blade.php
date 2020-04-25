@extends('backend.admin.main')
@section('title',"student_form")
@section('section')
<div class="row">
    <div class="box col-lg-6">
        <div class="boc-header">
            <h3 class="text-center">Student Admission (Form 2 Class Form)</h3>
        </div>
        <div class="box-body row">
            <form action="/student/save_class" method="post">
                @csrf
                <input type="hidden" name="student_id" value="{{$student_id}}">
                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <label>Select Class</label>
                        <select id="loadOptionalSubjects" class="form-control select2 select2-hidden-accessible"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="class_id"
                            required>
                            <option selected="selected" value=""> - select -</option>
                            @foreach ($classes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-lg-6">
                    <h3>Select Option Subjct From Groups</h3>
                    <div id="optional_subjects"></div>
                </div>

                <div class="col-lg-12 offset-lg-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-danger pull-right" href="/student" role="button">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $('.select2').select2();
    $("#loadOptionalSubjects").change(function () {
        var classId = $(this).val();
        $.get("/student/load_optional_subjects/" + classId, function (data, ) {
            $("#optional_subjects").html(data);
        });
    })
</script>

@endsection