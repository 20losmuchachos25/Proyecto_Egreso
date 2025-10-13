function AbrirTelefonoModal(ID){
    const modal = document.getElementById("TelModal");
    modal.style.display = "block";
}
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("TelModal");
    const closeBtn = document.querySelector(".close3");

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

});