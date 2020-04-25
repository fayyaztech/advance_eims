@extends('backend.admin.main')
@section('title',"student_form")
@section('section')
<div class="row">
    <div class="box col-lg-6">
        <div class="boc-header">
            <h3 class="text-center">Student Admission (Form 1)</h3>
        </div>
        <div class="box-body row">
            <form action="/student/save" method="post" enctype="multipart/form-data">
                @csrf
                @if ($student) <input type="hidden" name="id" value="{{$student->id ?? ''}}"> @endif


                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <label>Select Parent</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" name="parent_id" required>
                            <option selected="selected" value=""> - select -</option>
                            @foreach ($parent as $item)
                            <option value="{{$item->id}}">{{$item->name}} {{$item->contact}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6  @error('name') has-error @enderror">
                        <a name="" id="" class="btn btn-primary" href="/parent/add/" role="button">Add Parent</a>
                    </div>
                </div>

                <br>
                <div class="form-group col-lg-6  @error('name') has-error @enderror">
                    <label class="col-form-label" for="name">Name</label>
                    <input type="text" required="" name="name" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('name'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('lname') has-error @enderror">
                    <label class="col-form-label" for="lname">Last Name</label>
                    <input type="text" required="" name="lname" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('lname'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('mother') has-error @enderror">
                    <label class="col-form-label" for="mother">Mother Name</label>
                    <input type="text" required="" name="mother" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('mother'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('date_of_birth') has-error @enderror">
                    <label class="col-form-label" for="date_of_birth">Date Of Birth</label>
                    <input type="date" required="" name="date_of_birth" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('date_of_birth'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('gender') has-error @enderror">
                    <label class="col-form-label" for="nationality">Gender : </label>
                    <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                    <div class="help-block">@error('gender'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('nationality') has-error @enderror">
                    <label class="col-form-label" for="nationality">Nationality</label>
                    <input type="text" required="" name="nationality" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('nationality'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('mother_tongue') has-error @enderror">
                    <label class="col-form-label" for="mother_tongue">Mother Toung</label>
                    <input type="text" required="" name="mother_tongue" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('mother_tongue'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('place_of_birth') has-error @enderror">
                    <label class="col-form-label" for="place_of_birth">Place Of Birth</label>
                    <input type="text" required="" name="place_of_birth" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('place_of_birth'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('aadhaar') has-error @enderror">
                    <label class="col-form-label" for="aadhaar">AADHAR NO.</label>
                    <input type="text" required="" name="aadhaar" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('aadhaar'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('previous_school') has-error @enderror">
                    <label class="col-form-label" for="previous_school">Previous School</label>
                    <input type="text" required="" name="previous_school" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('previous_school'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('previous_exam') has-error @enderror">
                    <label class="col-form-label" for="previous_exam">Previous Exam</label>
                    <input type="text" required="" name="previous_exam" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('previous_exam'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('exam_percentage') has-error @enderror">
                    <label class="col-form-label" for="exam_percentage">Exam Percentage</label>
                    <input type="text" required="" name="exam_percentage" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('exam_percentage'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('photo_upload') has-error @enderror">
                    <label class="col-form-label" for="photo_upload">Upload photo_upload</label>
                    <input type="file" name="photo_upload" class="form-control" value="{{old("name")}}">
                    <div class="help-block">@error('photo_upload'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-12  @error('address') has-error @enderror">
                    <label class="col-form-label" for="address">Address</label>
                    <textarea type="text" name="address" class="form-control" placeholder="leave Empty If Parent Address Same"
                        id="address">@if ($student){{ $student->address }}@else{{old("address")}}@endif</textarea>
                    <div class="help-block">@error('address'){{ $message }}@enderror
                    </div>
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
</script>

@endsection