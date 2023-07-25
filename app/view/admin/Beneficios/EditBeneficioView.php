<div>
  <h2>Actualizacion de datos de Beneficios</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form action="http://localhost/pro/?C=UserController&M=Edit" method="post">
    <p>
      <label for="idbeneficio">Id Beneficion : </label><br />
      <input
        type="text"
        name="idbeneficio"
        id="idbeneficio"
        placeholder="Id Beneficio"
        value="<?= $datos['IdBeneficio'] ?>"
      />
    </p>
    <p>
      <label for="tipobeneficio">Tipo Beneficio : </label><br />
      <input type="text" 
      name="tipobeneficio" 
      id="tipobeneficio" 
      placeholder="Tipo Beneficio" />
      value="<?= $datos['TipoBeneficio'] ?>"
    </p>
    <p>
      <label for="valorbeneficio">Valor Beneficio : </label><br />
      <input
        type="text"
        name="valorbeneficio"
        id="valorbeneficio"
        placeholder="Valor Beneficio"
        value="<?= $datos['ValorBeneficio'] ?>"
      />
    </p>
    <p><input type="submit" value="Edit" /></p>
  </form>
</div>
