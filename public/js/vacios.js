document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registroForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const tipodocumento = document.getElementById('Tipo_Documento').value;
        const documento = document.getElementById('Documento').value.trim();
        const primerNombre = document.getElementById('Primer_Nombre').value.trim();
        const primerApellido = document.getElementById('Primer_Apellido').value.trim();
        const email = document.getElementById('Email').value.trim();
        const mutualista = document.getElementById('Mutualista').value;
        const rol = document.getElementById('Rol').value;
        const sexo = document.querySelector('input[name="Sexo"]:checked');

        if (!documento || !primerNombre || !primerApellido || !email) {
            alert("Por favor, complete todos los campos de texto obligatorios.");
            return;
        }
        if (!tipodocumento) {
            alert("Seleccione una Tipo de Documento.");
            return;
        }
        if (!mutualista) {
            alert("Seleccione una Mutualista.");
            return;
        }
        if (!rol) {
            alert("Seleccione un Tipo de Usuario.");
            return;
        }
        if (!sexo) {
            alert("Seleccione un Sexo.");
            return;
        }

        form.submit();
    });
});
