<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    if(Auth::check()){
        if(Auth::user()->isTeacher()){
            return redirect('/teacher');
        }else{
            return redirect('/student');
        }
    }
    return redirect('/login');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'student', 'middleware' =>['ensureStudent']], function () {
    Route::get('/', function () {
        return view('student.studentPanel');
    });
});

Route::group(['prefix' => 'teacher', 'middleware' =>['ensureTeacher']], function () {
    Route::get('/', function () {
        return view('teacher..teacherPanel');
    });

    //User routers
    Route::get('/users', [\App\Http\Controllers\userController::class, 'userList']);
    Route::get('/addUser', function () {
        return view('teacher.Users.addUser');
    });
    Route::post('/addUser', [\App\Http\Controllers\userController::class, 'addUser'])->name('addUser');
    Route::post('/user/d/{id}', [\App\Http\Controllers\userController::class, 'delUser'])->name('delUser');
    Route::post('/user/{id}', [\App\Http\Controllers\userController::class, 'saveUser'])->name('saveUser');
    Route::get('/user/{id}', [\App\Http\Controllers\userController::class, 'editUser']);

    //Question routers
    Route::get('/questions', [\App\Http\Controllers\questionController::class, 'questionList']);
    Route::get('/addQuestion', function () {
        return view('teacher.Questions.addQuestion');
    });
    Route::post('/addQuestion', [\App\Http\Controllers\questionController::class, 'addQuestion'])->name('addQuestion');
    Route::post('/question/d/{id}', [\App\Http\Controllers\questionController::class, 'delQuestion'])->name('delQuestion');
    Route::post('/question/{id}', [\App\Http\Controllers\questionController::class, 'saveQuestion'])->name('saveQuestion');
    Route::get('/question/{id}', [\App\Http\Controllers\questionController::class, 'editQuestion']);
});



