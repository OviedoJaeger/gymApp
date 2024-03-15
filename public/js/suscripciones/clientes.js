$(document).ready(function() {

    $("[data-inputmask]").inputmask();

    $('.boton-editar').on('click', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'socios/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('#modal-id-input').val(data.id);
                $('input[name="nombre"]').val(data.nombre);
                $('input[name="apellido"]').val(data.apellido);
                $('input[name="foto"]').val(data.foto);
                $('input[name="telefono"]').val(data.telefono);
                $('input[name="telefono_emergencia"]').val(data.telefono_emergencia);
                $('input[name="direccion"]').val(data.direccion);
                $('input[name="correo"]').val(data.correo);
                $('input[name="fecha_cumple"]').val(data.fecha_cumple);
                $('input[name="edad"]').val(data.edad);
                $('input[name="observaciones"]').val(data.observaciones);
                
                // Establece el atributo action del formulario
                $('#form-editarCliente').attr('action', 'socios/' + data.id);
                // Muestra el modal
                $('#modal-editar-socio').modal('show');
            }
        });
    });

    //Boton de venta paquete a Socio
    $('.boton-venta').on('click', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'socios/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('input[name="id-cliente"]').val(data.id);
                $('input[name="nombre"]').val(data.nombre + ' ' + data.apellido);

                // Establece el atributo action del formulario
                $('#form-ventaPaquete').attr('action', 'socios/' + data.id);

                // Hace una solicitud AJAX para obtener los paquetes
                $.ajax({
                    url: 'getPaquetes',
                    method: 'GET',
                    success: function(paquetes) {
                        // Llena el select con los paquetes
                        var select = $('select[name="tipo_paquete"]');
                        select.empty();
                        $.each(paquetes, function(index, paquete) {
                            select.append('<option value="' + paquete.paquete + '">' + paquete.paquete + '</option>');
                        });
                
                        // Agrega un controlador de eventos change al select
                        select.change(function() {
                            var selectedOption = $(this).val(); // Obtiene el valor de la opción seleccionada
                            var selectedPackage = paquetes.find(function(paquete) {
                                return paquete.paquete == selectedOption; // Encuentra el paquete que corresponde a la opción seleccionada
                            });
                            if (selectedPackage) {
                                $('input[name="costo"]').val(selectedPackage.costo); // Establece el valor del campo de entrada al costo del paquete seleccionado
                            }
                        });

                        select.change(function() {
                            var selectedOption = $(this).val(); // Obtiene el valor de la opción seleccionada
                            var selectedPackage = paquetes.find(function(paquete) {
                                return paquete.paquete == selectedOption; // Encuentra el paquete que corresponde a la opción seleccionada
                            });
                            if (selectedPackage) {
                                $('input[name="costo"]').val(selectedPackage.costo); // Establece el valor del campo de entrada al costo del paquete seleccionado
                                $('input[name="duracion"]').val(selectedPackage.duracion); // Establece el valor del campo de entrada a la duración del paquete seleccionado
                            }
                        });
                
                        // Establece el valor inicial del campo de entrada al costo del primer paquete
                        if (paquetes.length > 0) {
                            $('input[name="costo"]').val(paquetes[0].costo);
                            $('input[name="duracion"]').val(paquetes[0].duracion);
                        }
                    }
                });

                // Muestra el modal
                $('#modal-venta-paquete').modal('show');
            }
        });
    });

});