$(document).ready(function() {
    $('.boton-editar').on('click', function() {
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'suscripciones/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('#modal-id-input').val(data.id_paquete);
                $('input[name="paquete"]').val(data.paquete);
                $('input[name="costo"]').val(data.costo);
                $('input[name="duracion"]').val(data.duracion);
                
                // Establece el atributo action del formulario
                $('#form-editarPaquete').attr('action', 'suscripciones/' + data.id_paquete);
                // Muestra el modal
                $('#modal-editar-suscripcion').modal('show');
            }
        });
    });
});