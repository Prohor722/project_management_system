<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GroupStudentController;
use App\Http\Controllers\StudentMarkController;

//Common Routes
Route::get('/', [LoginController::class,'index'])->name('login.index');
Route::post('/login', [LoginController::class,'verify'])->name('login.verify');
Route::get('/logout', [LoginController::class,'logout'])->name('logout.index');
Route::get('/admin/create', [LoginController::class,'admin']);


//----------------------Admin Routes---------------------------//

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
    //students
    Route::resource('/admin/student', StudentController::class);
    //teachers
    Route::view('/admin/addTeacher', 'admin.addTeacher')->name('add-teacher');
    Route::resource('/admin/teacher', TeacherController::class);
    //marks
    Route::view('/admin/marks', 'admin.marks')->name('admin-marks');
});


//----------------------Teacher Routes-----------------------------//

Route::middleware(['teacher'])->group(function () {

    Route::get('/teacher', function(){
        return view('teacher.index');
    })->name('teacher.index')->middleware('user','teacher');
    Route::view('/teacher/studentList', 'teacher.studentList')->name('teacher-student-list');

    //groups
    Route::resource('/teacher/groups', GroupController::class);

    //manage groupstudents
    Route::get('/teacher/group/manage/{id}', [GroupStudentController::class, 'index']);
    Route::post('/teacher/group/manage/{id}', [GroupStudentController::class, 'addStudent']);
    Route::delete('/teacher/group/manage/{id}', [GroupStudentController::class, 'destroy']);

    //manage student marks
    Route::get('/teacher/group/manage/marks/{id}', [StudentMarkController::class, 'index']);

    //Topic
    Route::resource('/teacher/topic', TopicController::class);
    //Notice
    Route::resource('/teacher/notice', NoticeController::class);
    //tasks
    Route::resource('/teacher/tasks', TaskController::class);
});


//-------------------- Group Routes --------------------------------//

Route::middleware(['group'])->group(function () {

    Route::get('/student', 'App\Http\Controllers\StudentController@index')->name('student.index');
    Route::view('/student/notice', 'group.notice')->name('student-notice');
    Route::view('/student/tasks', 'group.notice')->name('student-tasks');
});

//--------------  Test Routes -------------
Route::get('/test', function(){
    session(['name'=>"Prohor Web"]);
});

Route::get('/all', [TestController::class, 'index']);
Route::get('/abc', [TestController::class, 'abc']);
