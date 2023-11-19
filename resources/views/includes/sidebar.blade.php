<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="/dashboard" class="nav-link dashboard">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item nav-item staff-menu">
                    <a href="#" class="nav-link staff">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Staff
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('staff.table') }}" class="nav-link list_staff">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff List</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('attendance.table') }}" class="nav-link list_attendance">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance List</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('daily.report_index') }}" class="nav-link daily_report_staff">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Report</p>
                            </a>
                        </li>
                    </ul>

                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
