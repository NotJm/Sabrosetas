<div>
  <h2>Actualizacion de datos de Restricción</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form action="http://localhost/pro/?C=UserController&M=Edit" method="post">
    <p>
      <label for="idrestriccion">Id Restriccion : </label><br />
      <input
        type="text"
        name="idrestriccion"
        id="idrestriccion"
        placeholder="Id Restriccion"
        value="<?= $datos['IdRestriccion'] ?>"
      />
    </p>
    <p>
      <label for="tiporestriccion">Tipo Restriccion : </label><br />
      <input type="text" 
      name="tiporestriccion" 
      id="tiporestriccion" 
      placeholder="Tipo Restriccion" />
      value="<?= $datos['TipoRestriccion'] ?>"
    </p>
    <p>
      <label for="valorrestriccion">Valor Restriccion : </label><br />
      <input
        type="text"
        name="valorrestriccion"
        id="valorrestriccion"
        placeholder="Valor Restriccion"
        value="<?= $datos['ValorRestriccion'] ?>"
      />
    </p>
    <p><input type="submit" value="Edit" /></p>
  </form>
</div>