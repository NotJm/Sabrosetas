<div>
  <h2>Agregar al catalogo de Promociones</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="?C=UserController&M=Add"
  method="post"
  enctype="multipart/form-data">

    <p>
      <label for="idpromocion">Id Promocion : </label><br />
      <input
        type="text"
        name="idpromocion"
        id="idpromocion"
        placeholder="Id Promoción"
      />
    </p>
    <p>
      <label for="idproducto">Id Producto : </label><br />
      <input
        type="text"
        name="idproducto"
        id="idproducto"
        placeholder="Id Producto"
      />
    </p>
    <p><input type="submit" value="Add CatalogoPromociones"></p>
  </form>
</div>
