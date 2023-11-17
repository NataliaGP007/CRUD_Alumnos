@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Informacion del Alumno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('students.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Numero de control:</strong>
                            {{ $student->control_number }}
                        </div>

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $student->student_name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $student->lastname }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $student->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $student->telephone }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            {{ $student->birthdate }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $student->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Localidad:</strong>
                            {{ $student->town->town_name }}
                        </div>
                        <div class="form-group">
                            <strong>Colonia:</strong>
                            {{ $student->suburb }}
                        </div>
                        <div class="form-group">
                            <strong>Calle:</strong>
                            {{ $student->street }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $student->role->role_name }}
                        </div>
                        <div class="form-group">
                            <strong>Carrera:</strong>
                            {{$student->career->career_name}}
                        </div>

                        <div class="form-group">
                            <strong>Semestre:</strong>
                            {{ $student->semester }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $student->status }}
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
