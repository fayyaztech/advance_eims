@extends('backend.admin.main')
@section('title',"parent_form")
@section('section')
<div class=" col-md-6 col-lg-6">
    <div class="box">
        <div class="boc-header">
            <h3 class="text-center">Add parent Form</h3>
        </div>
        <div class="box-body">
            <form action="@if ($parent) /parent/update @else /parent/save @endif" method="post"
                enctype="multipart/form-data">
                @csrf
                @if ($parent) <input type="hidden" name="id" value="{{$parent->id}}"> @endif
                <div class="form-group  @error('name') has-error @enderror">
                    <label class="col-form-label" for="validationCustom02">Name</label>
                    <input type="text" required="" name="name" class="form-control
                id=" validationCustom02" value="@if($parent){{$parent->name}}@else {{old("name")}} @endif">
                    <div class="help-block">@error('name'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group @error('contact') has-error @enderror">
                    <label class="col-form-label" for="contact">Contact</label>
                    <input type="text" required="" name="contact" class="form-control" id="contact"
                        value="@if ($parent){{$parent->contact}}@else {{old("contact")}} @endif">
                    <div class="help-block">@error('contact'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    <label class="col-form-label" for="email">Email</label>
                    <input type="text" required="" name="email" class="form-control" id="email"
                        value="@if ($parent){{ $parent->email }}@else {{old("email")}} @endif">
                    <div class="help-block">@error('email'){{ $message }}@enderror
                    </div>
                </div>
                <div class="form-group @error('Qualification') has-error @enderror">
                    <label class="col-form-label" for="qualification">Qualification</label>
                    <input type="text" name="qualification" class="form-control" id="qualification"
                        value="@if ($parent){{ $parent->qualification }}@else {{old("qualification")}} @endif">
                    <div class="help-block">@error('qualification'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group @error('aadhaar') has-error @enderror">
                    <label class="col-form-label" for="aadhaar">Aadhaar</label>
                    <input type="number" name="aadhaar" class="form-control" id="aadhaar"
                        value="@if ($parent){{ $parent->aadhaar }}@else{{old("aadhaar")}}@endif">
                    <div class="help-block">@error('aadhaar'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group @error('name_of_organization') has-error @enderror">
                    <label class="col-form-label" for="name_of_organization">Work At</label>
                    <input type="text" name="name_of_organization" class="form-control" id="name_of_organization"
                        value="@if ($parent){{ $parent->name_of_organization }}@else{{old("name_of_organization")}}@endif">
                    <div class="help-block">@error('name_of_organization'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group @error('occupation') has-error @enderror">
                    <label class="col-form-label" for="occupation">Occupation</label>
                    <input type="text" name="occupation" class="form-control" id="occupation"
                        value="@if ($parent){{ $parent->occupation }}@else{{old("occupation")}}@endif">
                    <div class="help-block">@error('occupation'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group  @error('address') has-error @enderror">
                    <label class="col-form-label" for="address">Address</label>
                    <textarea type="text" required="" name="address" class="form-control"
                        id="address">@if ($parent){{ $parent->address }}@else{{old("address")}}@endif</textarea>
                    <div class="help-block">@error('address'){{ $message }}@enderror
                    </div>
                </div>

                <div class="form-group @error('photo') has-error @enderror">
                    <label class="col-form-label" for="photo">Upload Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo"
                        value="@if ($parent){{ $parent->photo }}@endif">
                    <div class="help-block">@error('photo'){{ $message }}@enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="/parent" role="button">Cancle</a>
            </form>
        </div>
    </div>
</div>
@endsection