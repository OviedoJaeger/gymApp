$(document).ready(function() {

    $("[data-inputmask]").inputmask();

    $('.boton-editar').on('click', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'visitas-socios/' + id,
            method: 'GET',
            success: function(data) {
                // Inserta los datos en el modal
                $('#modal-id-input').val(data.id);
                $('input[name="nombre"]').val(data.nombre);
                $('input[name="apellido"]').val(data.apellido);
                $('input[name="telefono"]').val(data.telefono);
                $('input[name="domicilio"]').val(data.domicilio);
                
                // Establece el atributo action del formulario
                $('#modal-agregar-visita').attr('action', 'visitas/' + data.id);
                // Muestra el modal
                $('#modal-agregar-visita').modal('show');
            }
        });
    });

});