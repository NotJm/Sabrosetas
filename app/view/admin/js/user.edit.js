// const { default: Swal } = require("sweetalert2");

let formSendData = document.getElementById("formSendData");

formSendData.addEventListener("submit", function(e){
    let fieldAvatar = document.getElementById("avatar").value;
    if(fieldAvatar == ""){
        Swal.fire("Imagen no seleccionada", "No ha seleccionado imagen", "error");
        e.preventDefault();
    }
})