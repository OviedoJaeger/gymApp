@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-lightblue card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Crear Ventas</h5>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Administrador" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            </div>
                            <input type="number" class="form-control"placeholder="Codigo de la Venta" readonly>
                        </div>
                        <hr>
                        <div>
                            <p>Espacio reservado</p>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <table class="table col-md-6">
                                <tr>
                                    <th style="width: 50px">Total</th>
                                </tr>
                                <tr>
                                    <td style="width: 50px">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="number" id="totalVentaProducto" class="form-control" placeholder="0000" readonly>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-prepend ">
                                <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                            </div>
                            <select class="form-control">
                                <option>Seleccione método de pago</option>
                                <option>Efectivo</option>
                                <option>Tarjeta crédito</option>
                                <option>Tarjeta Débito</option>
                                <option>Transferencia</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 col-md-6" hidden>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Número de Referencia" >
                        </div>
                        <div class="row" hidden>
                            <div class="input-group mb-3 col-md-6" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="number" class="form-control" placeholder="0000" >
                            </div>
                            <div class="input-group mb-3 col-md-6" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Cambio" >
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary float-right">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col-md-6 -->
        <div class="col-lg-7">
            <div class="card card-lightblue">
            <div class="card-header">
                <h5 class="m-0">Productos</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title">Productos</h6>
                <div class="table-responsive">
                    <table id="t-crearVenta" class="table table-bordered table-striped tabla-datatables">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td>X</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>


        </div>
        <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@stop

@section('css')
@stop

@section('js')

    <script src="{{asset('js/ini_datatable.js')}}"></script>
@stop