@extends('adminlte::page')

@section('title', 'Gym')

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

            <table id="t-suscripciones" class="table table-bordered table-striped display">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Paquete</th>
                    <th>Costo</th>
                    <th>Duración</th>
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

        <!-- Modal -->
        <div class="modal fade" id="modal-agregar-suscripcion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar Suscripción</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--=========================================
                                        CUERPO DEL MODAL
                        ==========================================-->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Nombre del Paquete">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Costo del paquete">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Plazo de tiempo del paquete">
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
            <!-- Fin del Modal -->
        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
