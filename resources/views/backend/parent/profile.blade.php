<div class="row">
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="@if ($profile->photo)
                /uploads/profiles/parents/{{$profile->photo}}
                @else
                /assets/images/boy_student.svg
                @endif 
                "
                    alt="User profile picture">

                <h3 class="profile-username text-center">{{$profile->first_name}} {{$profile->last_name}}</h3>

                <p class="text-muted text-center">{{$profile->work_at}}</p>

                <ul class="list-group list-group-unbordered">
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
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                    {{$profile->qualification}}
                </p>

                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Occupation</strong>

                <p class="text-muted">
                    {{$profile->occupation}}
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Organization</strong>

                <p class="text-muted">{{$profile->name_of_organization}}</p>

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