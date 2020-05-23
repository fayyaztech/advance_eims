@extends('backend.admin.main')
@section('title','Add Event')
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary pull-right" onclick="formReset();" data-toggle="modal" data-target="#addEvent">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Event
            </button>
            <h3 class="text-center">Add Events</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped table-inverse table-responsive" id="dataTable">
                <thead class="thead-inverse">
                    <tr>
                        {{-- <th>Sr. no</th> --}}
                        <th>Start Date</th>
                        <th>Title</th>
                        <th>End Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Url</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        {{-- <td>{{$loop->index + 1}}</td> --}}
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{isOneDayEvent($event->end_date)}}</td>
                        <td>{{isWholeDayEvent($event->start_time)}}</td>
                        <td>{{blankReturnNull($event->end_time)}}</td>
                        <td>{{blankReturnNull($event->url)}}</td>
                        <td>
                            <a class="btn btn-primary" onclick="editAction({{$event->id}},'{{$event->title}}',{{$event->event_type_id}},'{{$event->start_date}}','{{$event->end_date}}','{{$event->start_time}}','{{$event->end_time}}','{{$event->url}}');" href="javascript:void(0)" role="button"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger"
                                onclick="return confirm('are you sure want to delete {{$event->title}}');"
                                href="/calendar/event/delete/{{$event->id}}" role="button"><i class="fa fa-trash"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEvent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="eventForm">
                    @csrf
                    <input type="hidden" name="id" id="event_id">
                    <div class="form-group">
                        <label for="title">* Title</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title"
                            placeholder="title of Event" required>
                    </div>
                    <div class="form-group">
                        <label for="event_type_id">* Select Event Type</label>
                        <select class="form-control" name="event_type_id" id="event_type_id" required>
                            <option value="">-- select event type --</option>
                            @foreach ($event_types as $type)
                            <option value="{{$type->id}}" style="background-color:{{$type->color}}">{{$type->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">* Start Date / Event Date</label>
                        <input type="date" class="form-control" name="start_date" id="start_date"
                            aria-describedby="helpId" placeholder="event Date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date / Event End Date <i
                                class="fa fa-exclamation-triangle text-waring"></i> <small class="text-danger"> (if
                                one date event not required end date leave blank !)</small></label>
                        <input type="date" class="form-control" name="end_date" id="end_date" aria-describedby="helpId"
                            placeholder="event Date">
                    </div>
                    <div class="form-group">
                        <label for="">Start Time <small class="text-waring"><i
                                    class="fa fa-exclamation-triangle text-waring"></i> whole day event not required
                                statr and end time leave blank</small></label>
                        <input type="time" class="form-control" name="start_time" id="start_time" aria-describedby="helpId"
                            placeholder="HH:MM">
                    </div>
                    <div class="form-group">
                        <label for="">End Time</label>
                        <input type="time" class="form-control" name="end_time" id="end_time" placeholder="HH:MM">
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="url" class="form-control" id="url" name="url" placeholder="http://sublimetechnologies.in">
                    </div>
                    <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    function editAction(e_id, title, event_type_id, start_date, end_date, start_time, end_time, url) {
        $("#eventForm").attr("action","/calendar/event/update");
        $("#event_id").removeAttr("disabled");
        $("#event_id").val(e_id);
        $("#title").val(title);
        $("#event_type_id").val(event_type_id);
        $("#start_date").val(start_date );
        $("#end_date").val(end_date);
        console.log(end_time);
        $("#start_time").val(start_time);
        $("#end_time").val(end_time);
        $("#url").val(url);
        $("#addEvent").modal("show");
    }
    function formReset() {
        $("#event_id").attr("disabled",'true');
        $("#eventForm").trigger("reset");
        $("#eventForm").attr("action","/calendar/event/save");
    }

</script>
@endsection
