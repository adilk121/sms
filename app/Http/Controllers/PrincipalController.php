<?php
namespace App\Http\Controllers;
use App\Models\Guardian;
use DB;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//All the links here
class PrincipalController extends Controller
{
    public function createStudent(Request $request)
    {
        // dd($request->all());
        // comments here
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'mobile' => 'required|digits:10',
            'dob' => 'required',
            'class_id' => 'required',
            'subjects' => 'required',
            'guardian_id' => 'required',
            'teacher_id' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0,
        ]);
        $stdID = implode(",", $request->subjects);
        Student::create([
            'user_id' => User::latest()->first()->id,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'class_id' => $request->class_id,
            'guardian_id' => $request->guardian_id,
            'teacher_id' => $request->teacher_id,
            'subjects' => $stdID,
            'gender' => $request->gender,
            'status' => 1,
        ]);
        return redirect()->back()->with('success', 'Student Created Successfully');
    }
    public function createTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'doj' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2
        ]);
        Teacher::create([
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'user_id' => User::latest()->first()->id,
            'doj' => $request->doj,
            'status' => 2
        ]);
        return redirect()->back()->with('success', 'Teacher Created Successfully');
    }
    public function createGuardian(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
            'gender' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1
        ]);
        Guardian::create([
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'user_id' => User::latest()->first()->id,
            'status' => 1
        ]);
        return redirect()->back()->with('success', 'Guardian Created Successfully');
    }
    public function updateStudent(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'mobile' => 'required|digits:10',
            'dob' => 'required',
            'class_id' => 'required',
            'subjects' => 'required',
            'guardian_id' => 'required',
            'teacher_id' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0,
        ]);
        $stdID = implode(",", $request->subjects);
        Student::create([
            'user_id' => User::latest()->first()->id,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'class_id' => $request->class_id,
            'guardian_id' => $request->guardian_id,
            'teacher_id' => $request->teacher_id,
            'subjects' => $stdID,
            'gender' => $request->gender,
            'status' => 1,
        ]);
        return redirect()->back()->with('success', 'Student Updated Successfully');
    }
    public function deleteRecords(Request $request)
    {
        if(!$request->id){
            return redirect()->back()->with('Failed', 'Error please try again');
        }
        User::where('id', $request->id)->firstorfail()->delete();
        
        return redirect()->back()->with('success', 'Student Deleted Successfully');
    }
    
    public function updateGuradianTeacherRecords(Request $request)
    {
        $id = $request->id;
        if(!empty($request->teacher_id))
        { 
            $teacher_id= $request->teacher_id;
        }
        if(!empty($request->guardian_id))
        { 
            $guardian_id= $request->guardian_id;
        }
        $studentsID = $request->cid;
        foreach($studentsID as $STDID){
            if(!empty($request->teacher_id))
        { 
            $update=[
                'teacher_id' =>$teacher_id,
            ];
        }
        if(!empty($request->guardian_id))
        { 
            $update=[
                'guardian_id' =>$guardian_id,
            ];
        }
        if(!empty($request->guardian_id) && !empty($request->teacher_id))
        { 
            $update=[
                'guardian_id' =>$guardian_id,
                'teacher_id' =>$teacher_id,
            ];
        }
            Student::where('user_id',$STDID)->update($update);                        
        }
        return redirect()->back()->with('success', 'Guardian/Parent Updated Successfully');
       
   }
    public function createClass(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        StudentClass::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Class Created Successfully');
    }
    public function createSubject(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Subject::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Subject Created Successfully');
    }
}
