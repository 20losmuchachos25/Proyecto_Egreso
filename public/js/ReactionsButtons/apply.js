function ModificarInput(id) {
    if (id.hasAttribute('readonly') || id.hasAttribute('disabled')) {
        return;
    }

    const documento = document.getElementById("documentooculto").value;
    const valor = id.value;
    const idInput = id.id;

    $.ajax({
        url: modificarDatoUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        data: { id: documento , dato: idInput, valor: valor},
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Modificación exitosa',
                timer: 1500,
                showConfirmButton: false
            });
            actualizarFilaTabla(documento, idInput, valor);
            if(id == document.getElementById("Tipo_Documento") || id == document.getElementById("Estado")){
                id.setAttribute("disabled", true);
            }
            else{
                id.setAttribute("readonly", true);
            }
        },
        error: function() {
            console.error('Error al modificar el dato en la base de datos');
        }
    });
}