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

            <table id="tabla-suscripciones" class="table table-bordered table-striped tabla-datatables">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Paquete</th>
                    <th>Costo</th>
                    <th>Duracion</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suscripciones as $suscripciones)
                        <tr>
                            <td>{{$suscripciones->id_paquete}}</td>
                            <td>{{$suscripciones->paquete}}</td>
                            <td>{{$suscripciones->costo}}</td>
                            <td>{{$suscripciones->duracion}}</td>
                            <td>
                                <button class="btn btn-warning btn-sm boton-editar" data-id="{{$suscripciones->id_paquete}}">Editar</button>
                                <form action="{{route('suscripciones.destroy', $suscripciones->id_paquete)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal de Crear Paquete-->
        <div class="modal fade" id="modal-agregar-suscripcion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('suscripciones.store')}}" method="POST">
                        @csrf
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
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                    <input type="text" name="paquete" class="form-control" placeholder="Nombre del Paquete" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" name="costo" class="form-control" placeholder="Costo del paquete" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    <input type="number" name="duracion" class="form-control" id="" placeholder="Plazo de tiempo del paquete (dias)" required>
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

        <!-- Modal de Editar Paquete-->
        <div class="modal fade" id="modal-editar-suscripcion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-editarPaquete" method="POST">
                        @csrf
                        @method('PUT')
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
                            <input type="hidden" id="modal-id-input">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                    <input type="text" name="paquete" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" name="costo" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    <input type="number" name="duracion" class="form-control" required>
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
@stop

@section('js')
    <script src="{{asset('js/ini_datatable.js')}}"></script>
    <script src="{{asset('js/administracion/suscripciones.js')}}">
        $(document).ready(function() {
            $('.boton-editar').on('click', function() {
                var id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: 'suscripciones/' + id,
                    method: 'GET',
                    success: function(data) {
                        // Inserta los datos en el modal
                        $('#modal-id-input').val(data.id);
                        $('input[name="paquete"]').val(data.paquete);
                        $('input[name="costo"]').val(data.costo);
                        $('input[name="duracion"]').val(data.duracion);
                        
                        // Muestra el modal
                        $('#modal-editar-suscripcion').modal('show');
                    }
                });
            });
        });
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