function AbrirTelefonoModal(ID){
    const modal = document.getElementById("TelModal");
    modal.style.display = "block";

    document.getElementById("IDOculto").value = ID;
    fetch(`/clinicas/${ID}/telefonos`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("#telefonos tbody");
            tbody.innerHTML = ""; // Limpiamos la tabla

            if (data.length > 0) {
                data.forEach(tel => {
                    const tr = document.createElement("tr");

                    const tdTelefono = document.createElement("td");
                    tdTelefono.textContent = tel.Telefono;
                    tr.appendChild(tdTelefono);

                    const tdAcciones = document.createElement("td");

                    const btnEditar = document.createElement("button");
                    btnEditar.textContent = "✏️ Editar";
                    btnEditar.classList.add("editar-btn");
                    btnEditar.addEventListener("click", () => {
                        EditarTelefono(tel.Telefono, ID);
                    });

                    const btnEliminar = document.createElement("button");
                    btnEliminar.textContent = "🗑️ Eliminar";
                    btnEliminar.classList.add("eliminar-btn");
                    btnEliminar.addEventListener("click", () => {
                        EliminarTelefono(tel.Telefono);
                    });

                    tdAcciones.appendChild(btnEditar);
                    tdAcciones.appendChild(btnEliminar);
                    tr.appendChild(tdAcciones);

                    tbody.appendChild(tr);
                });
            } else {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                td.setAttribute("colspan", 2);
                td.textContent = "No se encontraron teléfonos registrados.";
                tr.appendChild(td);
                tbody.appendChild(tr);
            }
    })
    .catch(err => console.error(err));


}
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("TelModal");
    const closeBtn = document.querySelector(".close3");

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });


});

function EliminarTelefono(telefono) {
    const idClinica = document.getElementById("IDOculto").value;

    // Confirmación antes de eliminar
    if (!confirm(`¿Estás seguro que querés eliminar el teléfono ${telefono}?`)) {
        return;
    }

    fetch(`/Clinica/${idClinica}/Telefono/${telefono}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            IDOculto: idClinica,
            Telefono: telefono
        })
    })
    .then(response => {
        // Verificar si la respuesta es correcta antes de convertirla a JSON
        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert(data.message);
            AbrirTelefonoModal(idClinica); 
        } else {
            alert(data.message || 'No se pudo eliminar el teléfono.');
        }
    })
    .catch(error => {
        console.error('Error al eliminar:', error);
        alert('Ocurrió un error al intentar eliminar el teléfono.');
    });
}

