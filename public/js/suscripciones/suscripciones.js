$(document).ready(function() {

    // Inicializa la tabla de suscripciones

    $('body').on('click', '.eliminar-boton', function(e) {
        e.preventDefault();
        
        Swal.fire({
            title: '¿Está seguro de eliminar?',
            text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        })
    });
    
    $('#suscripciones-table').DataTable({
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
        ajax: suscripcionesIndexUrl,
        columns: [
            /*{ data: null, title: '#', render: function (data, type, row, meta) {
                return meta.row + 1;
            }},*/
            { data: 'paquete', name: 'paquete' },
            { data: 'costo', name: 'costo' },
            { data: 'duracion', name: 'duracion'},
            //BOTONES
            {
                
                data: 'id',
                render: function(data, type, row) {
                    return '<div class="btn-group">' +  
                            '<button data-id="' + data + '" class="ml-1 btn btn-warning btn-sm boton-editar"><i class="fas fa-edit"></i></button>' +
                            '<form data-id="' + data + '" action="' + destroyUrlBase + '/' + data + '" method="POST" class="d-inline">' +
                            '<input type="hidden" name="_method" value="DELETE">' +
                            '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                            '<button class="ml-1 btn btn-danger btn-sm eliminar-boton" type="submit"><i class="fas fa-trash-alt"></i></button>' +
                            '</form>' +
                            '</div>';

                }, name: 'accion', orderable: false, searchable: false
            },
        ]
    });

    $('body').on('click', '.boton-editar',  function() {
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'suscripciones/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('#modal-id-input').val(data.id);
                $('input[name="paqueteEditar"]').val(data.paquete);
                $('input[name="costoEditar"]').val(data.costo);
                $('input[name="duracionEditar"]').val(data.duracion);
                
                // Establece el atributo action del formulario
                $('#form-editarPaquete').attr('action', 'suscripciones/' + data.id);
                // Muestra el modal
                $('#modal-editar-suscripcion').modal('show');
            }
        });
    });
    
});