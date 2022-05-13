<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin', 
    'middleware' => 'auth',
    'as' => 'admin.'
], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');

    Route::group([
        'prefix' => 'students',
        'as' => 'students.'
    ],function(){
        Route::get('/',[StudentsController::class, 'index'])->name('index');
    });
    Route::group([
        'prefix' => 'groups',
        'as' => 'groups.'
    ],function(){
        Route::get('/',[GroupController::class, 'index'])->name('index');
    });
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);
