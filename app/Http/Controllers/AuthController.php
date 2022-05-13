<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        
        
        if(\Auth::attempt($request->only('email','password'))){
            return redirect()->route('admin.home');
        }
        return redirect()->back();
    }
}
