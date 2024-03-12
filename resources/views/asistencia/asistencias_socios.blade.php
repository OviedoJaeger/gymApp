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
                    <th>Fecha Inscripcion</th>
                    <th>Paquete Actual</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>Charly</td>
                    <td>Quesadilla</td>
                    <td>quesadilla69@gmail.com</td>
                    <td>5551281896</td>
                    <td>2024-02-28 21:54:34/td>
                    <td>Mensualidad</td>
                    <td>Activo</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Zadad</td>
                    <td>Oviedo</td>
                    <td>quesadilla69@gmail.com</td>
                    <td>5551281896</td>
                    <td>2024-02-28 21:54:34/td>
                    <td>Mensualidad</td>
                    <td>Desactivado</td>
                    <td>X</td>
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
