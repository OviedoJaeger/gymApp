@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)}

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>VENTAS DE PAQUETES</h1>
@stop

@section('content')
    <p>Listado de Ventas de Paquetes</p>

    <div class="card">
        <div class="card-header">

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
    <script src="{{asset('js/ini_datatable.js')}}"></script>
    <script src="{{asset('js/ventas/venta_paquetes.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>

    <script> var destroyUrlBase = "{{ url('ventas-paquetes/') }}";
        var VentaPaquetesIndexUrl = "{{ route('ventas-paquetes.index') }}";
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