$(document).ready(function() {

    $('#asistenciasSocios-table').DataTable({
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
        ajax: RegistroVisitasIndexUrl,
        columns: [
            { data: 'nombre', name: 'clientes.nombre' },
            { data: 'apellido', name: 'clientes.apellido' },
            { data: 'correo', name: 'clientes.correo' },
            { data: 'telefono', name: 'clientes.telefono'},
            { data: 'created_at', name: 'created_at'},
            { data: 'paquete', name: 'clientes.paquete'},
        ]
    });

});