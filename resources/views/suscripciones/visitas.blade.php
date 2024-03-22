@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido a Visitas</p>

    <div class="card">
        <div class="card-header">

            <div>
                <button type="button" class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modal-agregar-visita">
                    Registrar Cliente Visita
                </button>
            </div>
            <div>
                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-registrar-visita">
                    Registrar Visita
                </button>
            </div>
        </div>
        <div class="card-body">
            {!! $dataTable->table()!!}
        </div>
        @include('suscripciones.modales.visitas')        
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/inputmask/inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{asset('js/ini_datatable.js')}}"></script>
    <script src="{{asset('js/suscripciones/visitas.js')}}"></script>

    <script> var assetBaseUrl = "{{ asset('') }}"; 
        var VisitasIndexUrl = "{{ route('visitas.index') }}";
    </script>

    <script>
        @if(session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if ($errors->any())
        let contentHtml = '<ul>';
        @foreach ($errors->all() as $error)
                contentHtml += '<li>{{ $error }}</li>';
            @endforeach
            contentHtml += '</ul>';

            Swal.fire({
                title: '¡Error!',
                html: contentHtml,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            @endif
    </script>
@stop
