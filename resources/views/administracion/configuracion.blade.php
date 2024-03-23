@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>CONFIGURACIÓN</h1>
@stop

@section('content')
    <p>Configuración de los Usuarios del Programa</p>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-agregar-usuario">
                Agregar Usuario
            </button>

        </div>
        <div class="card-body">

            @php
                $counter = 1;
            @endphp
            <table id="t-administradores" class="table table-bordered table-striped tabla'datatables">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Ultimo Inicio de Sesion</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    
                    <td>{{$counter++}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->username}}</td>
                    <td>{{$usuario->rol}}</td>
                    <td>{{$usuario->estado}}</td>
                    <td>{{$usuario->ultimo_inicio}}</td>
                    <td>

                        <div class="btn-group d-flex space-between">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editar-usuario">
                                Editar
                            </button>

                            <form action="{{ route('configuracion.destroy', $usuario) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar usuario</button>
                            </form>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>


        @include('administracion.modales.configuracion')

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script src="{{asset('js/administracion/configuracion.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>
@stop