function eliminar(id)
{
    Swal.fire({
        title: "Eliminar Venta",
        text: `¿Desea eliminar la venta #${id}?`,
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
            title: "Venta Eliminada",
            icon: "success",
            color: "#ededed",
            timer: 1000,
            timerProgressBar: true,
            showConfirmButton: false,
          }).then((result) => {
            window.location.href = `?C=VentaController&M=delete&id=${id}`;
          });
        }
      });
    
}