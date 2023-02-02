<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function(){
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
});
