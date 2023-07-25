<div>
  <h2>Agregar Nueva Restricción</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pro/?C=UserController&M=Add"
  method="post"
  enctype="multipart/form-data">

    <p>
      <label for="idpromocion">Id Promocion : </label><br />
      <input
        type="text"
        name="idpromocion"
        id="idpromocion"
        placeholder="Id Promocion"
      />
    </p>
    <p>
      <label for="nombrepromocion">Nombre Promocion : </label><br />
      <input
        type="text"
        name="nombrepromocion"
        id="nombrepromocion"
        placeholder="Nombre Promocion"
      />
    </p>
    <p>
      <label for="descripcion">Descripcion : </label><br />
      <input
        type="text"
        name="descripcion"
        id="descripcion"
        placeholder="Descripcion"
      />
    </p>
    <p>
      <label for="fechainicio">Fecha Inicio : </label><br />
      <input
        type="text"
        name="fechainicio"
        id="fechainicio"
        placeholder="Fecha Inicio"
      />
    </p>
    <p>
        <label for="fechafinalizacion">Fecha Finalizacion : </label><br />
        <input 
        type="text" 
        name="FechaFinalizacion" 
        id="FechaFinalizacion" 
        placeholder="Fecha Finalizacion"/>
    </p>
    <p>
      <label for="codigo">Codigo : </label><br />
      <input
        type="text"
        name="codigo"
        id="codigo"
        placeholder="Codigo"
      />
    </p>
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
      <label for="idcondicion">Id Condicion : </label><br />
      <input
        type="text"
        name="idcondicion"
        id="idcondicion"
        placeholder="Id Condicion"
      />
    </p>  
    <label for="idrestriccion">Id Restriccion : </label><br />
      <input
        type="text"
        name="idrestriccion"
        id="idrestriccion"
        placeholder="Id Restriccion"
      />
    </p>  
    <label for="estado">Estado : </label><br />
      <input
        type="text"
        name="estado"
        id="estado"
        placeholder="Estado"
      />
    <p><input type="submit" value="Add Promocion"></p>
  </form>
</div>