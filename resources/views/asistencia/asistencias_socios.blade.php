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

            {!! $dataTable->table()!!}

        </div>
    </div>
@stop

@section('css')
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')

<script src="{{asset('js/asistencia/asistencias_socios.js')}}"></script>
    <script> var assetBaseUrl = "{{ asset('') }}"; 
        var RegistroVisitasIndexUrl = "{{ route('asistencias-socios.index') }}";
    </script>

@stop
