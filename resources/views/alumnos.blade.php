@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Alumnos</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    {{-- Custom --}}
    <x-adminlte-modal id="modalCustom" title="Registro de alumno" size="lg" theme="secondary"
    icon="fas fa-bell" v-centered static-backdrop scrollable>
    <div style="height:800px;">
        <p>Ingrese la informacion requerida.</p>
        
        <form action="{{route('students.store')}}" method="POST">
            @csrf
            {{-- Minimal --}}
            <x-adminlte-input name="nombre" label="Nombre"/>
            <x-adminlte-input name="apellidos" label="Apellidos"/>
            <x-adminlte-input name="sexo" label="Sexo"/>

            {{-- Label and placeholder --}}
            <x-adminlte-date-range name="drPlaceholder" placeholder="dd/mm/yyyy"
                label="Fecha de nacimiento">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient">
                        <i class="far fa-lg fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-date-range>
            @push('js')<script>$(() => $("#drPlaceholder").val(''))</script>@endpush

            <x-adminlte-input name="telefono" label="Telefono"/>
            {{-- Email type --}}
            <x-adminlte-input name="email" type="email" label="Email" laceholder="mail@example.com"/>
            <x-adminlte-input name="semestre" label="Semestre"/>
            <x-adminlte-input name="estatus" label="Estatus"/>
            <x-adminlte-input name="rol" label="Rol"/>
            <x-adminlte-input name="localidad" label="Localidad"/>
            <x-adminlte-input name="colonia" label="Colonia"/>
            <x-adminlte-input name="calle" label="Calle"/>
            <x-adminlte-input name="num_exterior" label="Numero exterior"/>
            <x-adminlte-input name="num_interior" label="Numero interior"/>
        </form>
    
    
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button class="mr-auto" theme="success" label="Aceptar"/>
        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"/>
    </x-slot>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
    <x-adminlte-button label="Agregar registro" data-toggle="modal" data-target="#modalCustom" class="bg-info"/>

    <br>

    {{-- Setup data for datatables --}}
    @php
    $heads = [
        'Num. control',
        'Nombre',
        'Apellidos',
        'Sexo',
        'Fecha de nacimiento',
        'Telefono',
        'Email',
        'Semestre',
        'Estatus',
        'Rol',
        'Localidad',
        'Colonia',
        'Calle',
        'Num. exterior',
        'Num. interior',

    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>';

    $config = [
        'data' => [
            [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
        {{-- Compressed with style options / fill data using the plugin config --}}
    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark">
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>


@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-at" viewBox="0 0 16 16">
    <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
</svg>