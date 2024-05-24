<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
{{--             
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>John Doe</span>
                        <div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="#"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="#"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div> --}}
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                
                <li class="nav-item pcoded-menu-caption">
                    <label>Students Registrations</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('registers.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Students</span></a>
                </li>
                {{-- <li class="nav-item pcoded-menu-caption">
                    <label>Courses</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('courses.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Course Lists</span></a>
                </li> --}}

                <li class="nav-item pcoded-menu-caption">
                    <label>Colleges</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('college.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">College</span></a>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Pages</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="#" target="_blank">Sign up</a></li>
                        <li><a href="#" target="_blank">Sign in</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li> --}}

            </ul>
            
        </div>
    </div>
</nav>