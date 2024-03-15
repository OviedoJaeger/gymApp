@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Asistencias de Clientes</h3>
        </div>
        <div class="card-body">

            <table id="t-socios" class="table table-bordered table-striped tabla-datatables">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Fecha Asistencia</th>
                    <th>Paquete Actual</th>
                    <th>Activo</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $counter = 1;
                    @endphp

                    @foreach ($asistencias as $asistencias)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$asistencias->cliente->nombre}}</td>
                            <td>{{$asistencias->cliente->apellido}}</td>
                            <td>{{$asistencias->cliente->correo}}</td>
                            <td>{{$asistencias->cliente->telefono}}</td>
                            <td>{{$asistencias->created_at}}</td>
                            <td>{{$asistencias->cliente->paquete}}</td>
                            <td>1</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="{{asset('js/ini_datatable.js')}}"></script>

@stop
