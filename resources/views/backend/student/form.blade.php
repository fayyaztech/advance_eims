@extends('backend.admin.main')
@section('title',"student_form")
@section('section')
<div class="row">
    <div class="box col-lg-6">
        <div class="boc-header">
            <h3 class="text-center">{{ $update_heading ?? 'Student Admission Form' }} (Basic Information)</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="box-body row">
            <form action="{{$url ?? '/student/save'}}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($student) <input type="hidden" name="id" value="{{$student->id ?? ''}}"> @endif
                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <label>Select Parent</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" name="parent_id" required>
                            <option selected="selected" value=""> - select -</option>
                            @foreach ($parent as $item)
                            <option value="{{$item->id}}" @isset($student->parent_id)
                                @if ($student->parent_id == $item->id)selected

                                @endif
                                @endisset}} >{{$item->first_name}} {{$item->last_name}} {{$item->contact}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6  @error('name') has-error @enderror">
                        <a name="" id="" class="btn btn-primary" href="/parent/add/" role="button">Add Parent</a>
                    </div>
                </div>

                <br>
                <div class="form-group col-lg-6  @error('first_name') has-error @enderror">
                    <label class="col-form-label" for="first_name">Name</label>
                    <input type="text" required="" name="first_name" class="form-control"
                        value="{{isset($student->first_name)? $student->first_name : old("first_name")}}">
                    <div class="help-block">@error('first_name'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('last_name') has-error @enderror">
                    <label class="col-form-label" for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control"
                        value="{{isset($student->last_name)? $student->last_name : old("last_name")}}">
                    <div class="help-block">@error('last_name'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('mother') has-error @enderror">
                    <label class="col-form-label" for="mother">Mother Name</label>
                    <input type="text" required="" name="mother" class="form-control"
                        value="{{isset($student->mother)? $student->mother : old("mother")}}">
                    <div class="help-block">@error('mother'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('date_of_birth') has-error @enderror">
                    <label class="col-form-label" for="date_of_birth">Date Of Birth</label>
                    <input type="date" required="" name="date_of_birth" class="form-control"
                        value="{{isset($student->date_of_birth)? $student->date_of_birth:old("date_of_birth")}}">
                    <div class="help-block">@error('date_of_birth'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('gender') has-error @enderror">
                    <label class="col-form-label" for="nationality">Gender : </label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">-- Select Gender --</option>
                        <option value="Male" @if (old('gender')=='Male' )selected @endif @isset($student) 
                        @if($student->gender == 'Male')selected @endif @endisset>Male</option>
                        <option value="Female" @if (old('gender')=='Female' )selected @endif @isset($student) 
                        @if($student->gender == 'Female')selected @endif @endisset>Female</option>
                    </select>
                    <div class="help-block">@error('gender'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('nationality') has-error @enderror">
                    <label class="col-form-label" for="nationality">Nationality</label>
                    <input type="text" required="" name="nationality" class="form-control"
                        value="{{isset($student->nationality)? $student->nationality:old("nationality")}}">
                    <div class="help-block">@error('nationality'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('mother_tongue') has-error @enderror">
                    <label class="col-form-label" for="mother_tongue">Mother Toung</label>
                    <input type="text" required="" name="mother_tongue" class="form-control"
                        value="{{isset($student->mother_tongue)? $student->mother_tongue:old("mother_tongue")}}">
                    <div class="help-block">@error('mother_tongue'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('place_of_birth') has-error @enderror">
                    <label class="col-form-label" for="place_of_birth">Place Of Birth</label>
                    <input type="text" required="" name="place_of_birth" class="form-control"
                        value="{{isset($student->place_of_birth)? $student->place_of_birth:old("place_of_birth")}}">
                    <div class="help-block">@error('place_of_birth'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('aadhaar') has-error @enderror">
                    <label class="col-form-label" for="aadhaar">AADHAR NO.</label>
                    <input type="text" required="" name="aadhaar" class="form-control"
                        value="{{isset($student->aadhaar)? $student->aadhaar:old("aadhaar")}}">
                    <div class="help-block">@error('aadhaar'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('gr_no') has-error @enderror">
                    <label class="col-form-label" for="gr_no">GR NO.</label>
                    <input type="text" required="" name="gr_no" class="form-control"
                        value="{{isset($student->gr_no)? $student->gr_no:old("gr_no")}}">
                    <div class="help-block">@error('gr_no'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('last_attended_school') has-error @enderror">
                    <label class="col-form-label" for="last_attended_school">Last Attended School</label>
                    <input type="text" required="" name="last_attended_school" class="form-control"
                        value="{{isset($student->last_attended_school)? $student->last_attended_school:old("last_attended_school")}}">
                    <div class="help-block">@error('last_attended_school'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('last_attended_class') has-error @enderror">
                    <label class="col-form-label" for="last_attended_class">Previous Exam</label>
                    <input type="text" required="" name="last_attended_class" class="form-control"
                        value="{{isset($student->last_attended_class)? $student->last_attended_class:old("last_attended_class")}}">
                    <div class="help-block">@error('last_attended_class'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('last_attended_exam') has-error @enderror">
                    <label class="col-form-label" for="last_attended_exam">Last Attended Exam</label>
                    <input type="text" required="" name="last_attended_exam" class="form-control"
                        value="{{isset($student->last_attended_exam)? $student->last_attended_exam:old("last_attended_exam")}}">
                    <div class="help-block">@error('last_attended_exam'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('exam_percentage') has-error @enderror">
                    <label class="col-form-label" for="exam_percentage">Exam Percentage</label>
                    <input type="text" required="" name="exam_percentage" class="form-control"
                        value="{{isset($student->exam_percentage)? $student->exam_percentage:old("exam_percentage")}}">
                    <div class="help-block">@error('exam_percentage'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('bank_name') has-error @enderror">
                    <label class="col-form-label" for="bank_name">Bank Name</label>
                    <input type="text" required="" name="bank_name" class="form-control"
                        value="{{isset($student->bank_name)? $student->bank_name:old("bank_name")}}">
                    <div class="help-block">@error('bank_name'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('account_no') has-error @enderror">
                    <label class="col-form-label" for="account_no">Account NO</label>
                    <input type="text" required="" name="account_no" class="form-control"
                        value="{{isset($student->account_no)? $student->account_no:old("account_no")}}">
                    <div class="help-block">@error('account_no'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('ifsc') has-error @enderror">
                    <label class="col-form-label" for="ifsc">IFSC</label>
                    <input type="text" required="" name="ifsc" class="form-control"
                        value="{{isset($student->ifsc)? $student->ifsc:old("ifsc")}}">
                    <div class="help-block">@error('ifsc'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-6  @error('photo_upload') has-error @enderror">
                    <label class="col-form-label" for="photo_upload">Upload photo_upload</label>
                    <input type="file" name="photo_upload" class="form-control" value="{{old("photo_upload")}}">
                    <div class="help-block">@error('photo_upload'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group col-lg-12  @error('address') has-error @enderror">
                    <label class="col-form-label" for="address">Address</label>
                    <textarea type="text" name="address" class="form-control"
                        placeholder="leave Empty If Parent Address Same"
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