@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('plugins.Sweetalert2', true)

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
                <h6>Para realizar una renovación o venta de paquete, busque al socio y precione el botón "Venta Paquete"</h6>
            </div>
        </div>
        <div class="card-body">

            <table id="t-socios" class="table table-bordered table-striped tabla-datatables">
                <thead>
                    <tr>
                        <th style="width: 5px">#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Fecha Inscripcion</th>
                        <th>Paquete Actual</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $counter = 1;
                    @endphp

                    @foreach ($clientes as $clientes)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$clientes->nombre}}</td>
                            <td>{{$clientes->apellido}}</td>
                            <td>{{$clientes->correo}}</td>
                            <td>{{$clientes->telefono}}</td>
                            <td>{{$clientes->created_at}}</td>
                            <td>{{$clientes->paquete}}</td>
                            <td>1</td>
                            <td>
                                <button class="btn btn-primary btn-sm boton-venta" data-id="{{$clientes->id}}">Venta Paquete</button>
                                <button class="btn btn-warning btn-sm boton-editar" data-id="{{$clientes->id}}">Editar</button>
                                <form id="form-eliminarPaquete" action="{{route('socios.destroy', $clientes->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm eliminar-boton" type="submit">Eliminar</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Agregar Socio-->
        <div class="modal fade" id="modal-agregar-socio" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('socios.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                    <input type="text"  name="nombre"  class="form-control"  placeholder="Nombre" value="{{ old('nombre') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{ old('apellido') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="telefono" class="form-control" data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask value="{{ old('nombre') }}">
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                                    <input type="text" name="telefono_emergencia" class="form-control" placeholder="Telefono de emergencia" data-inputmask="'mask':'(99) 9999-9999'" data-mask required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="direccion" class="form-control" placeholder="Direccion" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="correo" class="form-control" placeholder="Correo" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="date" name="fecha_cumple" class="form-control" placeholder="Fecha Cumpleaños" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="num" name="edad" class="form-control" placeholder="Edad" required>
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                    <select name="sexo" class="form-control">
                                        <option value="">Sexo</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                    <input type="text" name="observaciones" class="form-control" placeholder="Observaciones">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend  panel">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    <video autoplay></video>
                                    
                                    <canvas id="canvas" style="display:none;"></canvas>
                                    <input type="file" name="foto" class="">
                                    
                                </div>
                                <div class="input-group-prepend panel d-flex text-center">
                                    <button type="button" id="capture">Capturar</button>
                                </div>
                                <div class="input-group-prepend panel">
                                    <input type="hidden" id="hiddenImage" name="hiddenImage">
                                    <img src="" class="mt-2 img-thumbnail previsualizar-foto" width="250 px">
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




        
        <!-- Modal Venta Paquete-->
        <div class="modal fade" id="modal-venta-paquete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-ventaPaquete">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Vender Paquete a Socio</h5>
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
                                    <select class="form-control" name="tipo_paquete">
                                        <option value="">Tipo Paquete</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="text" name="costo" class="form-control" id="" placeholder="Costo" readonly>
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <input type="text" name="duracion" class="form-control" id="" placeholder="Duracion" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="date" name="fecha_inicio" class="form-control" id="" placeholder="Fecha de Inicio" value="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <input hidden type="text" name="id-cliente">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="nombre" class="form-control" id="" placeholder="Nombre del Socio" value="" readonly required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="nombre-usuario" class="form-control" id="" placeholder="Vendedor" value="{{ auth()->user()->name}}" required readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <p>Pago en 2 partes&nbsp;</p>
                                    <span>
                                        <input type="checkbox" class="form-control" id="check-adeudo" style="width: 20px; height: 20px;"" placeholder="Pago Realizado">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row" hidden>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="text" class="form-control" id="" placeholder="Pago Realizado">
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                        <span class="input-group-text"><i class="fas fa-exclamation"></i></span>
                                        <input type="text" class="form-control" id="" placeholder="Adeudo" readonly>
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




        <!-- Modal de Editar Socio-->
        <div class="modal fade" id="modal-editar-socio" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-editarCliente" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Editar Socio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--=========================================
                                CUERPO DEL MODAL EDITAR SOCIO
                        ==========================================-->
                        <div class="modal-body">
                            <input type="hidden" id="modal-id-input">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text"  name="nombre"  class="form-control"  placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="telefono" class="form-control" data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask>
                                </div>
                                <div class="input-group-prepend col-xs-12 col-sm-6">
                                    <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                                    <input type="text" name="telefono_emergencia" class="form-control" placeholder="Telefono de emergencia" data-inputmask="'mask':'(99) 9999-9999'" data-mask required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="correo" class="form-control" placeholder="Correo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="date" name="fecha_cumple" class="form-control" placeholder="Fecha Cumpleaños">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="num" name="edad" class="form-control" placeholder="Edad">
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                    <input type="text" name="observaciones" class="form-control" placeholder="Observaciones">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend  panel">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    <input type="file" name="foto" class="" capture="camera">
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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
@stop

@section('js')
    <script src="{{ asset('vendor/inputmask/inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{asset('js/ini_datatable.js')}}"></script>
    <script src="{{asset('js/suscripciones/clientes.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>

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