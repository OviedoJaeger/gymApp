$(document).ready(function() {

    $('#ventasproductos-table').DataTable({
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
        ajax: VentaProductosIndexUrl,
        columns: [
            { data: 'codigo_venta', name: 'codigo_venta' },
            { data: 'nombre_administrador', name: 'nombre_administrador'},
            { data: 'metodo_pago', name: 'metodo_pago'},
            { data: 'turno', name: 'turno'},
            { data: 'created_at', name: 'created_at'},

        //BOTONES
        {
            data: 'id',
            render: function(data, type, row) {
                return '<div class="btn-group">' +
                        '<button data-id="' + data + '" class="btn btn-info btn-sm boton-detalles">Ver Detalles</button>' +
                        '<button data-id="' + data + '" class="ml-1 btn btn-warning btn-sm boton-editar"><i class="fas fa-edit"></i></button>' +
                        '</div>';
            }, name: 'accion', orderable: false, searchable: false
        },
        ]
    });

    

});