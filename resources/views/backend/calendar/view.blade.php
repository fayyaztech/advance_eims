@extends('backend.admin.main')
@section('title')
Dashboard
@endsection
@section('section')
<!-- //calendar section start -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Calendar
    </h1>
    <ol class="breadcrumb">
        <li><a class="btn btn-success" href="/calendar/add_event" role="button"><i class="fa fa-plus-circle"
                    aria-hidden="true"></i> Add Event</a></li>
        <li><a class="btn btn-warning" href="/calendar/event_type" role="button"><i class="fa fa-plus-circle"
                    aria-hidden="true"></i> Add Event Type</a></li>
    </ol>
    <br>
</section>

<!-- Main content -->
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    {{-- @foreach ($calendars as $item)
                        {{eventJsonGenerator($item)}}
                    @endforeach --}}
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- calendar section end -->
@endsection
@section("javascript")
<script>
    $(function () {
        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        // var date = new Date()
        // var d = date.getDate(),
        //     m = date.getMonth(),
        //     y = date.getFullYear()
        // console.log(y);
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            //Random default events
            events: [
              <?php
                $count = count($calendars);
                $i = 0;
                foreach($calendars as $event) {
                    $d = eventJsonGenerator($event);
                    echo '{';
                    echo "title:'".$d['title']."',";
                    echo "start:new Date(".$d['start']."),";
                    echo "allDay:".$d['allDay'].",";
                    echo "backgroundColor:'".$d['backgroundColor']."',";
                    echo "borderColor:'".$d['backgroundColor']."',";
                    echo(isset($d['end'])) ? "end:new Date(".$d['end'].")": "";
                    echo(isset($d['url'])) ? "url:'".$d['url']."'" : "";
                    echo '}';
                    if ($count >= $i) {
                        echo ',';
                    }
                    $i++;
                } ?>
            ],
        })
    })

</script>
@endsection
