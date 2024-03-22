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
                        CUERPO DEL MODAL AGREGAR PAQUETE
                ==========================================-->
                <div class="modal-body">
                    <label>Nombre del Paquete</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                            <input type="text" name="paquete" class="form-control" placeholder="Nombre del Paquete" required>
                        </div>
                    </div>

                    <label>Costo del Paquete</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" name="costo" class="form-control" placeholder="Costo del paquete" required>
                        </div>
                    </div>

                    <label>Duracion del Paquete</label>
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



<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->



<!-- Modal de Editar Paquete-->
<div class="modal fade" id="modal-editar-suscripcion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editarPaquete" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Editar Suscripción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--=========================================
                        CUERPO DEL MODAL EDITAR PAQUETE
                ==========================================-->
                <div class="modal-body">
                    <input type="hidden" id="modal-id-input">
                    <label>Nombre del Paquete</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                            <input type="text" name="paqueteEditar" class="form-control" required>
                        </div>
                    </div>

                    <label>Costo del Paquete</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" name="costoEditar" class="form-control" required>
                        </div>
                    </div>

                    <label>Duracion del Paquete</label>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            <input type="number" name="duracionEditar" class="form-control" required>
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