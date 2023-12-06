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
     * Muestra una lista de todos los alumnos.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Muestra el formulario para crear un nuevo registro de alumno.
     */
    public function create()
    {
        $roles = Role::all();
        $towns = Town::all();
        $careers = Career::all();

        return view('student.create', compact('roles', 'towns', 'careers'));
    }

    /**
     * Almacena en la base de datos los datos proporcionados al crear un nuevo alumno.
     */
    public function store(Request $request)
    {
        //Validación de datos del formulario
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

        // Creación de un nuevo alumno con los datos validados
        Student::create($data);
        return redirect()->route('students.index');
    }

    /**
     * Muestra los detalles de un alumno en particular.
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));

    }

    /**
     * Muestra el formulario para editar un alumno específico.
     */
    public function edit(Student $student)
    {
        $roles = Role::all();
        $towns = Town::all();
        $careers = Career::all();

        return view('student.edit', compact('student','roles', 'towns', 'careers'));
    }

    /**
     * Actualiza la información de un alumno específico en el almacenamiento.
     */
    public function update(Request $request, Student $student)
    {
        // Validación de datos del formulario.
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

        // Actualización de los datos del alumno con los datos validados.
        $student->update($data);
        return redirect()->route('students.index');
    }

    /**
     * Elimina un alumno específico del almacenamiento.
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
