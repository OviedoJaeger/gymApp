@extends('adminlte::page')

@section('title', 'Gym')

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido a Visitas</p>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Asistencias de Visitas</h3>
        </div>
        <div class="card-body">

            <table id="t-socios" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha y Hora de Asistencia</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>Charly</td>
                    <td>Quesadilla</td>
                    <td>2024-02-28 21:54:34</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Zadad</td>
                    <td>Oviedo</td>
                    <td>2024-02-28 21:54:34</td>
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
@stop
