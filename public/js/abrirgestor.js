document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("GestorModal");
    const closeBtn = document.querySelector(".close");
    const botonCliente = document.getElementById("Cliente");
    const botonFuncionario = document.getElementById("Funcionario");
    const botonAdministrativo = document.getElementById("Administrativo");


    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";

            // Limpiar estilos de los botones al cerrar
        botonCliente.style.transform = "";
        botonCliente.style.boxShadow = "";
        botonCliente.style.backgroundColor = "";
        botonFuncionario.style.transform = "";
        botonFuncionario.style.boxShadow = "";
        botonFuncionario.style.backgroundColor = "";
        botonAdministrativo.style.transform = "";
        botonAdministrativo.style.boxShadow = "";
        botonAdministrativo.style.backgroundColor = "";

    });
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";

            // Limpiar estilos de los botones al cerrar
            botonCliente.style.transform = "";
            botonCliente.style.boxShadow = "";
            botonCliente.style.backgroundColor = "";
            botonFuncionario.style.transform = "";
            botonFuncionario.style.boxShadow = "";
            botonFuncionario.style.backgroundColor = "";
            botonAdministrativo.style.transform = "";
            botonAdministrativo.style.boxShadow = "";
            botonAdministrativo.style.backgroundColor = "";
        }
    });
    const filas = document.querySelectorAll("#usuarios tbody tr");
    filas.forEach(fila => {
        const celdas = fila.querySelectorAll("td");
        if (celdas.length >= 6 && !fila.textContent.includes("No se encontraron")) {
            fila.addEventListener("click", () => {
                // Rellenar los campos del modal
                document.getElementById("Tipo_Documento").value = celdas[0].innerText;
                document.getElementById("Documento").value = celdas[1].innerText;
                document.getElementById("documentooculto").value = celdas[1].innerText;
                document.getElementById("Primer_Nombre").value = celdas[2].innerText;
                document.getElementById("Segundo_Nombre").value = celdas[3].innerText;
                document.getElementById("Primer_Apellido").value = celdas[4].innerText;
                document.getElementById("Segundo_Apellido").value = celdas[5].innerText;
                document.getElementById("Edad").value = celdas[6].innerText;
                document.getElementById("Fecha_Nacimiento").value = celdas[7].innerText;
                document.getElementById("Sexo").value = celdas[8].innerText;
                document.getElementById("Celular").value = celdas[11].innerText;
                document.getElementById("Mutualista").value = celdas[9].innerText;
                document.getElementById("Estado").value = celdas[10].innerText;
                document.getElementById("Email").value = celdas[12].innerText;



                const rol = celdas[13].innerText;

                modal.style.display = "block";
            });
        }
    });
});
