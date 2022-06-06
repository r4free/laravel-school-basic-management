<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    private $student;

    private $group;

    public function __construct(Student $student, Group $group)
    {
        $this->student = $student->orderBy('updated_at','desc');
        $this->group = $group;
    }

    public function index()
    {
        return view('pages.student.index')
        ->with([
          'students' => $this->student->paginate(10)
        ]);
    }
    
    public function create()
    {
        return view('pages.student.create')
        ->with([
          'groups' => $this->group->all()
        ]);
    }

    public function store(Request $request)
    {
        $student = $this->student->create($request->only('name','email'));
        $student->groups()->attach($request->group_id);

        return redirect()->route('admin.students.index')
        ->with([
            'success-message' => "Turma cadastrada com sucesso",
            "student" => $student,
            "students" => $this->student->paginate(10)
        ]);   
    }

    public function edit($id)
    {
        return view('pages.student.edit')
        ->with([
            'student' => $this->student->findOrFail($id),
            'groups' => $this->group->all()
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
