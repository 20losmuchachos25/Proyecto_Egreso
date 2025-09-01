function deshabilitarInput(id) {
    if(id == document.getElementById("Tipo_Documento") || id == document.getElementById("Estado")){
        id.setAttribute("disabled", true);
    }
    else{
        id.setAttribute("readonly", true);
    }


    const idInput = id.id;

    const documento = document.getElementById("documentooculto").value;
    const inputElement = document.getElementById(idInput);

    fetch(consultaDatoUrl, {
    method: 'POST',
    headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            id: documento,
            dato: idInput
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.data && data.data[idInput] !== undefined) {
            inputElement.value = data.data[idInput];
        } else {
            console.error('No se encontró el dato o no existe la propiedad', idInput);
        }
    })
    .catch(error => console.error('Error al consultar el dato en la base de datos', error));
}