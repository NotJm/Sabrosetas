function editar(id, name) {
    window.location.href = `?C=ProductsController&M=__callFormEdit&id=${id}&name=${name}`;
  }
  
  function eliminar(id, name) {
    Swal.fire({
      title: "Eliminar Producto",
      text: "¿Desea eliminar el producto?",
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
          title: "Producto Eliminado  ",
          icon: "success",
          color: "#ededed",
          timer: 1000,
          timerProgressBar: true,
          showConfirmButton: false,
        }).then((result) => {
          window.location.href = `?C=ProductsController&M=__delete&id=${id}&name=${name}`;
        });
      }
    });
  }
  