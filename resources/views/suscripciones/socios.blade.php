@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido a Socios</p>

    <div class="card">
        <div class="card-header">
            <div>
                <button type="button" class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modal-agregar-socio">
                    Agregar Socio
                </button>
            </div>

            <div>
                <h6>Para realizar una renovación o venta de paquete, busque al socio y precione el botón "Venta Paquete"</h6>
            </div>
        </div>
        <div class="card-body">

            {!! $dataTable->table()!!}
            
        </div>

        @include('suscripciones.modales.socios')        
        
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script src="{{ asset('vendor/inputmask/inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{asset('js/suscripciones/clientes.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>
    <script src="{{asset('vendor/ekko-lightbox/ekko-lightbox.min.js')}}"></script>


    <script> var assetBaseUrl = "{{ asset('') }}"; 
        var clientesIndexUrl = "{{ route('socios.index') }}";
        var urlDetallesSocio = "{{ route('detalles-socio', ['id' => 'ID']) }}";

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