<div>
  <h2>Agregar Nuevo Beneficio</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pro/?C=UserController&M=Add"
  method="post"
  enctype="multipart/form-data">

    <p>
      <label for="idbeneficio">Id Beneficio : </label><br />
      <input
        type="text"
        name="idbeneficio"
        id="idbeneficio"
        placeholder="Id Beneficio"
      />
    </p>
    <p>
      <label for="tipobeneficio">Tipo Beneficio : </label><br />
      <input type="text" name="tipobeneficio" id="tipobeneficio" placeholder="Tipo Beneficio" />
    </p>
    <p>
      <label for="valorbeneficio">Valor Beneficio : </label><br />
      <input
        type="text"
        name="valorbeneficio"
        id="valorbeneficio"
        placeholder="Valor Beneficio"
      />
    </p>
    <p><input type="submit" value="Add Beneficio"></p>
  </form>
</div>
