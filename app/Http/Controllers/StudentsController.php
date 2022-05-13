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
}
