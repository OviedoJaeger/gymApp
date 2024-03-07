@extends('adminlte::page')

@section('title', 'Gym')

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

            <table id="t-socios" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Descripcion</th>
                    <th>Stock</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Agregado</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>Trident.jpg</td>
                    <td>5480022</td>
                    <td>Trident Menta</td>
                    <td> 4</td>
                    <td>$2.00</td>
                    <td>$4.00</td>
                    <td>2023-11-13 17:58:17</td>
                    <td>X</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-agregar-suscripcion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--=========================================
                                CUERPO DEL MODAL AGREGAR SOCIO
                        ==========================================-->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Codigo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-bars"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Descripcion">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    <input type="number" class="form-control" id="" min="0" placeholder="Cantidad Disponible" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                        <input type="number" class="form-control" id="" placeholder="Precio Compra">
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                    <input type="number" class="form-control" id="" placeholder="Precio Venta">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend  panel">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    <input type="file" class="" id="">
                                    <img src="" class="mt-2 img-thumbnail previsualizar-foto" width="100 px">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- Fin del Modal -->

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop