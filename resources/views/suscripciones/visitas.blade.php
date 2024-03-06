@extends('adminlte::page')

@section('title', 'Gym')

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

            <table id="t-suscripciones" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th width="5px">#</th>
                    <th>Nombre</th>
                    <th>Apellido(s)</th>
                    <th>Domicilio</th>
                    <th>Teléfono</th>
                    <th>Fecha de Registro</th>
                    <th>Foto</th>
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

        <!-- Modal Agregar Cliente Visita-->
        <div class="modal fade" id="modal-agregar-visita" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar Cliente Visita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--=========================================
                                CUERPO DEL MODAL AGREGAR CLIENTE VISITA
                        ==========================================-->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                                    <span class="input-group-text"><i class="fas fa-quote-left"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" id="" data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Domicilio">
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

            <!-- Modal Registrar Visita-->
        <div class="modal fade" id="modal-agregar-visita" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar Cliente Visita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--=========================================
                                CUERPO DEL MODAL REGISTRAR VISITA
                        ==========================================-->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                                    <span class="input-group-text"><i class="fas fa-quote-left"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Costo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Método Pago">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                    <select class="form-control">
                                        <option value="">Metodo Pago</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta">Tarjeta</option>
                                        <option value="Transferencia">Transferencia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                    <input type="number" class="form-control" id="" placeholder="referencia">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Vendedor" readonly>
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
    <script src="{{ asset('vendor/inputmask/inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
@stop
