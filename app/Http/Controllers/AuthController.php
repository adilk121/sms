<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>3
        ]);
        auth()->login($user);
        return redirect('/dashboard/principal');
        
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only(['email', 'password']))) {
            return redirect()->back()->with('failed', 'Please enter correct login creadential');
       
        }
        //role based redirect
        if (auth()->user()->role == '0') {
            return redirect('/dashboard/student');
        }
        if (auth()->user()->role == '1') {
            return redirect('/dashboard/guardian');
        }
        if (auth()->user()->role == '2') {
            return redirect('/dashboard/teacher');
        }
        if (auth()->user()->role == '3') {
            return redirect('/dashboard/principal');
        }
    }

    // public function addPrincipal(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'role' => '3'
    //     ]);

    //     auth()->login($user);

    //     return redirect('/principal');
    // }

    public function addTeacher(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => '1'
        ]);

        auth()->login($user);

        return redirect('/teacher');
    }

    public function addStudent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => '0'
        ]);

        auth()->login($user);

        return redirect('/student');
    }
}
