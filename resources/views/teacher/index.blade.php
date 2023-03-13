@extends('layouts.wrapper')
@section('content')
<div></div>
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
           <li>              <span><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a></span>
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
                            <li><a href="index.html">Admin Dashboard</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="students.html">Student List</a></li>
                        </ul>
                    </li>
                
                    <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-building"></i> <span> Departments</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="departments.html">Department List</a></li>
                                <li><a href="add-department.html">Department Add</a></li>
                                <li><a href="edit-department.html">Department Edit</a></li>
                            </ul>
                        </li> -->
                    
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
                <div class="col-xl-6 col-sm-6 col-12 d-flex">
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
