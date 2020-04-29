<div class="row">
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="@if ($profile->photo)
                /uploads/profiles/students/{{$profile->photo}}
                @else
                /assets/images/boy_student.svg
                @endif 
                "
                    alt="User profile picture">

                <h3 class="profile-username text-center">{{$profile->first_name}} {{$profile->last_name}} <small>({{$profile->gender}})</small></h3>

                <p class="text-muted text-center">{{$profile->class_name}}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>GR No.</b> <a class="pull-right">{{$profile->gr_no}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Father Name</b> <a class="pull-right">{{$profile->middle_name}} {{$profile->last_name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Mother Name</b> <a class="pull-right">{{$profile->mother}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Date Of Birth</b> <a class="pull-right">{{$profile->date_of_birth}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Contact</b> <a class="pull-right">{{$profile->contact}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{$profile->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>ADHAAR</b> <a class="pull-right">{{$profile->aadhaar}}</a>
                    </li>
                </ul>
                <ul  class="list-group list-group-unbordered">
                    <li class="list-group-item text-center">
                        <b>Profile</b>
                    </li>
                    <li class="list-group-item">
                        <b>Created</b> <a class="pull-right">{{$profile->created_at}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Last Updated</b> <a class="pull-right">{{$profile->updated_at}}</a>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-lg-8">
        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Date Of Admission</b> <a class="pull-right">{{$profile->date_of_admission}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nationality</b> <a class="pull-right">{{$profile->nationality}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Mother Tongue</b> <a class="pull-right">{{$profile->mother_tongue}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Place Of Birth</b> <a class="pull-right">{{$profile->place_of_birth}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Last Attended School</b> <a class="pull-right">{{$profile->last_attended_school}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Last Attended Class</b> <a class="pull-right">{{$profile->last_attended_class}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Exam Percentage</b> <a class="pull-right">{{$profile->exam_percentage}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Date Of widthdrow Admission</b> <a class="pull-right">{{$profile->date_of_leaving}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Reason Of Leaving School</b> <a class="pull-right">{{$profile->reason_of_leaving}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Bank Name</b> <a class="pull-right">{{$profile->bank_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Account No.</b> <a class="pull-right">{{$profile->account_no}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>IFSC Code</b> <a class="pull-right">{{$profile->ifsc}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>TC Printed</b> <a class="pull-right">{{$profile->tc_printed}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Student Status</b> <a class="pull-right">{{$profile->is_active}}</a>
                        </li>
                    </ul>
                <hr>
                <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                <p class="text-muted">{{$profile->address}}</p>

                <hr>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>