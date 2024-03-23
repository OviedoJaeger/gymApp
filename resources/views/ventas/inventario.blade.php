@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido a Inventarios</p>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-agregar-suscripcion">
                Agregar Producto
            </button>
        </div>

        <div class="card-body">

            {!! $dataTable->table()!!}

        </div>

        @include('ventas.modales.inventario')

    </div>
@stop

@section('css')
    <!-- DataTables Botones-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@stop

@section('js')

    <!-- DataTables Botones-->
    <script src="{{asset('vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js')}}"></script>

    <script src="{{asset('js/ventas/inventario.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>
    <script> var assetBaseUrl = "{{ asset('') }}"; 
        var inventarioIndexUrl = "{{ route('inventario.index') }}";
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