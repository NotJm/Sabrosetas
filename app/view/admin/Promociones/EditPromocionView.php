<div>
  <h2>Actualizacion de datos de promociones</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form action="http://localhost/pro/?C=UserController&M=Edit" method="post">
    <p>
      <label for="idpromocion">Id Promocion : </label><br />
      <input
        type="text"
        name="idpromocion"
        id="idpromocion"
        placeholder="Id Promocion"
        value="<?= $datos['IdPromocion'] ?>"
      />
    </p>
    <p>
      <label for="nombrepromocion">Nombre Promocion: </label><br />
      <input type="text" 
      name="nombrpromocion" 
      id="nombrepromocion" 
      placeholder="Nombre Promocion" />
      value="<?= $datos['NombrePromocion'] ?>"
    </p>
    <p>
      <label for="descripcion">Descripcion : </label><br />
      <input
        type="text"
        name="descripcion"
        id="descripcion"
        placeholder="Descripcion"
        value="<?= $datos['Descripcion'] ?>"
      />
    </p>
    <p>
      <label for="fechainicio">Fecha Inicio : </label><br />
      <input
        type="text"
        name="fechainicio"
        id="fechainicio"
        placeholder="Fecha Inicio"
        value="<?= $datos['FechaInicio'] ?>"
      />
    </p>
    <p>
        <label for="fechafinalizacion">Fecha Finalizacion : </label><br>
        <input 
        type="text" 
        name="fechafinalizacion" 
        id="fechafinalizacion" 
        placeholder="Fecha Finalizacion"/>
        value="<?= $datos['Fecha Finalizacion'] ?>"

    </p>
    <p>
      <label for="codigo">Codigo : </label><br />
      <input
        type="text"
        name="codigo"
        id="codigo"
        placeholder="Codigo"
        value="<?= $datos['Codigo'] ?>"
      />
    </p>
    <p>
        <label for="idbeneficio">Id Beneficio : </label><br />
        <input 
        type="text" 
        name="idbeneficio" 
        id="idbeneficio" 
        placeholder="Id Beneficio"/>
        value="<?= $datos['IdBeneficio'] ?>"
    </p>
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
      <label for="estado">Estado : </label><br />
      <input
        type="text"
        name="estado"
        id="estado"
        placeholder="Estado"
        value="<?= $datos['Estado'] ?>"
      />
    </p>  
    <p><input type="submit" value="Edit" /></p>
  </form>
</div>
