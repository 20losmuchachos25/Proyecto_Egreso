document.getElementById('Tratamientos').addEventListener('change', function () {
    const tratamiento = this.value.trim();

    if (tratamiento === "") return;

    const mapaEspecialidades = {
        "Limpieza Dental": "Odontología general",
        "Control y Diagnóstico": "Odontología general",
        "Empaste": "Odontología general",

        "Aplicación de Flúor": "Odontología preventiva",
        "Selladores Dentales": "Odontología preventiva",

        "Curetaje Dental": "Periodoncia",
        "Cirugía de Encías": "Periodoncia",

        "Endodoncia": "Endodoncia",

        "Extracción Dental": "Cirugía Oral y Maxilofacial",

        "Implante Dental": "Prótesis e Implantología",

        "Corona Dental": "Rehabilitación oral",
        "Prótesis Dental": "Rehabilitación oral",

        "Carillas Dentales": "Odontología estética",
        "Blanqueamiento Dental": "Odontología estética",

        "Ortodoncia con Brackets": "Ortodoncia",
        "Alineadores Invisibles": "Ortodoncia"
    };

    const especializacion = mapaEspecialidades[tratamiento] || "Odontología general";

    console.log("Tratamiento seleccionado:", tratamiento);
    console.log("Especialidad detectada:", especializacion);

    // 🔥 Fetch al backend
    fetch('/buscar-clinicas-especialidad', {
        method: 'POST',
        credentials: 'same-origin', // 🔥 IMPORTANTE
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ especializacion })
    })
    .then(res => res.json())
    .then(data => {
        console.log("Clínicas encontradas:", data);

        const tbody = document.querySelector('#clinicas tbody');
        tbody.innerHTML = ""; // limpiar antes de cargar

        if (data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="4" style="text-align:center;">
                        No se encontraron clínicas registradas para este tratamiento.
                    </td>
                </tr>
            `;
            return;
        }

        data.forEach(clinica => {
            tbody.innerHTML += `
                <tr data-idclinica="${clinica.ID_Clinica}">
                    <td>${clinica.ID_Clinica}</td>
                    <td>${clinica.Direccion}</td>
                    <td>(por definir)</td>
                    <td>
                        <input type="checkbox" class="seleccionarClinica">
                    </td>
                </tr>
            `;
        });
    })

    .catch(err => console.error(err));
});

