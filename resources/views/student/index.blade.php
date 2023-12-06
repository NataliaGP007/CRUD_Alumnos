@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Lista de alumnos</h1>
@stop


@section('content')
    <!-- Accion de agregar -->
    <div class="float-right mb-2">
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
            {{ __('Agregar nuevo elemento') }}
        </a>
    </div>

    <!-- Tabla para mostrar la lista de alumnos -->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <!-- Cabeceras de la tabla -->
            <tr>
                <th>No. control</th>
                <th>Nombre del Alumno</th>
                <th>Correo</th>
                <th>Estatus</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iteración sobre la lista de alumnos -->
            @foreach ($students as $student)
                <tr>
                    <!-- Datos de cada alumno -->
                    <td>{{ $student->control_number }}</td>
                    <td>{{ $student->student_name }} {{$student->lastname}}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->status }}</td>
                    <td>{{ $student->semester }}</td>

                    <!-- Acciones: Ver, Editar y Eliminar -->
                    <td>
                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                            <a class="btn btn-sm btn-primary " href="{{ route('students.show',$student->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                            <a class="btn btn-sm btn-success" href="{{ route('students.edit',$student->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"> </script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    <!-- Inicialización de la tabla DataTable -->
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
@stop