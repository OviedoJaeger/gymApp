$(document).ready(function() {

    // Inicializa la tabla de clientes
    
    $('#productos-table').DataTable({
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
        ajax: inventarioIndexUrl,
        columns: [
            {
                data: 'imagen',
                render: function(data, type, row) {
                    if (data) {
                        return '<a href="' + data + '" data-toggle="lightbox" data-title="Imagen de: ' + row.nombre + '" data-gallery="gallery">' +
                                '<img src="' + assetBaseUrl + data + '" class="img-thumbnail" width="50 px"></a>';
                    } else {
                        return 'Sin imagen';
                    }
                }, name: 'imagen', orderable: false, searchable: false
            },

            { data: 'codigo', name: 'codigo'},
            { data: 'descripcion', name: 'descripcion'},
            { data: 'stock', name: 'stock'},
            { data: 'precio_compra', name: 'precio_compra'},
            { data: 'precio_venta', name: 'precio_venta'},
            { data: 'created_at', name: 'created_at'},

            //DISPONIBILIDAD
            {
                data: null,
                render: function(data, type, row) {
                    var estado_disponible = row.estado_disponible;
                    if (estado_disponible == 1) {
                        return '<small class="badge badge-success">Disponible</small>';
                    } else {
                        return '<small class="badge badge-danger">Descontinuado</small>';
                    }
                }, name: 'Disponibilidad', orderable: false, searchable: false
            },
            //BOTONES
            {
                data: 'id',
                render: function(data, type, row) {
                    return  '<div class="btn-group">' +
                            '<button data-id="' + data + '" class="ml-1 btn btn-warning btn-sm boton-editar"><i class="fas fa-edit"></i></button>' +
                            '<button data-id="' + data + '" class="ml-1 btn btn-info btn-sm boton-disponibilidad">Disponibilidad</button>' +
                            '</div>';
                }, name: 'accion', orderable: false, searchable: false
            },
        ]
    });

    //ACCION BOTON EDITAR PRODUCTO
    $('body').on('click', '.boton-editar', function() {
        var id = $(this).data('id');
        //console.log(id);
        $.ajax({
            url: '',
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('#modal-id-input').val(data.id);
                $('#foto-previewEditar').attr('src', assetBaseUrl + data.imagen);
                $('input[name="codigoEditar"]').val(data.codigo);
                $('input[name="descripcionEditar"]').val(data.descripcion);
                $('input[name="stockEditar"]').val(data.stock);
                $('input[name="precioCompraEditar"]').val(data.precio_compra);
                $('input[name="precioVentaEditar"]').val(data.precio_venta);
                
                // Establece el atributo action del formulario
                $('#form-editar-producto').attr('action', 'productos/' + data.id);
                // Muestra el modal
                $('#modal-editar-producto').modal('show');
            }
        });

        $('input[name="imagenEditar"]').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var ext = input.files[0].name.split('.').pop().toLowerCase();
                if (ext == "png" || ext == "jpeg" || ext == "jpg") {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagen-previewEditar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#imagen-previewEditar').attr('src', 'img/placeholder.png');
                }
            }
        });
    });

    //Previsualizacion de imagen
    $('input[name="imagen"]').on('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            var ext = input.files[0].name.split('.').pop().toLowerCase();
            if (ext == "png" || ext == "jpeg" || ext == "jpg") {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagen-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#imagen-preview').attr('src', 'img/placeholder.png');
            }
        }
    });

    // ACCION DISPONIBILIDAD DEL PRODUCTO (DISPONIBLE / DESCONTINUADO)
    $('body').on('click','.boton-Disponibilidad' , function() {
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
                $('#modal-editar-productos').modal('show');
            }
        });
    });

    //MODAL EDITAR PRODUCTO
    $('#form-editar-producto').on('submit', function(e) {
        e.preventDefault();
        var id = $('input[name="id-cliente"]').val();
    
        var productoActualizadoDatos = {
            id_producto: $('input[name="id-producto"]').val(),
            codigo: $('input[name="codigoEditar"]').val(),
            descripcion: $('input[name="descripcionEditar"]').val(),
            stock: $('input[name="stockEditar"]').val(),
            precio_compra: $('input[name="precioCompraEditar"]').val(),
            precio_venta: $('input[name="precioVentaEditar"]').val()
        }; 
        //Realiza el nuevo registro de la visita (asistencia visita a la vez)
        $.ajax({
            url: 'EDITAR', 
            method: 'POST', // o 'PUT' si estás actualizando
            data: {
                _token: $('input[name="_token"]').val(),
                ... productoActualizadoDatos
            },
            success: function(response) {
                //Recoge los datos del formulario para el socio
                $.ajax({
                    url: 'EDITAR' + id, // Usa el atributo action del formulario como la URL
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
                        $('#modal-editar-producto').modal('hide');
                        $('#productos-table').DataTable().ajax.reload();
                        $('#form-editar-producto').trigger('reset');

                    }
                });


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