@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Ventas de Productos</h1>
@stop

@section('content')
    <p>Listado de Ventas Realizadas de Productos</p>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="">
                Realizar Venta de Producto
            </button>

        </div>
        <div class="card-body">

            <table id="t-administradores" class="table table-bordered table-striped tabla-datatables">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Código Venta</th>
                    <th>Administrador</th>
                    <th>Método de Pago</th>
                    <th>Turno</th>
                    <th>Fecha de Venta</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>10005
                    </td>
                    <td>Alexis Martinez</td>
                    <td>Transferencia</td>
                    <td>Vespertino</td>
                    <td>06/03/2024 20:45:15</td>
                    <td>Ver Detalles/Editar/Eliminar</td>
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