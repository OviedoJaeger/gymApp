@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>VENTAS DE PAQUETES</h1>
@stop

@section('content')
    <p>Listado de ventas de paquetes</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">

            <table id="t-administradores" class="table table-bordered table-striped tabla-datatables">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tipo de Paquete</th>
                        <th>Costo</th>
                        <th>Duración(días)</th>
                        <th>Fecha de Venta</th>
                        <th>Cliente</th>
                        <th>Administrador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $counter = 1;
                    @endphp

                    @foreach ($ventasPaquetes as $ventasPaquetes)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$asistencias->tipo_paquete}}</td>
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