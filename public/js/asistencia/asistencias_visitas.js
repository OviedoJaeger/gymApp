$(document).ready(function() {

    $('#asistenciasVisitas-table').DataTable({
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
            { data: 'nombre_administrador', name: 'nombre_administrador' },
            { data: 'metodo_pago', name: 'metodo_pago' },
            { data: 'costo', name: 'costo'},
            { data: 'referencia', name: 'referencia'},
            { data: 'created_at', name: 'created_at'},
            { data: 'nombre', name: 'clientes_visitas.nombre' },
            { data: 'apellido', name: 'clientes_visitas.apellido' },
        ]
    });

});