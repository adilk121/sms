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
                        <a href="#"><i class="fas fa-users "></i> <span> Students</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/list/student" class="active">Student List</a></li>
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
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Students</h3>
                        
                    </div>
                    <div class="col-auto text-end float-end ms-auto">
                        <a href="/add/student" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 datatable">
                                <div class="row" style="margin-left: 15px;">
                                    <form action="{{ route('updateGuradianTeacherRecords') }}" name="form" method="post" enctype="multipart/form-data">
                                        @csrf
                                         <div class="form-group">
                  <input  type="checkbox" name="check_all" id="check_all" onclick="checkall(this.form)" value="1"   />
                  <select name="guardian_id" style="width:200px; height: 32px;border-radius: 25px;">
                  <option value=""> Assign Guardian</option>
                 
                  @foreach ($guardians as $guardian)        
                    <option value="{{$guardian->id}}">{{$guardian->name}}</option>
                    
                    @endforeach
                     </select>
                  
                 
                  <select name="teacher_id"  style="width:200px; height: 32px;border-radius: 25px;">
                  <option value=""> Assign Teacher</option>
                 
                  @foreach ($teachers as $teacher)        
                  <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                  
                  @endforeach
                    
                    
                     </select>
                  <button type="submit" onclick="return select_one()" name="submit_teachers" class="btn btn-primary" ><span></span> Shift</button>
                


                </div>
                                
              </div>
                                    <thead>
                                        <tr>
                                        <th></th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>DOB</th>
                                            <th>Guardian Name</th>
                                            <th>Mobile Number</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($students as $student)
                                   <tr>
                                            <td> <input type="checkbox" name="cid[]" id="cid[]" value="{{$student->user_id}}"></td>
                                            <td>{{$student->id}}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="">{{$student->name}}</a>
                                                </h2>
                                            </td>
                                            <td>11 B</td>
                                            <td>{{$student->dob}}</td>
                                            <td>Static Guardian</td>
                                            <td>{{$student->mobile}}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="/edit/student/{{$student->id}}" class="btn btn-sm bg-success-light me-2">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="{{route('deleteRecords',$student->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                        @endforeach
                                    </tbody>
                                </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script language="javascript" type="text/javascript">
            function checkall(objForm) {
              //alert(objForm);
              len = objForm.elements.length;
              var i = 0;
              for (i = 0; i < len; i++) {
                if (objForm.elements[i].type == "checkbox") {
                  objForm.elements[i].checked = objForm.check_all.checked;
                }
              }
            }
            
            function select_one()
            {
            var chks = document.getElementsByName('cid[]');
            var hasChecked = false;
            for (var i = 0; i < chks.length; i++)
            {
            if (chks[i].checked)
            {
            hasChecked = true;
            break;
            }else{
            hasChecked = false;
            }
            }
            if (hasChecked == false)
            {
            alert("Please select at least one !");
            return false;
            }else{
            return true;
            }
            }
            </script>
        <footer>
            <p>Copyright © 2020 Dreamguys.</p>
        </footer>
    </div>
</div>
@endsection