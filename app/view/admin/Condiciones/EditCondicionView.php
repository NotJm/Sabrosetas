<div>
  <h2>Actualizacion de datos de Condición</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form action="http://localhost/pro/?C=UserController&M=Edit" method="post">
    <p>
      <label for="idcondicion">Id Condicion : </label><br />
      <input
        type="text"
        name="idcondicion"
        id="idcondicion"
        placeholder="Id Condicion"
        value="<?= $datos['IdCondicion'] ?>"
      />
    </p>
    <p>
      <label for="tipocondicion">Tipo Condicion : </label><br />
      <input type="text" 
      name="tipocondicion" 
      id="tipocondicion" 
      placeholder="Tipo Condicion" />
      value="<?= $datos['TipoCondicion'] ?>"
    </p>
    <p>
      <label for="valorcondicion">Valor Condicion : </label><br />
      <input
        type="text"
        name="valorcondicion"
        id="valorcondicion"
        placeholder="Valor Condicion"
        value="<?= $datos['ValorCondicion'] ?>"
      />
    </p>
    <p><input type="submit" value="Edit" /></p>
  </form>
</div>