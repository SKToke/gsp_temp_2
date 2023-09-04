<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentValidator;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): Renderable
    {
        $student = Student::findOrFail(auth()->user()->student->id);
        return view('student.edit', compact('student'));
    }

    public function update(Student $student, Request $request)
    {
        $attributes = (new StudentValidator())->validate($student, $request->all());
        updateStudent($student, $attributes, true);
        return back()->with('status', 'Data has been successfully updated.');
    }
}
