@extends('backend.admin.main')
@section('title')
Sections
@endsection
@section('section')
<section class="content-header">
    <h1>
        Add Sections
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <form action="{{$section->url ?? '/sections/save'}}" method="post">
        @csrf
        @if ($section ?? '') <input type="hidden" name="id" value="{{$section ?? ''->id}}"> @endif
        <div class="form-group">
            <label for="name">Section Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                placeholder="Section name" value="{{$section->name ?? ''}}">
            NOTE : if no sections in your institute please create A as default</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
@endsection
