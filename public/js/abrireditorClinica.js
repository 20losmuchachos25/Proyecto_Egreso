document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("EditorModal");
    const closeBtn = document.querySelector(".close2");


    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";

    });
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";

        }
    });
    const filas = document.querySelectorAll("#clinicas tbody tr");
    filas.forEach(fila => {
        const celdas = fila.querySelectorAll("td");
        if (celdas.length >= 5 && !fila.textContent.includes("No se encontraron")) {
            fila.addEventListener("click", () => {
                // Rellenar los campos del modal
                document.getElementById("ID").value = celdas[0].innerText;
                document.getElementById("Calle2").value = celdas[1].innerText;
                document.getElementById("Numero2").value = celdas[2].innerText;
                document.getElementById("Esquina2").value = celdas[3].innerText;
                document.getElementById("Referencia2").value = celdas[4].innerText;



                modal.style.display = "block";
            });
        }
    });
});