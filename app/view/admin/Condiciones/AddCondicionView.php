<div>
  <h2>Agregar Nueva Condición</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pro/?C=UserController&M=Add"
  method="post"
  enctype="multipart/form-data">

    <p>
      <label for="idcondicion">Id Condicion : </label><br />
      <input
        type="text"
        name="idcondicion"
        id="idcondicion"
        placeholder="Id Condicion"
      />
    </p>
    <p>
      <label for="tipocondicion">Tipo Condicion : </label><br />
      <input type="text" name="tipocondicion" id="tipocondicion" placeholder="Tipo Condicion" />
    </p>
    <p>
      <label for="valorcondicion">Valor Condicion : </label><br />
      <input
        type="text"
        name="valorcondicion"
        id="valorcondicion"
        placeholder="Valor Condicion"
      />
    </p>
    <p><input type="submit" value="Add Condicion"></p>
  </form>
</div>