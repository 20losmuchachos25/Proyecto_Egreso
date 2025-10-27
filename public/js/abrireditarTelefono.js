function EditarTelefono(tel, id){
    const modal = document.getElementById("TelEditarModal");
    modal.style.display = "block";

        document.getElementById("IDOculto2").value = id;
        document.getElementById("TelOculto").value = tel;

        document.getElementById("TelefonoEdit").value = tel;


}
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("TelEditarModal");
    const closeBtn = document.querySelector(".close4");

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

});
function CancelarEditar(){
    const modal = document.getElementById("TelEditarModal");
    modal.style.display = "none";

        document.getElementById("IDOculto2").value = "";
        document.getElementById("TelOculto").value = "";

        document.getElementById("TelefonoEdit").value = "";


}
