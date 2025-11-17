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
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ especializacion })
    })
    .then(res => res.json())
    .then(data => {
        console.log("Clínicas encontradas:", data);
    })
    .catch(err => console.error(err));
});

