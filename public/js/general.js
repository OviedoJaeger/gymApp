$(document).ready(function() {

    $('.eliminar-boton').on('click', function(e) {
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
    
});