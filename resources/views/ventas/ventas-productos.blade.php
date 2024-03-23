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
            <a class="btn btn-primary float-left" href="{{ route('crear-venta') }}" >
                Realizar Venta de Producto
            </a>

        </div>
        <div class="card-body">

            {!! $dataTable->table()!!}

        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('js/ini_datatable.js')}}"></script>
<script src="{{asset('js/ventas/venta_productos.js')}}"></script>
<script src="{{asset('js/general.js')}}"></script>


<script> var assetBaseUrl = "{{ asset('') }}"; 
    var VentaProductosIndexUrl = "{{ route('ventas-productos.index') }}";
</script>
@stop