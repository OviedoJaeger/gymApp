$(document).ready(function() {

    // Inicializa la tabla de lockers

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
    
    $('#lockers-table').DataTable({
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
        ajax: lockersIndexUrl,
        columns: [
            /*{ data: null, title: '#', render: function (data, type, row, meta) {
                return meta.row + 1;
            }},*/
            { data: 'numero', name: 'numero' },
            { data: 'cliente', name: 'cliente' },
            { data: 'created_at', name: 'created_at'},
            //BOTONES
            {      
                data: 'id',
                render: function(data, type, row) {
                    return  '<form data-id="' + data + '" action="' + destroyUrlBase + '/' + data + '" method="POST" class="d-inline">' +
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                    '<button class="ml-1 btn btn-danger btn-sm eliminar-boton" type="submit"><i class="fas fa-trash-alt"></i></button>' +
                    '</form>';

                }, name: 'accion', orderable: false, searchable: false
            },
        ]
    });

});