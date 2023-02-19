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

                    <li class="submenu active">
                        <a href="#"><i class="fas fa-users"></i> <span> Students</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/student">Student List</a></li>
                            <li><a href="/add/student" class="active">Student Add</a></li>
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
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Add Students</h3>
                
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
                  <form action="{{ route('createStudent') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title">
                          <span>Student Information</span>
                        </h5>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Student Name <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control" />
                          <span style="color:red">@error('name'){{$message}} @enderror</span>
                        </div>
                      </div>
                      
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Email <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <input type="email"  value="{{old('email')}}" name="email" id="email" autocomplete="off" autofill="no" class="form-control" />
                          <span style="color:red">@error('email'){{$message}} @enderror</span>
                        </div>
                        
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Mobile Number <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <input type="text" value="{{old('mobile')}}"  name="mobile" id="mobile" class="form-control" maxlength="12" />
                          <span style="color:red">@error('mobile'){{$message}} @enderror</span>
                        </div>
                      </div>
                     
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Date of Birth <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <div>
                            <input type="date" value="{{old('dob')}}" name="dob" id="dob" class="form-control" />
                            <span style="color:red">@error('dob'){{$message}} @enderror</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Gender <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <select class="form-control select " name="gender" id="gender">
                            <option>Select Gender</option>
                            <option  value="M">Male</option>
                            <option  value="F">Female</option>
                            
                          </select>
                          <span style="color:red">@error('gender'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Class <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <select class="form-control select" name="class_id" id="class_id" onChange="loadSubject(this.value)">
                            <option value="">Select Class</option>
                            
                            @foreach($classes as $class)
                            <option value="{{$class->id}}">
                              {{$class->name}}
                             
                            </option>
                            @endforeach
                            
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-12 col-sm-6" id="subject-area">
                        <div class="form-group">
                        @foreach($subjects as $subject)
                          <input type="checkbox" name="subjects[{{$subject->id}}]" value="{{$subject->id}}"> {{$subject->name}}
                          @endforeach
                        </div></div>
                          <div class="col-12">
                        <h5 class="form-title">
                          <span>Guardian Information </span>
                        </h5>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Guardian Name </label>
                          <select class="form-control select" name="guardian_id">
                            <option>
                            Select Guardian
                            </option>
                            @foreach($guardians as $guardian)
                            <option value="{{$guardian->user_id}}">
                              {{$guardian->name}}
                             
                            </option>
                            @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <h5 class="form-title">
                          <span>Teacher Information</span>
                        </h5>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Teacher Name <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <select class="form-control select" name="teacher_id" id="teacher_id">
                            <option>
                            Select Teacher
                            </option>
                            @foreach($teachers as $teacher)
                            <option value="{{$teacher->user_id}}">
                              {{$teacher->name}}
                             
                            </option>
                            @endforeach
                         </select>
                        </div>
                      </div>

                      <div class="col-12">
                        <h5 class="form-title">
                          <span>Login Info</span>
                        </h5>
                      </div>
                      
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Password <i class="fa fa-asterisk" style="font-size:0.425em;color:red ;" aria-hidden="true"></i></label>
                          <input type="password" class="form-control" name="password" id="password" />
                          <span style="color:red">@error('password'){{$message}} @enderror</span>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <button type="submit" name="Submit" class="btn btn-primary">
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

    <footer>
            <p>Copyright © 2022 SMS</p>
          </footer>
        </div>
      </div>
    </div>
    
@endsection
  
