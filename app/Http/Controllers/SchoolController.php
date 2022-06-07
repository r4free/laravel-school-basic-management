<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected $school;

    public function __construct(School $school)
    {
        $this->school = $school;
    }
   
    public function index()
    {
        return view('pages.school.index')
        ->with([
            'schools' => $this->school->orderBy('updated_at','desc')->paginate()
        ]);
    }

   
    public function create()
    {
        return view('pages.school.create');
    }

    
    public function store(Request $request)
    {
        $school = $this->school->create($request->only('name','address'));
        return redirect()->route('admin.schools.index')
        ->with([
            'school' => $school,
            'message' => 'Escola cadastrada com sucesso'
        ]);
    }

    
    public function edit($id)
    {
        return view('pages.school.edit')
        ->with([
            'school' => $this->school->findOrFail($id)
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $school = $this->school->findOrFail($id);
        $school->update($request->only('name'));
        return redirect()->route('admin.schools.index')
        ->with([
            'message' => 'Escola editada com sucesso',
        ]);
    }
    
}
