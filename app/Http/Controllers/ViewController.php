<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;
// All the modules here
class ViewController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function principal()
    {
        $student_count = DB::table('students')->count();
        $teacher_count = DB::table('teachers')->count();
        $guardian_count = DB::table('guardians')->count();
        $class_count = DB::table('student_classes')->count();
        $subject_count = DB::table('subjects')->count();
        return view('principal.index', [
            'student_count' => $student_count,
            'teacher_count' => $teacher_count,
            'guardian_count' => $guardian_count,
            'class_count' => $class_count,
            'subject_count' => $subject_count,
        ]);
    }
    public function teacher()
    {
        $student_count = DB::table('students')->where('teacher_id', auth()->user()->id)->count();
        return view(
            'teacher.index',
            [
                'student_count' => $student_count,
            ]
        );
    }
    public function guardian()
    {
        $student_count = DB::table('students')->where('guardian_id', auth()->user()->id)->count();

        return view('guardian.index', [
            'student_count' => $student_count
        ]);
    }
    public function student()
    {
        $guardian_assigned = DB::table('guardians')->where('guardian_id', )->get();
       // dd($guardian_assigned);
        return view('student.index', [
            'guardian_assigned' => $guardian_assigned
        ]);
    }
    public function addStudent()
    {
        $teachers = DB::table('teachers')->join('users', 'teachers.user_id', '=', 'users.id')->get();
        $guardians = DB::table('guardians')->join('users', 'guardians.user_id', '=', 'users.id')->get();
        $classes = StudentClass::all();
        $subjects = Subject::all();
        return view('principal.addStudent', ['teachers' => $teachers, 'guardians' => $guardians, 'classes' => $classes, 'subjects' => $subjects]);
    }
    public function editStudent(Request $request)
    {
        $students = DB::table('students')->where('user_id', '=', $request->id)->get();
        $teachers = DB::table('teachers')->join('users', 'teachers.user_id', '=', 'users.id')->get();
        $guardians = DB::table('guardians')->join('users', 'guardians.user_id', '=', 'users.id')->get();
        $classes = StudentClass::all();
        $subjects = Subject::all();
        return view('principal.editStudent', ['students' => $students,'teachers' => $teachers, 'guardians' => $guardians, 'classes' => $classes, 'subjects' => $subjects]);
    }
    public function addTeacher()
    {
        return view('principal.addTeacher');
    }
    public function addGuardian()
    {
        return view('principal.addGuardian');
    }
    public function addClass()
    {
        return view('principal.addClass');
    }
    public function addSubject()
    {
        return view('principal.addSubject');
    }
    public function studentList()
    {
        $students = DB::table('students')->join('users', 'students.user_id', '=', 'users.id')
            ->get();
        $guardians = DB::table('guardians')->join('users', 'guardians.user_id', '=', 'users.id')
            ->get();
        $teachers=DB::table('teachers')->join('users','teachers.user_id','=','users.id')->get();
        //Each Student Parent Name:
       // $StdGuardians=DB::table('guardians')->join('students','guardians.user_id','=','students.guardian_id')->join('users','students.guardian_id','=','users.id')->get();
        // Each Student Teacher Name:
      //  $StdTeachers=DB::table('teachers')->join('students','teachers.user_id','=','students.teacher_id')->join('users','students.teacher_id','=','users.id')->get();

        return view(
            'principal.studentList',
            [
                'students' => $students,
                'guardians' => $guardians,
                'teachers' => $teachers
               // 'StdTeachers' => $StdTeachers,
                //'StdGuardians' => $StdGuardians
            ]
        );
    }
    public function teacherList()
    {
        $teachers = DB::table('teachers')->join('users', 'teachers.user_id', '=', 'users.id')
            ->get();
        return view(
            'principal.teacherList',
            [
                'teachers' => $teachers
            ]
        );
    }
    public function guardianList()
    {
        $guardians = DB::table('guardians')->join('users', 'guardians.user_id', '=', 'users.id')
            ->get();
        return view(
            'principal.guardianList',
            [
                'guardians' => $guardians
            ]
        );
    }

}
