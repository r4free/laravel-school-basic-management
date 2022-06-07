<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin', 
    'middleware' => 'auth',
    'as' => 'admin.'
], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');

    Route::get('logout',LogoutController::class)->name('logout');
    Route::resource('students', StudentsController::class)->only('index','edit','update','store','create');
    Route::resource('groups', GroupController::class)->only('create','store','index','edit','update');
   
    Route::resource('schools', SchoolController::class)->only('create','store','edit','update');
    Route::get('schools', [SchoolController::class,'index'])->name('schools.index')->middleware('should_be_superadmin');
    
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);
