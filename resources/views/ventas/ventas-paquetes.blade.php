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
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="">
                Realizar Venta de Paquete
            </button>

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
                <tr>
                    <td>1</td>
                    <td>Mensualidad
                    </td>
                    <td>400.00</td>
                    <td> 30</td>
                    <td>06/03/2024 20:45:15</td>
                    <td>Alexis Martinez Alonso</td>
                    <td>Charly Sanchez</td>
                    <td></td>
                </tr>
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