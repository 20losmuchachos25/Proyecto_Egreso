function ListarHorarios(ID){
    const modal = document.getElementById("HorarioModal");
    modal.style.display = "block";

    document.getElementById("IDOculto4").value = ID;
    
    fetch(`/clinicas/${ID}/horarios`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("#horarios tbody");
            tbody.innerHTML = ""; // Limpiamos la tabla

            if (data.length > 0) {
                data.forEach(hor => {
                    const tr = document.createElement("tr");

                    const tdDia = document.createElement("td");
                    const tdApertura = document.createElement("td");
                    const tdCierre = document.createElement("td");

                    tdDia.textContent = hor.Dia;
                    tdApertura.textContent = hor.Hora_Apertura;
                    tdCierre.textContent = hor.Hora_Cierre;

                    tr.appendChild(tdDia);
                    tr.appendChild(tdApertura);
                    tr.appendChild(tdCierre);


                    const tdAcciones = document.createElement("td");

                    const btnEliminar = document.createElement("button");
                    btnEliminar.textContent = "🗑️ Eliminar";
                    btnEliminar.classList.add("eliminar-btn");
                    btnEliminar.addEventListener("click", () => {
                        EliminarHorario(hor.Dia);
                    });

                    tdAcciones.appendChild(btnEliminar);
                    tr.appendChild(tdAcciones);

                    tbody.appendChild(tr);
                });
            } else {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                td.setAttribute("colspan", 4);
                td.textContent = "No se encontraron horarios registrados.";
                tr.appendChild(td);
                tbody.appendChild(tr);
            }
    })
    .catch(err => console.error(err));


}
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("HorarioModal");
    const closeBtn = document.querySelector(".close6");

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });


});
function AgregarHorario(){
    const idClinica = document.getElementById("IDOculto4").value;
    const Apertura = document.getElementById("Apertura").value;
    const Cierre = document.getElementById("Cierre").value;
    const NuevoHorario = document.querySelector('meta[name="ruta-alta-horario"]').getAttribute('content');


    if (Apertura >= Cierre) {
        alert("La hora de apertura debe ser menor que la de cierre.");
        return false;
    }

    const checkboxes = document.querySelectorAll('input[name="dias[]"]');
    let marcado = false;

    checkboxes.forEach(cb => {
        if (cb.checked){
            marcado = true;
            fetch(NuevoHorario, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ 
                    IDOculto4: idClinica,
                    Dia: cb.value,
                    Apertura: Apertura,
                    Cierre: Cierre
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    ListarHorarios(idClinica);
                    // Limpiar los checkboxes
                    const checkboxes = document.querySelectorAll('input[name="dias[]"]');
                    checkboxes.forEach(cb => cb.checked = false);

                    // Limpiar los inputs de hora
                    document.getElementById("Apertura").value = '';
                    document.getElementById("Cierre").value = '';
                } else {
                    alert('No se logró agregar el horario para: ' + cb.value);
                    // Limpiar los checkboxes
                    const checkboxes = document.querySelectorAll('input[name="dias[]"]');
                    checkboxes.forEach(cb => cb.checked = false);

                    // Limpiar los inputs de hora
                    document.getElementById("Apertura").value = '';
                    document.getElementById("Cierre").value = '';
                }
            })
            .catch(error => console.error('Error al consultar el dato en la base de datos', error));
        }
    });

    if (!marcado) {
        alert("Debes seleccionar al menos un día.");
        return false;
    }
}

function EliminarHorario(especializacion) {
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