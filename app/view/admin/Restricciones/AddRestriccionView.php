<div>
  <h2>Agregar Nueva Restricción</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pro/?C=UserController&M=Add"
  method="post"
  enctype="multipart/form-data">

    <p>
      <label for="idrestriccion">Id Restriccion : </label><br />
      <input
        type="text"
        name="idrestriccion"
        id="idrestriccion"
        placeholder="Id Restriccion"
      />
    </p>
    <p>
      <label for="tiporestriccion">Tipo Restriccion : </label><br />
      <input type="text" name="tiporestriccion" id="tiporestriccion" placeholder="Tipo Restriccion" />
    </p>
    <p>
      <label for="valorrestriccion">Valor Restriccion : </label><br />
      <input
        type="text"
        name="valorrestriccion"
        id="valorrestriccion"
        placeholder="Valor Restriccion"
      />
    </p>
    <p><input type="submit" value="Add Restriccion"></p>
  </form>
</div>