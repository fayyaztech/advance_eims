@extends('backend.admin.main')
@section('title','Subject group');
@section('css','<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/multi-select/css/multi-select.css')}}">')
@section('wrapper')
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
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Boxed Multiselect</h5>
                        <div class="card-body">
                            <select multiple="multiple" id="my-select" name="my-select[]" style="position: absolute; left: -9999px;">
                                <option value="elem_1">Elements 1</option>
                                <option value="elem_2">Elements 2</option>
                                <option value="elem_3">Elements 3</option>
                                <option value="elem_4">Elements 4</option>
                            </select><div class="ms-container" id="ms-my-select"><div class="ms-selectable"><ul class="ms-list" tabindex="-1"><li class="ms-elem-selectable" id="-1300566143-selectable" style=""><span>Elements 1</span></li><li class="ms-elem-selectable" id="-1300566142-selectable" style=""><span>Elements 2</span></li><li class="ms-elem-selectable" id="-1300566141-selectable" style=""><span>Elements 3</span></li><li class="ms-elem-selectable" id="-1300566140-selectable" style=""><span>Elements 4</span></li></ul></div><div class="ms-selection"><ul class="ms-list" tabindex="-1"><li class="ms-elem-selection ms-hover" id="-1300566143-selection" style="display: none;"><span>Elements 1</span></li><li class="ms-elem-selection ms-hover" id="-1300566142-selection" style="display: none;"><span>Elements 2</span></li><li class="ms-elem-selection ms-hover" id="-1300566141-selection" style="display: none;"><span>Elements 3</span></li><li class="ms-elem-selection ms-hover" id="-1300566140-selection" style="display: none;"><span>Elements 4</span></li></ul></div></div>
                        </div>
                    </div>
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
