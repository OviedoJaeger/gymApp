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
                    <label>Nombre</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text"  name="nombre"  class="form-control"  placeholder="Nombre" value="{{ old('nombre') }}">
                        </div>
                    </div>

                    <label>Apellido(s)</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{ old('apellido') }}">
                        </div>
                    </div>

                    <label>Teléfono / Telefono de Emergencia</label>
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

                    <label>Dirección</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                            <input type="text" name="direccion" class="form-control" placeholder="Direccion" >
                        </div>
                    </div>

                    <label>Correo Electrónico</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="correo" class="form-control" placeholder="Correo" required>
                        </div>
                    </div>

                    <label>Fecha de Cumpleaños</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            <input type="date" name="fecha_cumple" class="form-control" placeholder="Fecha Cumpleaños" required>
                        </div>
                    </div>

                    <label>Edad / Sexo</label>
                    <div class="form-group row">
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                <input type="number" name="edad" class="form-control" placeholder="Edad" required>
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

                    <label>Observaciones</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                            <input type="text" name="observaciones" class="form-control" placeholder="Observaciones">
                        </div>
                    </div>

                    <label>Foto</label>
                    <div class="form-group">
                        <div class="input-group-prepend  panel">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" name="foto" class="">
                            
                        </div>
                        <div class="input-group-prepend panel">
                            <img src="" class="mt-2 img-thumbnail" id="foto-preview" width="250 px">
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

<!-------------------------------------------------------------------------------------------------------------->

<!-- Modal Venta Paquete-->
<div class="modal fade" id="modal-venta-paquete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-ventaPaquete">
                @csrf
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
                    <label>Paquete</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                            <select class="form-control" name="tipo_paquete">
                                <option value="">Tipo Paquete</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <label>Costo y Duración</label>
                    <div class="form-group row">
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="text" name="costo" class="form-control" id="costo" placeholder="Costo" readonly>
                        </div>
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                <input type="text" name="duracion" class="form-control" id="" placeholder="Duracion" readonly>
                        </div>
                    </div>

                    <label>Fecha de Inicio del Paquete</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="date" name="fecha_inicio" class="form-control" id="" placeholder="Fecha de Inicio" value="" required>
                        </div>
                    </div>

                    <label>Nombre del Socio</label>
                    <div class="form-group">
                        <input hidden type="text" name="id-cliente">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nombre" class="form-control" id="" placeholder="Nombre del Socio" value="" readonly required>
                        </div>
                    </div>

                    <label>Nombre del Administrador</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nombre-usuario" class="form-control" id="" placeholder="Vendedor" value="{{ auth()->user()->name}}" required readonly>
                        </div>
                    </div>

                    <label>Método de Pago</label>
                    <div class="form-group row">
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            <select class="form-control" name="metodo_pago" id="metodo-pago" required>
                                <option value="">Método de Pago</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>
                        <div class="input-group-prepend col-xs-12 col-sm-6" id="referenciaP" hidden>
                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            <input type="text" name="referencia_pago" class="form-control" id="" placeholder="Referencia" value="">
                        </div>

                    </div>

                    <hr>

                    <label>Pago a crédito</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <p>Pago en 2 partes&nbsp;</p>
                            <span>
                                <input type="checkbox" class="form-control" id="check-adeudo" style="width: 20px; height: 20px;"" placeholder="Pago Realizado">
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group row" id="pago-credito" hidden> 
                        <label>Pago a realizar / Monto Adeudo</label>
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="text" class="form-control"name="pago-realizado" placeholder="Pago Realizado">
                        </div>
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                                <span class="input-group-text"><i class="fas fa-exclamation"></i></span>
                                <input type="text" class="form-control" name="adeudo" placeholder="Adeudo" readonly>
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


<!-------------------------------------------------------------------------------------------------------------->


<!-- Modal de Editar Socio-->
<div class="modal fade" id="modal-editar-socio" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editarCliente" method="POST" enctype="multipart/form-data">
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
                    <label>Nombre</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text"  name="nombreEditar"  class="form-control"  placeholder="Nombre">
                        </div>
                    </div>

                    <label>Apellido(s)</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="apellidoEditar" class="form-control" placeholder="Apellido">
                        </div>
                    </div>

                    <label>Telefono / Teléfono de Emergencia</label>
                    <div class="form-group row">
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="telefonoEditar" class="form-control" data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask>
                        </div>
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                            <input type="text" name="telefono_emergenciaEditar" class="form-control" placeholder="Telefono de emergencia" data-inputmask="'mask':'(99) 9999-9999'" data-mask required>
                        </div>
                    </div>

                    <label>Dirección</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="direccionEditar" class="form-control" placeholder="Direccion">
                        </div>
                    </div>

                    <label>Correo Electrónico</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="correoEditar" class="form-control" placeholder="Correo">
                        </div>
                    </div>

                    <label>Fecha de Cumpleaños</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="date" name="fecha_cumpleEditar" class="form-control" placeholder="Fecha Cumpleaños">
                        </div>
                    </div>

                    <label>Edad</label>
                    <div class="form-group ">
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="num" name="edadEditar" class="form-control" placeholder="Edad">
                        </div>
                        
                    </div>

                    <label>Observaciones</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                            <input type="text" name="observacionesEditar" class="form-control" placeholder="Observaciones">
                        </div>
                    </div>

                    <label>Foto</label>
                    <div class="form-group">
                        <div class="input-group-prepend  panel">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" name="fotoEditar" class="">
                            
                        </div>
                        <div class="input-group-prepend panel">
                            <img class="mt-2 img-thumbnail" id="foto-previewEditar" width="250 px">
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