<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="/dashboard"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="/calendar"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Student Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/students"><i class="fa fa-users"></i> Students List</a></li>
                    <li><a href="/students"><i class="fa fa-plus-circle"></i> Add Students</a></li>
                    <li><a href="/students"><i class="fa fa-users"></i> Students Attendance</a></li>
                    <li><a href="/students"><i class="fa fa-users"></i> Students Promot</a></li>
                </ul>
            </li>
            <li><a href="/parent"><i class="fa fa-users"></i> <span>Parent Management</span></a></li>
            <li><a href="/teacher"><i class="fa fa-users"></i> <span>Teacher Management</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Exam & Grades</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/students"><i class="fa fa-users"></i> Exam List</a></li>
                    <li><a href="/students"><i class="fa fa-plus-circle"></i> Exam Typeli</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Account Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/students"><i class="fa fa-users"></i> Create Fees</a></li>
                    <li><a href="/students"><i class="fa fa-users"></i> Apply Fees</a></li>
                    <li><a href="/students"><i class="fa fa-users"></i> Collect Fees</a></li>
                    <li><a href="/students"><i class="fa fa-users"></i> Add income</a></li>
                    <li><a href="/students"><i class="fa fa-users"></i> Add Expenses</a></li>

                </ul>
            </li>


            <li class="header">SETTINGS</li>
            <li><a href="/institute_setup"><i class="fa fa-circle-o text-red"></i> <span>Institute Setup</span></a></li>
            <li><a href="/academic_year"><i class="fa fa-circle-o text-yellow"></i> <span>Academic Year</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Subjects</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="/row_subjects">Row Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/subject_groups">Subject Group</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Class & sections</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/classes"><i class="fa fa-list-ol" aria-hidden="true"></i> Classes</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="/dashboard"><i
                        class="fa fa-fw fa-users"></i> User Management</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/dashboard"><i
                        class="fa fa-fw fa-key"></i> Change Password</a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
