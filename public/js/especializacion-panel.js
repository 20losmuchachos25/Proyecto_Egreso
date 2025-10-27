function ListarEspecializaciones(ID){
    const modal = document.getElementById("EspecializacionModal");
    modal.style.display = "block";

    document.getElementById("IDOculto3").value = ID;
    fetch(`/clinica/especializaciones/json`)
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById("Especializacion");
        select.innerHTML = ""; // Limpiamos

        const opcionDefault = document.createElement("option");
        opcionDefault.value = "";
        opcionDefault.textContent = "Seleccionar especialización...";
        opcionDefault.disabled = true;
        opcionDefault.selected = true;
        select.appendChild(opcionDefault);

        const lista = data.Especializaciones;


        lista.forEach(nombre => {
            const option = document.createElement("option");
            option.value = nombre; // o podrías usar un ID si existiera
            option.textContent = nombre;
            select.appendChild(option);
        });
    })
    .catch(error => console.error('Error al cargar JSON:', error));

    fetch(`/clinicas/${ID}/especializaciones`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("#especializaciones tbody");
            tbody.innerHTML = ""; // Limpiamos la tabla

            if (data.length > 0) {
                data.forEach(esp => {
                    const tr = document.createElement("tr");

                    const tdEspecializacion = document.createElement("td");
                    tdEspecializacion.textContent = esp.Especializacion;
                    tr.appendChild(tdEspecializacion);

                    const tdAcciones = document.createElement("td");

                    const btnEliminar = document.createElement("button");
                    btnEliminar.textContent = "🗑️ Eliminar";
                    btnEliminar.classList.add("eliminar-btn");
                    btnEliminar.addEventListener("click", () => {
                        EliminarEspecializacion(esp.Especializacion);
                    });

                    tdAcciones.appendChild(btnEliminar);
                    tr.appendChild(tdAcciones);

                    tbody.appendChild(tr);
                });
            } else {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                td.setAttribute("colspan", 2);
                td.textContent = "No se encontraron especializaciones registradas.";
                tr.appendChild(td);
                tbody.appendChild(tr);
            }
    })
    .catch(err => console.error(err));


}
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("EspecializacionModal");
    const closeBtn = document.querySelector(".close5");

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });


});
function EliminarEspecializacion(especializacion) {
    const idClinica = document.getElementById("IDOculto3").value;

    // Confirmación antes de eliminar
    if (!confirm(`¿Estás seguro que querés eliminar la especialización ${especializacion}?`)) {
        return;
    }

    fetch(`/clinica/${idClinica}/Especializacion/${especializacion}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            IDOculto3: idClinica,
            Especializacion: especializacion
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
            ListarEspecializaciones(idClinica); 
        } else {
            alert(data.message || 'No se pudo eliminar la especialización.');
        }
    })
    .catch(error => {
        console.error('Error al eliminar:', error);
        alert('Ocurrió un error al intentar eliminar la especialización.');
    });
}

