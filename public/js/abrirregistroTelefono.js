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

function EditarTelefono(telefono){
    const idClinica = document.getElementById("IDOculto").value;

    if (!confirm(`¿Estás seguro que querés eliminar el teléfono ${telefono}?`)) {
        return;
    }  
    
    fetch('/Clinica/${idClinica}/Telefono/${telefono}',{
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })

    
}
