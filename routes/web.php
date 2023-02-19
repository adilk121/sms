<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Guardian;
use App\Http\Middleware\Teacher;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth/login');
});
Route::get('/login', [ViewController::class, 'login'])->middleware('guest:admin');;
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/register', [ViewController::class, 'register']);


Route::get('/dashboard/principal', [ViewController::class, 'principal'])->middleware('auth')->middleware(Admin::class);
Route::get('/dashboard/teacher', [ViewController::class, 'teacher'])->middleware('auth')->middleware(Teacher::class);
Route::get('/dashboard/guardian', [ViewController::class, 'guardian'])->middleware('auth')->middleware(Guardian::class);
Route::get('/dashboard/student', [ViewController::class, 'student'])->middleware('auth');

Route::get('/add/student', [ViewController::class, 'addStudent'])->middleware('auth')->middleware(Admin::class);
Route::get('/add/guardian', [ViewController::class, 'addGuardian'])->middleware('auth')->middleware(Admin::class);
Route::get('/add/teacher', [ViewController::class, 'addTeacher'])->middleware('auth')->middleware(Admin::class);
Route::get('/add/class', [ViewController::class, 'addClass'])->middleware('auth')->middleware(Admin::class);
Route::get('/add/subject', [ViewController::class, 'addSubject'])->middleware('auth')->middleware(Admin::class);
Route::get('/edit/student/{id}', [ViewController::class, 'editStudent'])->middleware('auth')->middleware(Admin::class);

Route::get('/list/student', [ViewController::class, 'studentList'])->middleware('auth')->middleware(Admin::class);
Route::get('/list/guardian', [ViewController::class, 'guardianList'])->middleware('auth')->middleware(Admin::class);
Route::get('/list/teacher', [ViewController::class, 'teacherList'])->middleware('auth')->middleware(Admin::class);
Route::get('/list/subject', [ViewController::class, 'subjectList'])->middleware('auth')->middleware(Admin::class);
Route::get('/list/class', [ViewController::class, 'classList'])->middleware('auth')->middleware(Admin::class);
Route::get('/delete/{id}', [PrincipalController::class, 'deleteRecords'])->name('deleteRecords');

Route::post('/list/student', [PrincipalController::class, 'updateGuradianTeacherRecords'])->name('updateGuradianTeacherRecords');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::post('/update/student', [PrincipalController::class, 'updateStudent'])->name('updateStudent');
Route::post('/create/student', [PrincipalController::class, 'createStudent'])->name('createStudent');
Route::post('/create/teacher', [PrincipalController::class, 'createTeacher'])->name('createTeacher');
Route::post('/create/guardian', [PrincipalController::class, 'createGuardian'])->name('createGuardian');
Route::post('/create/class', [PrincipalController::class, 'createClass'])->name('createClass');
Route::post('/create/subject', [PrincipalController::class, 'createSubject'])->name('createSubject');
