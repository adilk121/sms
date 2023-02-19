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
                            <li><a href="/dashboard/principal">Admin Dashboard</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fas fa-users "></i> <span> Students</span>
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
                            <li><a href="/list/teacher"  >Teacher List</a></li>
                            <li><a href="/add/teacher">Teacher Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu active">
                        <a href="#"><i class="fas fa-building"></i>
                            <span> Guardians</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/guardian" >Guardian List</a></li>
                            <li><a href="/add/guardian" class="active">Guardian Add</a></li>
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
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add Guardian</h3>
                    </div>
                </div>
            </div>
            @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('createGuardian') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Basic Details</span></h5>
                                    </div>
                                  
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" />
                                            <span style="color:red">@error('name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control select" name="gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                            <span style="color:red">@error('gender'){{$message}} @enderror</span>
                                      </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="text" name="mobile" class="form-control" />
                                            <span style="color:red">@error('mobile'){{$message}} @enderror</span>
                                      </div>
                                    </div>
                                   
                                   
                                  
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Login Details</span></h5>
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <input type="email"  name="email" class="form-control" />
                                            <span style="color:red">@error('email'){{$message}} @enderror</span>
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" />
                                            <span style="color:red">@error('password'){{$message}} @enderror</span>
                                       </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" />
                                        </div>
                                    </div>
                                    
                                 
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection