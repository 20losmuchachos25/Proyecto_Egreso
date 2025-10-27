function AbrirGestor(){
    const modal = document.getElementById("RegistroModal");

    modal.style.display = "block";
}
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("RegistroModal");
    const closeBtn = document.querySelector(".close");

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

});
