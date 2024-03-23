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
            /*{ data: null, title: '#', render: function (data, type, row, meta) {
                return meta.row + 1;
            }},*/
            { data: 'nombre', name: 'nombre' },
            { data: 'apellido', name: 'apellido' },
            { data: 'correo', name: 'correo'},
            { data: 'telefono', name: 'telefono'},
            { data: 'created_at', name: 'fecha_inicio'},
            { data: 'paquete', name: 'paquete'},
            //CAMPO DE ACTIVO
            {
                data: null,
                render: function(data, type, row) {
                    var fechaActual = new Date();
                    var fechaInicio = new Date(row.fecha_inicio);
                    var fechaTermino = new Date(row.fecha_termino);
    
                    if (fechaInicio <= fechaActual && fechaActual <= fechaTermino) {
                        return '<small class="badge badge-success">Activo</small>';
                    } else {
                        return '<small class="badge badge-danger">Inactivo</small>';
                    }
                }, name: 'activo', orderable: false, searchable: false
            },
            //BOTONES VER DETALLES, EDITAR Y VENTA PAQUETE
            {
                data: 'id',
                render: function(data, type, row) {
                    return '<div class="btn-group">' +
                        '<button class="btn btn-info btn-sm " onclick="window.open(urlDetallesSocio.replace(\'ID\', ' + data + '), \'_blank\', \'width=500,height=800,left=200,top=200\');">Detalles</button>' +
                        '<button data-id="' + data + '" class="btn btn-success btn-sm boton-venta ml-1">Venta Paquete</button>' +
                        '<button data-id="' + data + '" class="ml-1 btn btn-warning btn-sm boton-editar"><i class="fas fa-edit"></i></button>' +
                        '</div>' +
                    '</div>';
                }, name: 'accion', orderable: false, searchable: false
            },
        ]
    });


    // Boton de Ver Detalles del Clientes

    /*
    $('body').on('click', '.boton-detalles', function() {
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
                // Muestra el modal
                $('#modal-detalles-socio').modal('show');
            }
        });
    });*/


    //Boton de editar cliente =================================//
    $('body').on('click', '.boton-editar', function() {
        var id = $(this).data('id');
        //console.log(id);
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

        //Previsualizacion de imagen al editar
        $('input[name="fotoEditar"]').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var ext = input.files[0].name.split('.').pop().toLowerCase();
                if (ext == "png" || ext == "jpeg" || ext == "jpg") {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#foto-previewEditar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#foto-previewEditar').attr('src', 'img/placeholder.png');
                }
            }
        });

    });

    //Previsualizacion de imagen al registrar
    $('input[name="foto"]').on('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            var ext = input.files[0].name.split('.').pop().toLowerCase();
            if (ext == "png" || ext == "jpeg" || ext == "jpg") {
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


    //Boton de activar/desactivar adeudo
    $('#check-adeudo').change(function() {
        if ($(this).is(':checked')) {
            // Si el checkbox está marcado, quita el atributo hidden del div
            $('#pago-credito').removeAttr('hidden');

            $('input[name="pago-realizado"], input[name="costo"]').on('input', function() {
                var pagoRealizado = parseFloat($('input[name="pago-realizado"]').val()) || 0;
                var costo = parseFloat($('input[name="costo"]').val()) || 0;
            
                var adeudo = costo - pagoRealizado;
            
                $('input[name="adeudo"]').val(adeudo);
            });

        } else {
            // Si el checkbox no está marcado, añade el atributo hidden al div
            $('#pago-credito').attr('hidden', 'hidden');
        }
    });


    //Metodos de Pagos

    $('#metodo-pago').change(function() {
        var metodoPago = $(this).val();
    
        if (metodoPago === 'Transferencia' || metodoPago === 'Tarjeta') {
            // Si el método de pago es transferencia o tarjeta, quita el atributo hidden del div
            $('#referenciaP').removeAttr('hidden');
        } else {
            // Si el método de pago es diferente, añade el atributo hidden al div
            $('#referenciaP').attr('hidden', 'hidden');
        }
    });

    //Boton de venta paquete a Socio
    $('body').on('click', '.boton-venta', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'socios/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('input[name="id-cliente"]').val(data.id);
                $('input[name="nombre"]').val(data.nombre + ' ' + data.apellido);

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

    //Envío de información de venta de paquete u actualización de datos del socio
    $('#form-ventaPaquete').on('submit', function(e) {
        e.preventDefault();
        var id = $('input[name="id-cliente"]').val();
    
        var ventaPaqueteDatos = {
            id_cliente: $('input[name="id-cliente"]').val(),
            tipo_paquete: $('select[name="tipo_paquete"]').val(),
            costo: $('input[name="costo"]').val(),
            duracion: $('input[name="duracion"]').val(),
            fecha_inicio: $('input[name="fecha_inicio"]').val(),
            nombre_administrador: $('input[name="nombre-usuario"]').val(),
            metodo_pago: $('select[name="metodo_pago"]').val(),
            referencia: $('input[name="referencia"]').val() || null,
        }; // Recoge los datos del formulario para la venta de paquete
    
        //AJAX para enviar dcrear la venta de Paquete
        $.ajax({
            url: 'ventas-paquetes', 
            method: 'POST', // o 'PUT' si estás actualizando
            data: {
                _token: $('input[name="_token"]').val(),
                ...ventaPaqueteDatos
            },
            success: function(response) {
                socioData = {
                    paquete: $('select[name="tipo_paquete"]').val(),
                    fecha_inicio: $('input[name="fecha_inicio"]').val(),
                    duracion: $('input[name="duracion"]').val(),
                    adeudo: $('input[name="adeudo"]').val() || null,
                    //Si el campo adeudo contiene algun dato, se le debe imprimir un boton de eliminar adeudo que haga un SET al campo adeudo como NULL, este boton requiere una funcion nivea en el controlador de socios

                } //Recoge los datos del formulario para el socio

                //AJAX para enviar la actualización de datos del socio
                $.ajax({
                    url: 'clienteVenta/' + id, // Usa el atributo action del formulario como la URL
                    method: 'PUT', 
                    data: {
                        _token: $('input[name="_token"]').val(),
                        ...socioData
                    },
                    success: function(response) {

                        Swal.fire({
                            title: '¡Éxito!',
                            text: "Venta realizada con éxito",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Maneja la respuesta del servidor
                        // Cerrar el modal y recargar la tabla
                        $('#modal-venta-paquete').modal('hide');
                        $('#clientes-table').DataTable().ajax.reload();
                        $('#form-ventaPaquete').trigger('reset');
                        $('#pago-credito').attr('hidden', 'hidden');

                    }
                });


                
            }
        });

        

    });


    //Inicializacion y funcion para visualizar la imagen del socio en MODAL
    $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
        alwaysShowClose: true
        });
    });
    })

});