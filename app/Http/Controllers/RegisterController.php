<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\School;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(RegisterRequest $request)
    {
        try {
            
            \DB::beginTransaction();

            $school_data = $request->only('addrees');
            $school_data['name'] =  $request->school_name;
            $school = School::create([
                'name' => $request->school_name,
                'address' => $request->address
            ]);
            $user = $school->addManager($request->only('name','email','password'));
            \Auth::loginUsingId($user->id);
            \DB::commit();

        }catch(Exception $e){
            \DB::rollback();
            \Auth::logout();
        }

        return redirect()->route('admin.home');
        
    }
}
