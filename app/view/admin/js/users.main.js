// const { default: Swal } = require("sweetalert2");

function editar(id) {
  window.location.href = `?C=UserController&M=__callFormEdit&id=${id}`;
}

function editarDireccion(idUsername) {
  window.location.href = `?C=DireccionController&M=__callFormEdit&id=${idUsername}`;
}

function eliminar(id) {
  Swal.fire({
    title: "Eliminar Usuario",
    text: "¿Desea eliminar el usuario?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Si, borralo",
    cancelButtonText: "No, Cancelalo",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        allowOutsideClick: false,
        allowEscapeKey: false,
        position: "bottom-end",
        title: "Usuario Eliminado",
        icon: "success",
        color: "#ededed",
        timer: 1000,
        timerProgressBar: true,
        showConfirmButton: false,
      }).then((result) => {
        window.location.href = `?C=UserController&M=__delete&id=${id}`;
      });
    }
  });
}
