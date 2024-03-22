$(document).ready(function() {

    $('#ventaspaquetes-table').DataTable({
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
        ajax: VentaPaquetesIndexUrl,
        columns: [
            { data: 'tipo_paquete', name: 'tipo_paquete' },
            { data: 'costo', name: 'costo'},
            { data: 'duracion', name: 'duracion'},
            { data: 'created_at', name: 'created_at'},
            { data: 'nombre', name: 'clientes.nombre' },
            { data: 'apellido', name: 'clientes.apellido' },
            { data: 'nombre_administrador', name: 'nombre_administrador' },

        //BOTONES
        {
                
            data: 'id',
            render: function(data, type, row) {
                return  '<form data-id="' + data + '" action="' + destroyUrlBase + '/' + data + '" method="POST" class="d-inline">' +
                '<input type="hidden" name="_method" value="DELETE">' +
                '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                '<button class="btn btn-danger btn-sm eliminar-boton" type="submit">Eliminar</button>' +
                '</form>';

            }, name: 'accion', orderable: false, searchable: false
        },
        ]
    });

});