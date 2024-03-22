$(document).ready(function() {

    $("[data-inputmask]").inputmask();

    $('#visitas-table').DataTable({
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
        ajax: VisitasIndexUrl,
        columns: [
            { data: 'nombre', name: 'nombre' },
            { data: 'apellido', name: 'apellido' },
            { data: 'telefono', name: 'telefono'},
            { data: 'domicilio', name: 'domicilio'},
            { data: 'created_at', name: 'fecha registro'},
            { data: 'updated_at', name: 'ultima visita'},

            // FOTOS
            {
                data: 'foto',
                render: function(data, type, row) {
                    if (data) {
                        return '<a href="' + data + '" data-toggle="lightbox" data-title="Foto de: ' + row.nombre + '" data-gallery="gallery">' +
                                '<img src="' + assetBaseUrl + data + '" class="img-thumbnail" width="50 px"></a>';
                    } else {
                        return 'Sin Foto';
                    }
                }, name: 'foto', orderable: false, searchable: false
            },
            //BOTONES
            {
                data: 'id',
                render: function(data, type, row) {
                    return '<button data-id="' + data + '" class="btn btn-info btn-sm boton-registrar">Nueva Visita</button>' +
                            '<button data-id="' + data + '" class="btn btn-warning btn-sm boton-editar">Editar</button>';
                }, name: 'accion', orderable: false, searchable: false
            }
        ]
    });

    //EDITAR
    $('body').on('click','.boton-editar', function() {
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            url: 'visitas/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('#modal-id-input').val(data.id);
                $('input[name="nombreEditar"]').val(data.nombre);
                $('input[name="apellidoEditar"]').val(data.apellido);
                $('input[name="telefonoEditar"]').val(data.telefono);
                $('input[name="domicilioEditar"]').val(data.domicilio);
                $('input[name="fechaRegistroEditar"]').val(data.created_at);
                $('input[name="ultimaVisitaEditar"]').val(data.update_at);
                
                // Establece el atributo action del formulario
                $('#form-editarVisita').attr('action', 'visitas/' + data.id);
                // Muestra el modal
                $('#modal-editar-visita').modal('show');
            }
        });
    });

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

    //Previsualizacion de imagen
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

    //ACCION REGISTRAR VISITA
    $('body').on('click','.boton-registrar' , function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'visitas/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('input[name="id-cliente"]').val(data.id);
                $('input[name="nombreVisita"]').val(data.nombre + ' ' + data.apellido);
                
                $.ajax({
                    url: 'paqueteVisita',
                    method: 'GET',
                    success: function(data) {
                        $('input[name="costoVisita"]').val(data.costo);
                        
                    }
                });

                // Muestra el modal
                $('#modal-registrar-visita').modal('show');
            }
        });
    });

        //Metodos de Pagos

        $('#metodoPagoVisita').change(function() {
            var metodoPago = $(this).val();
        
            if (metodoPago === 'Transferencia' || metodoPago === 'Tarjeta') {
                // Si el método de pago es transferencia o tarjeta, quita el atributo hidden del div
                $('#referenciaNuevaVisita').removeAttr('hidden');
            } else {
                // Si el método de pago es diferente, añade el atributo hidden al div
                $('#referenciaNuevaVisita').attr('hidden', 'hidden');
            }
        });
    

    //VENTA DE LA VISITA

    $('#form-registrar-visita').on('submit', function(e) {
        e.preventDefault();
        var id = $('input[name="id-cliente"]').val();
    
        var registroVisitaDatos = {
            id_visita: $('input[name="id-cliente"]').val(),
            costo: $('input[name="costo"]').val(),
            nombre_administrador: $('input[name="nombre-usuario"]').val(),
            metodo_pago: $('select[name="metodo_pago"]').val(),
            referencia: $('input[name="referencia"]').val() || null,
        }; // Recoge los datos del formulario para la venta de paquete
    
        //Realiza el nuevo registro de la visita (asistencia visita a la vez)
        $.ajax({
            url: 'asistencias-visitas', 
            method: 'POST', // o 'PUT' si estás actualizando
            data: {
                _token: $('input[name="_token"]').val(),
                ...registroVisitaDatos
            },
            success: function(response) {
                //Recoge los datos del formulario para el socio
                $.ajax({
                    url: 'nuevaVisita/' + id, // Usa el atributo action del formulario como la URL
                    method: 'PUT', 
                    data: {
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(response) {

                        Swal.fire({
                            title: '¡Éxito!',
                            text: "Visita registrada con éxito",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Maneja la respuesta del servidor
                        // Cerrar el modal y recargar la tabla
                        $('#modal-registrar-visita').modal('hide');
                        $('#visitas-table').DataTable().ajax.reload();
                        $('#form-registrar-visita').trigger('reset');

                    }
                });


            }
        });

        

    });
    


});