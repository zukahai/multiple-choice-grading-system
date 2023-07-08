<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\RequestTeacherController;

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

Route::prefix('/')->group(function(){
    Route::get('/',[UserController::class, 'home'])->name('user.home.index');
});

Route::prefix('/login')->group(function(){
    Route::post('/',[UserController::class,'login'])->name('user.login.login');
    Route::get('/', [UserController::class, 'index'])->name('login');
});
 Route::prefix('/register')->group(function(){ 
    Route::get('/', [UserController::class, 'showRegister'])->name('register');
    Route::post('/', [UserController::class, 'register'])->name('user.register.register');
});

Route::prefix('admin')->middleware('CheckAdmin')->group(function(){
    Route::prefix('role')->group(function(){
        Route::get('/',[RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/edit/{id?}',[RoleController::class,'showEdit'])->name('admin.role.showEdit');
        Route::post('/edit/{id}',[RoleController::class,'edit'])->name('admin.role.edit');
        Route::get('/create',[RoleController::class,'showCreate'])->name('admin.role.showCreate');
        Route::post('/create',[RoleController::class,'create'])->name('admin.role.create');
        Route::get('/delete/{id}',[RoleController::class,'delete'])->name('admin.role.delete');
    });
    Route::prefix('requestTeacher')->group(function(){
        Route::get('/',[RequestTeacherController::class,'index'])->name('admin.requestTeacher.index');
        Route::post('/',[RequestTeacherController::class,'edit'])->name('admin.requestTeacher.edit');
    });
    Route::prefix('question')->group(function(){
        Route::get('/',[QuestionController::class,'indexAdmin'])->name('admin.question.index');
        Route::get('/create',[QuestionController::class,'showCreateAdmin'])->name('admin.question.showCreate');
        Route::post('/create',[QuestionController::class,'createAdmin'])->name('admin.question.create');
        Route::get('/edit/{id?}',[QuestionController::class,'showEditAdmin'])->name('admin.question.showEdit');
        Route::post('/edit/{id?}',[QuestionController::class,'editAdmin'])->name('admin.question.edit');
        Route::post('/',[QuestionController::class,'editStatusQAdmin'])->name('admin.question.editStatus');
        Route::get('/delete/{id}',[QuestionController::class,'deleteAdmin'])->name('admin.question.delete');
        
    });
});

Route::prefix('teacher')->middleware('CheckTeacher')->group(function(){
  
    Route::prefix('question')->group(function(){
        Route::get('/',[QuestionController::class,'index'])->name('teacher.question.index');
        Route::get('/create',[QuestionController::class,'showCreate'])->name('teacher.question.showCreate');
        Route::post('/create',[QuestionController::class,'create'])->name('teacher.question.create');
        Route::get('/edit/{id?}',[QuestionController::class,'showEdit'])->name('teacher.question.showEdit');
        Route::post('/edit/{id?}',[QuestionController::class,'edit'])->name('teacher.question.edit');
        Route::get('/delete/{id}',[QuestionController::class,'delete'])->name('teacher.question.delete');
        
    });

    Route::prefix('exam')->group(function(){
        Route::get('/', [ExamController::class, 'index'])->name('teacher.exam.index');
        Route::get('/create',[ExamController::class,'showCreate'])->name('teacher.exam.showCreate');
        Route::post('/create',[ExamController::class,'create'])->name('teacher.exam.create');
        Route::get('/edit/{id?}',[ExamController::class,'showEdit'])->name('teacher.exam.showEdit');
        Route::post('/edit/{id?}',[ExamController::class,'edit'])->name('teacher.exam.edit');
        Route::get('/delete/{id}',[ExamController::class,'delete'])->name('teacher.exam.delete');
    });
});

Route::prefix('student')->group(function(){
});
