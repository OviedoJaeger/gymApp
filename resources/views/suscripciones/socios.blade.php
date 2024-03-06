@extends('adminlte::page')

@section('title', 'Gym')

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido a Socios -> AÑADIR BOTÓN DE "VENTA PAQUETE" A CADA SOCIO</p>

    <div class="card">
        <div class="card-header">
            <div>
                <button type="button" class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modal-agregar-socio">
                    Agregar Socio
                </button>
            </div>
            <div>
                <button type="button" class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modal-venta-paquete">
                    Venta de Paquete
                </button>
            </div>
            <div>
                <h6>Para realizar una renovación o venta de paquete, busque al socio y precione el botón "Venta Paquete"</h6>
            </div>
        </div>
        <div class="card-body">

            <table id="t-suscripciones" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Fecha de inscripcion</th>
                    <th>Ultimo paquete</th>
                    <th>Activo</th>
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

        <!-- Modal Agregar Socio-->
        <div class="modal fade" id="modal-agregar-socio" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar Socio</h5>
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
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" id="" data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask>
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                                    <input type="text" class="form-control" id=""  placeholder="Telefono de emergencia" data-inputmask="'mask':'(99) 9999-9999'" data-mask required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="" placeholder="Correo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="num" class="form-control" id="" placeholder="Edad">
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                    <select class="form-control">
                                        <option value="">Sexo</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Observaciones">
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

        <!-- Modal Venta Paquete-->
        <div class="modal fade" id="modal-venta-paquete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar Socio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--=========================================
                                CUERPO DEL MODAL VENTA PAQUETE
                        ==========================================-->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                    <select class="form-control">
                                        <option value="">Tipo Paquete</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <div class="input-group-prepend col-xs-12 col-sm-6">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        <input type="text" class="form-control" id="" placeholder="Costo" readonly>
                                    </div>
                                    <div class="input-group-prepend col-xs-12 col-sm-6">
                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            <input type="text" class="form-control" id="" placeholder="Duracion" readonly>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Nombre del Socio" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="" placeholder="vendedor" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
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
