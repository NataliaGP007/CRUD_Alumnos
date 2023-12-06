@extends('adminlte::page')

@section('title', 'Formulario')

@section('content_header')
    <!-- Encabezado del contenido -->
    <h1 class="¨text-center">Registro de alumno</h1>
@stop

@section('content')
<!-- Inclusión de iconos Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <p class="text mb-4">Rellena el formulario con los datos solicitados</p>

    <!-- Formulario para registrar un nuevo alumno -->
    <form class="row" action="{{ route('students.store') }} " method="POST" >
        @csrf

        <!-- Campos del formulario para los datos del estudiante -->
        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input class="form-control" placeholder="Nombre" type="text" id="nombre" name="student_name">
        </div>
        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="aPaterno" class="form-label">Apellidos</label>
            <input class="form-control" placeholder="Apellidos" type="text" id="aPaterno" name="lastname">
        </div>
        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="gender" class="form-label">Sexo</label>
            <div class="input-group">
                <select class="form-select form-select-lg form-control" name="gender">
                <option selected>Seleccione</option>
                <option value="Hombre" @if(old('gender') == 'Hombre') selected @endif>Hombre</option>
                <option value="Mujer" @if(old('gender') == 'Mujer') selected @endif>Mujer</option>
            </select>
            </div>
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="fechaN" class="form-label">Fecha de nacimiento</label>
            <input class="form-control" placeholder="Fecha de nacimiento" type="date" id="fechaN" name="birthdate">
        </div>
        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input class="form-control" placeholder="Telefono" type="text" id="telefono" name="telephone">
        </div>

        <hr>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="town" class="form-label">Localidad</label>
            <div class="input-group">
                <select class="form-select form-select-lg form-control" name="town_id">
                    <option value="">Seleccione</option>
                    @foreach ($towns as $town)
                        <option value="{{ $town->id }}" @if(old('town_id') == $town->id) selected @endif>{{ $town->town_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('town_id')
                <div class="text-danger text-center">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="colonia" class="form-label">Colonia</label>
            <input class="form-control" placeholder="Colonia" type="text" id="colonia" name="suburb">
        </div>
        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="calle" class="form-label">Calle</label>
            <input class="form-control" placeholder="Calle" type="text" id="calle" name="street">
        </div>
        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="numeroE" class="form-label">Numero exterior</label>
            <input class="form-control" placeholder="Numero exterior" type="text" id="numeroE" name="exterior_number">
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="numeorI" class="form-label">Numero interior</label>
            <input class="form-control" placeholder="Numero interior" type="text" id="numeorI" name="interior_number">
        </div>
        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="nControl" class="form-label">Numero de control</label>
            <input class="form-control" placeholder="Numero de control" type="text" id="nControl" name="control_number">
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="role" class="form-label">Rol</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3"><i class="fas fa-regular fa-id-card"></i></span>
                <select class="form-select form-select-lg form-control" name="role_id">
                    <option value="">Selecciona el rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if(old('role_id') == $role->id) selected @endif>{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('role_id')
                <div class="text-danger text-center">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="career" class="form-label">Carrera</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3"><i class="fas fa-solid fa-book"></i></span>
                <select class="form-select form-select-lg form-control" name="career_id">
                    <option value="">Seleccione</option>
                    @foreach ($careers as $career)
                        <option value="{{ $career->id }}" @if(old('career_id') == $career->id) selected @endif>{{ $career->career_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('career_id')
                <div class="text-danger text-center">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="semestre" class="form-label">Semestre</label>
            <input class="form-control" placeholder="Semestre" type="text" id="semestre" name=semester>
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="status" class="form-label">Estatus</label>
            <input class="form-control" placeholder="Estatus" type="text" id="status" name=status>
        </div>

        <div class="col-md-4 position-relative">
            <label for="validationTooltipUsername" class="form-label">Correo</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                <input class="form-control" placeholder="E-mail" type="email" id="e-mail" name="email">
            </div>
        </div>

        <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input class="form-control" placeholder="Password" type="password" id="npassword" name=password>
        </div>
        
        <!-- Botón para enviar el formulario -->
        <div class="text-center mt-4 ml-2">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
@stop

@section('css')
    <!-- Estilos CSS personalizados -->
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop