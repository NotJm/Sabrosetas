function editar(id) {
    window.location.href = `?C=CatalogoPromoController&M=CallFormEdit&id=${id}`;
  }
  
  function eliminar(id, codi) {
    Swal.fire({
      title: "Eliminar Asignacion de Promocion a Producto",
      text: "¿Desea eliminar Asignacion?",
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
          title: "Asignacion Eliminada",
          icon: "success",
          timer: 1000,
          timerProgressBar: true,
          showConfirmButton: false,
        }).then((result) => {
          window.location.href = `?C=CatalogoPromoController&M=__delete&id=${id}&codi=${codi}`;
        });
      }
    });
  }
  