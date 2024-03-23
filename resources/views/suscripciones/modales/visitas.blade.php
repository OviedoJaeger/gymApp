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
                            <input type="text" name = "nombre" class="form-control"  placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                            <input type="text" name="apellido" class="form-control"  placeholder="Apellido">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="telefono" class="form-control"  data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            <input type="text" name="domicilio" class="form-control"  placeholder="Domicilio">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend  panel">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" class="" name="foto">
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

    <!-- Modal Registrar Nueva Visita-->
<div class="modal fade" id="modal-registrar-visita" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-registrar-visita"> 
                @csrf
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
                    <label>Nombre del Administrador</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="nombreAdmin" placeholder="Vendedor" value="{{ auth()->user()->name}}" required readonly>
                        </div>
                    </div>
                    <label>Nombre del Cliente</label>
                    <div class="form-group">
                        <input hidden type="text" name="id-cliente">
                        <div class="input-group-prepend">
                            <input type="text" name="id-visitas" class="form-control" placeholder="Cliente" hidden>
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nombreVisita" class="form-control" placeholder="Cliente" readonly>
                        </div>
                    </div>
                    
                    <label>Costo</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" name="costoVisita" class="form-control" placeholder="Costo" readonly>
                        </div>
                    </div>
                    
                    <label>Método de Pago</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            <select class="form-control" id="metodoPagoVisita" name="metodoPagoVisita" required>
                                <option value="">Metodo Pago</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="referenciaNuevaVisita" hidden>
                        <div class="input-group-prepend" >
                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            <input type="number" name="referenciaPagoVisita" class="form-control"placeholder="referencia">
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

    <!-- Modal de Editar visita-->
<div class="modal fade" id="modal-editar-visita" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editarVisita" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Editar Socio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--=========================================
                        CUERPO DEL MODAL EDITAR VISITA
                ==========================================-->
                <div class="modal-body">
                    <input type="hidden" id="modal-id-input">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text"  name="nombreEditar"  class="form-control"  placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="apellidoEditar" class="form-control" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="domicilioEditar" class="form-control" placeholder="Direccion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="telefonoEditar" class="form-control" data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend  panel">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" name="fotoEditar" class="">
                            
                        </div>
                        <div class="input-group-prepend panel">
                            <img src="" class="mt-2 img-thumbnail" id="foto-previewEditar" width="250 px">
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