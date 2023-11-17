@extends('adminlte::page')

@section('title', 'Formulario')

@section('content_header')
    <h1 class="¨text-center">Registro de rol</h1>
@stop

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <p class="text mb-4">Rellena el formulario con los datos requeridos</p>

    <form class="row" action="{{ route('roles.store') }}" action="/registroAlumno" method="POST">
        @csrf
        <div class="col-xs-10 col-md-10 col-lg-6 mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" placeholder="Nombre" type="text" id="role_name" name="role_name">
        </div>
        <div class="col-xs-10 col-md-10 col-lg-12 mb-3">
            <label class="form-label">Descripcion</label>
            <input class="form-control" placeholder="Descripcion" type="text" id="description" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop