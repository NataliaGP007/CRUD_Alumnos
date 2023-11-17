@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Alumno</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('students.update', $student) }}" >
                            @csrf
                            @method('PUT')

                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input class="form-control" placeholder="Nombre" type="text" id="nombre" name="student_name" value="{{$student->student_name}}">
                            </div>
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="aPaterno" class="form-label">Apellidos</label>
                                <input class="form-control" placeholder="Apellidos" type="text" id="aPaterno" name="lastname" value="{{$student->lastname}}">
                            </div>
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="gender" class="form-label">Sexo</label>
                                <div class="input-group">
                                    <select class="form-select form-select-lg form-control" name="gender" value="{{$student->gender}}">
                                    <option {{old('gender',$student->gender) == "Hombre" ? 'selected' : ''}} value="Hombre">Hombre</option>
                                    <option {{old('gender',$student->gender) == "Mujer" ? 'selected' : ''}} value="Mujer">Mujer</option>

                                </select>
                                </div>
                            </div>
                    
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="fechaN" class="form-label">Fecha de nacimiento</label>
                                <input class="form-control" placeholder="Fecha de nacimiento" type="date" id="fechaN" name="birthdate" value="{{$student->birthdate}}">
                            </div>
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input class="form-control" placeholder="Telefono" type="text" id="telefono" name="telephone" value="{{$student->telephone}}">
                            </div>
                    
                            <hr>
                    
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="town" class="form-label">Localidad</label>
                                <div class="input-group">
                                    <select class="form-select form-select-lg form-control" name="town_id">
                                        <option value="">Seleccione</option>
                                        @foreach ($towns as $town)
                                            <option value="{{ $town->id }}" {{$student->town_id == $town->id ? 'selected' : '' }}>
                                                {{ $town->town_name }}</option>
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
                                <input class="form-control" placeholder="Colonia" type="text" id="colonia" name="suburb" value="{{$student->suburb}}">
                            </div>
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="calle" class="form-label">Calle</label>
                                <input class="form-control" placeholder="Calle" type="text" id="calle" name="street" value="{{$student->street}}">
                            </div>
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="numeroE" class="form-label">Numero exterior</label>
                                <input class="form-control" placeholder="Numero exterior" type="text" id="numeroE" name="exterior_number" value="{{$student->exterior_number}}">
                            </div>
                    
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="numeorI" class="form-label">Numero interior</label>
                                <input class="form-control" placeholder="Numero interior" type="text" id="numeorI" name="interior_number" value="{{$student->interior_number}}">
                            </div>
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="nControl" class="form-label">Numero de control</label>
                                <input class="form-control" placeholder="Numero de control" type="text" id="nControl" name="control_number" value="{{$student->control_number}}">
                            </div>
                    
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="role" class="form-label">Rol</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-regular fa-id-card"></i></span>
                                    <select class="form-select form-select-lg form-control" name="role_id" value={{$student->role}}>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{$student->role_id == $role->id ? 'selected' : '' }}>
                                                {{ $role->role_name }}</option>
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
                                    <select class="form-select form-select-lg form-control" name="career_id" value="{{$student->career}}">
                                        @foreach ($careers as $career)
                                            <option value="{{ $career->id }}" {{$student->career_id==$career->id ? 'selected' : '' }}> 
                                                {{ $career->career_name }}</option>

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
                                <input class="form-control" placeholder="Semestre" type="text" id="semestre" name=semester value="{{$student->semester}}">
                            </div>
                    
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="status" class="form-label">Estatus</label>
                                <input class="form-control" placeholder="Estatus" type="text" id="status" name=status value="{{$student->status}}">
                            </div>
                    
                            <div class="col-md-4 position-relative">
                                <label for="validationTooltipUsername" class="form-label">Correo</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                    <input class="form-control" placeholder="E-mail" type="email" id="e-mail" name="email" value="{{$student->email}}">
                                </div>
                            </div>
                    
                            <div class="col-xs-10 col-md-10 col-lg-4 mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input class="form-control" placeholder="Password" type="password" id="npassword" name=password value="{{$student->password}}">
                            </div>
                            
                            <div class="text-center mt-4 ml-2">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
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