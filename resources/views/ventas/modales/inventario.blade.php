<!-- Modal -->
<div class="modal fade" id="modal-agregar-producto" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-agregar-producto">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--=========================================
                        CUERPO DEL MODAL AGREGAR PRODUCTO
                ==========================================-->
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            <input type="text" class="form-control" name="codigoAgregar" placeholder="Codigo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-bars"></i></span>
                            <input type="text" class="form-control" name="descripcionAgregar" placeholder="Descripcion">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                            <input type="number" class="form-control" name="stockAgregar" min="0" placeholder="Cantidad Disponible" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                <input type="number" class="form-control" name="precioCompraAgregar" placeholder="Precio Compra">
                        </div>
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                            <input type="number" class="form-control" name="precioVentaAgregar" placeholder="Precio Venta">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend  panel">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" name="imagen" class="">
                            
                        </div>
                        <div class="input-group-prepend panel">
                            <img src="" class="mt-2 img-thumbnail" id="imagen-preview" width="250 px">
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

<!-- Modal -->
<div class="modal fade" id="modal-editar-producto" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editar-producto">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--=========================================
                        CUERPO DEL MODAL AGREGAR PRODUCTO
                ==========================================-->
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                            <input type="text" class="form-control" name="id-producto" placeholder=" " hidden>
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            <input type="text" class="form-control" name="codigoEditar" placeholder="Codigo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-bars"></i></span>
                            <input type="text" class="form-control" name="descripcionEditar" placeholder="Descripcion">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                            <input type="number" class="form-control" name="stockEditar" min="0" placeholder="Cantidad Disponible" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                <input type="number" class="form-control" name="precioCompraEditar" placeholder="Precio Compra">
                        </div>
                        <div class="input-group-prepend col-xs-12 col-sm-6">
                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                            <input type="number" class="form-control" name="precioVentaEditar" placeholder="Precio Venta">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend  panel">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" name="imagenEditar" class="">
                            
                        </div>
                        <div class="input-group-prepend panel">
                            <img src="" class="mt-2 img-thumbnail" id="imagen-previewEditar" width="250 px">
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
<!-- Fin del modal -->

<!----------------------------------------------------------------------------------------------------------->