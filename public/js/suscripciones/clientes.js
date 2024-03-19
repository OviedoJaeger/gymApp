$(document).ready(function() {

    $("[data-inputmask]").inputmask();

    // Inicializa la tabla de clientes
    
    $('#clientes-table').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
        processing: true,
        serverSide: true,
        ajax: clientesIndexUrl,
        columns: [
            { data: 'nombre', name: 'nombre' },
            { data: 'apellido', name: 'apellido' },
            { data: 'correo', name: 'correo'},
            { data: 'telefono', name: 'telefono'},
            { data: 'created_at', name: 'fecha_inicio'},
            { data: 'paquete', name: 'paquete'},
            { data: 'foto', name: 'foto', orderable: false, searchable: false },
            { data: 'activo' , name: 'activo', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });



    $('.boton-editar').on('click', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'socios/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('#modal-id-input').val(data.id);
                $('input[name="nombreEditar"]').val(data.nombre);
                $('input[name="apellidoEditar"]').val(data.apellido);
                $('#foto-previewEditar').attr('src', assetBaseUrl + data.foto);
                $('input[name="telefonoEditar"]').val(data.telefono);
                $('input[name="telefono_emergenciaEditar"]').val(data.telefono_emergencia);
                $('input[name="direccionEditar"]').val(data.direccion);
                $('input[name="correoEditar"]').val(data.correo);
                $('input[name="fecha_cumpleEditar"]').val(data.fecha_cumple);
                $('input[name="edadEditar"]').val(data.edad);
                $('input[name="observacionesEditar"]').val(data.observaciones);
                
                // Establece el atributo action del formulario
                $('#form-editarCliente').attr('action', 'socios/' + data.id);
                // Muestra el modal
                $('#modal-editar-socio').modal('show');
            }
        });

        $('input[name="fotoEditar"]').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var ext = input.files[0].name.split('.').pop().toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg") {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#foto-previewEditar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#foto-preview').attr('src', 'img/placeholder.png');
                }
            }
        });

    });

    //Previsualizacion de imagen
    $('input[name="foto"]').on('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            var ext = input.files[0].name.split('.').pop().toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg") {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#foto-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#foto-preview').attr('src', 'img/placeholder.png');
            }
        }
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
                $('#form-ventaPaquete').attr('action', 'ventas-paquetes/' + data.id);

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

        $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
            alwaysShowClose: true
            });
        });

        })

});