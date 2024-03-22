@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido a Suscripciones</p>

    <div class="card">
        <div class="card-header">
            
            <div>
                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-agregar-suscripcion">
                    Agregar Suscripción
                </button>
            </div>
        </div>
        <div class="card-body">

            {!! $dataTable->table()!!}
            
        </div>

        @include('suscripciones.modales.suscripciones') 

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop

@section('js')
    <script src="{{asset('js/ini_datatable.js')}}"></script>
    <script src="{{asset('js/suscripciones/suscripciones.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>

    <script> var destroyUrlBase = "{{ url('suscripciones/') }}";
        var suscripcionesIndexUrl = "{{ route('suscripciones.index') }}";
        var csrfToken = "{{ csrf_token() }}";
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