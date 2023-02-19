@extends('layouts.wrapper')
@section('content')
<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="index.html" class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" />
            </a>
            <a href="index.html" class="logo logo-small">
                <img src="{{ asset('img/logo-small.png') }}" alt="Logo" width="30" height="30" />
            </a>
        </div>

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-align-left"></i>
        </a>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
           <li>              <span>
          
         <a href="/logout"> <button type="button" class="btn btn-primary">Logout</button></a>
           
        </span>
           </li>
        </ul>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Dashboard</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/dashboard/principal">Admin Dashboard</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fas fa-users"></i> <span> Students</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/student">Student List</a></li>
                            <li><a href="/add/student">Student Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                            <span> Teachers</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/teacher">Teacher List</a></li>
                            <li><a href="/add/teacher">Teacher Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-building"></i>
                            <span> Guardians</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/guardian">Guardian List</a></li>
                            <li><a href="/add/guardian">Guardian Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/subjects">Subject List</a></li>
                            <li><a href="/add/subject">Subject Add</a></li>
                        </ul>
                    </li><li class="submenu">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Class</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/class">Class List</a></li>
                            <li><a href="/add/class">Class Add</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{auth()->user()->name}}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-one w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="db-info">
                                    <h3>{{$student_count}}</h3>
                                    <h6>Students</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-two w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="db-info">
                                    <h3>{{$teacher_count}}</h3>
                                    <h6>Teachers</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-three w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="db-info">
                                    <h3>{{$guardian_count}}</h3>
                                    <h6>Guardians</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-three w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="db-info">
                                    <h3>{{$class_count}}</h3>
                                    <h6>Classes</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title">Star Students</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th class="text-center">Marks</th>
                                            <th class="text-center">Percentage</th>
                                            <th class="text-end">Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>PRE2209</div>
                                            </td>
                                            <td class="text-nowrap">John Smith</td>
                                            <td class="text-center">1185</td>
                                            <td class="text-center">98%</td>
                                            <td class="text-end">
                                                <div>2019</div>
                                            </td>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <footer>
            <p>Copyright © 2022 SMS.</p>
        </footer>
    </div>
</div>
@endsection