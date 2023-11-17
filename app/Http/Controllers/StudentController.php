<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Town;
use App\Models\Career;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $towns = Town::all();
        $careers = Career::all();

        return view('student.create', compact('roles', 'towns', 'careers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'control_number' => 'required',
            'student_name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required|in:Hombre,Mujer',
            'birthdate' => 'required',
            'telephone' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'status' => 'required',
            'street' => 'required',
            'semester' => 'required',
            'role_id' => 'required',
            'town_id' => 'required',
            'career_id' => 'required',
        ]);

        Student::create($data);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $roles = Role::all();
        $towns = Town::all();
        $careers = Career::all();

        return view('student.edit', compact('student','roles', 'towns', 'careers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'control_number' => 'required',
            'student_name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required|in:Hombre,Mujer',
            'birthdate' => 'required',
            'telephone' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'status' => 'required',
            'street' => 'required',
            'role_id' => 'required',
            'town_id' => 'required',
            'career_id' => 'required',
        ]);

        $student->update($data);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $message = 'Alumno eliminado correctamente';

        try {
            $student->delete();
        } catch (\Exception $e) {
            $message = 'Error al eliminar';
        }
        return redirect()->route('students.index')->with('message', $message);
    }
}
