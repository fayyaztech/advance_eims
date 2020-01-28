@extends('backend.admin.main')
@section('title')
Academic Year
@endsection
@section('wrapper')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center">Academic year</h3>
            @if (session()->has("message"))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{session()->get("message")}}</strong>
            </div>
            @endif
            <script>
                $(".alert").alert();

            </script>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg float-right" data-toggle="modal"
                data-target="#academicYear">
                Add Academic Year
            </button>
        </div>
        <div class="col-lg-12">
            <br>
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>Sr. no</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($academic_year as $item)
                    <tr>
                    <td scope="row">{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['start_date']}}</td>
                        <td>{{$item['end_date']}}</td>
                        <td><a href="/delete_academic_year/{{$item['id']}}"<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="academicYear" tabindex="-1" role="dialog" aria-labelledby="academicYearId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/academic_year" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name Of Academic Year</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                placeholder="2020-21" required>
                        </div>
                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="date" class="form-control" name="startDate" id="startDate"
                                aria-describedby="helpId" placeholder="dd/mm/yyyy" required>
                        </div>
                        <div class="form-group">
                            <label for="EndDate">End Date</label>
                            <input type="date" class="form-control" name="endDate" id="EndDate"
                                aria-describedby="helpId" placeholder="dd/mm/yyyy" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
