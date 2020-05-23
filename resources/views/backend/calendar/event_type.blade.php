@extends('backend.admin.main')
@section('title','Event Types')
@section('section')
<div class="container-fluid dashboard-content">
    <div class="box">
        <div class="box-header">
            @if (session()->has("message"))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{session()->get("message")}}
            </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <a class="btn btn-primary pull-right" href="/calendar" role="button"><i class="fa fa-arrow-left"></i>
                    Back
                    to Calendar</a>
                <h3 class="text-center">Event Type</h3>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-6 col-lg-6">
                <h3>Event Types</h3>
                <table class="table table-stripped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name & Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event_types as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td><span style="color:{{$item->color}}">{{$item->name}}</span></td>
                            <td>
                            <a class="btn btn-primary" onclick="updateEventFunction({{$item->id}},'{{$item->name}}','{{$item->color}}')" href="javascript:void(0)"
                                    role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a class="btn btn-danger"
                                    onclick="return confirm('Do you want to delete {{$item->name}} ?');"
                                    href="/calendar/event_type/delete/{{$item->id}}" role="button"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-lg-6">
                <a id="btnNew" onclick="addNew();" class="btn btn-success pull-right" href="javascript:void(0)"
                    role="button">Add New</a>
                <div id="newEventType">
                    <h3>Add New Event Type</h3>
                    <form action="/calendar/event_type/save" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Holiday, Exam, fastival">
                        </div>
                        <div class="form-group">
                            <label for="color">Lable Color</label>
                            <select class="form-control" name="color">
                                <option>red</option>
                                <option>green</option>
                                <option>orange</option>
                                <option>blue</option>
                                <option>pink</option>
                                <option>purple</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
                <div id="updateEventType">
                    <h3>Update Event</h3>
                    <form action="/calendar/event_type/update" method="post">
                        @csrf
                        <input type="hidden" name="id" id="eventId">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Holiday, Exam, fastival">
                        </div>
                        <div class="form-group">
                            <label for="color">Lable Color</label>
                            <select class="form-control" name="color" id="color">
                                <option>red</option>
                                <option>green</option>
                                <option>orange</option>
                                <option>blue</option>
                                <option>pink</option>
                                <option>purple</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    var newEvent = $("#newEventType");
    var updateEvent = $("#updateEventType");
    var _id = $("#eventId");
    var _name = $("#name");
    var _color = $("#color");
    $(document).ready(function () {
        newEvent.hide();
        updateEvent.hide()
        console.log("hidden");
    });

    function addNew() {
        console.log("show");
        newEvent.show();
        updateEvent.hide()
    }

    function updateEventFunction(id, name, color) {
        console.log(id+name+color);
        newEvent.hide();
        _id.val(id);
        _name.val(name);
        _color.val(color);
        updateEvent.show()
    }

</script>
@endsection
