function habilitarInput(id) {
    if(id == document.getElementById("Tipo_Documento") || id == document.getElementById("Estado")){
        id.removeAttribute("disabled");
    }
    else{
        id.removeAttribute("readonly");
    }
}