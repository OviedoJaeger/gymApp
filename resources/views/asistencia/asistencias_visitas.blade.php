@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Asistencias de Visitas</h3>
        </div>
        <div class="card-body">

            <table id="t-socios" class="table table-bordered table-striped tabla-datatables">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha y Hora de Asistencia</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $counter = 1;
                    @endphp

                    @foreach ($asistenciasVisitas as $asistenciasVisitas)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$asistenciasVisitas->clientesVisitas->nombre}}</td>
                            <td>{{$asistenciasVisitas->clientesVisitas->apellido}}</td>
                            <td>{{$asistenciasVisitas->created_at}}</td>
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
