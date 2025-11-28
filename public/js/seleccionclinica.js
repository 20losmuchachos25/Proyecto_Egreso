document.addEventListener('change', function (e) {
    if (!e.target.classList.contains('seleccionarClinica')) return;

    // Desmarcar los demás
    document.querySelectorAll('.seleccionarClinica').forEach(cb => {
        if (cb !== e.target) cb.checked = false;
    });

    const fila = e.target.closest('tr');
    const idClinica = fila.getAttribute('data-idclinica');

    document.getElementById('ClinicaSeleccionada').value = idClinica;

    console.log("Clínica seleccionada:", idClinica);
});
