<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return view('pages.student.index')
        ->with([
          'students' => $this->student->paginate(10)
        ]);
    }

    public function edit($id)
    {
        return view('pages.student.edit')
        ->with([
            'student' => $this->student->findOrFail($id)
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $student= $this->student->findOrFail($id);
        $student->update($request->only('name','email'));
        $student->groups()->attach($request->group_id);
        return redirect()->route('admin.students.index');
    }
}
