function soloLetras(e) {
    const char = String.fromCharCode(e.which);
    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]$/;

    if (!regex.test(char)) {
        e.preventDefault();
    }
}
function soloNumeros(e) {
    const char = String.fromCharCode(e.which);
    const regex = /^[0-9]$/;

    if (!regex.test(char)) {
        e.preventDefault();
    }
}