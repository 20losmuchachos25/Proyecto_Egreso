function actualizarFilaTabla(documento, campo, valor) {
    // Buscar la fila con ese documento
    const fila = document.querySelector(`tr[data-documento="${documento}"]`);
    if (!fila) return;

    // Definir el índice de las columnas (basado en el orden de tu tabla)
    const columnas = {
        Tipo_Documento: 0,
        Documento: 1,
        Primer_Nombre: 2,
        Segundo_Nombre: 3,
        Primer_Apellido: 4,
        Segundo_Apellido: 5,
        Edad: 6,
        Fecha_Nacimiento: 7,
        Sexo: 8,
        Mutualista: 9,
        Estado: 10,
        Celular: 11,
        Email: 12,
        tipo_usuario: 13
    };

    const index = columnas[campo];
    if (index === undefined) return;

    fila.children[index].textContent = valor;

}
