<div>
    <h2>RESTRICCIONES</h2>

    <p>
      <a href="">Restricciones</a>
    </p>
    <!--tabla de Condiciones-->
    <table border=1>
      <thead>
        <td>IdRestriccion</td>
        <td>TipoRestriccion</td>
        <td>ValorRestriccion</td>
        
      </thead>
      <tbody>
        <?php
        foreach($datos as $dato){
          echo "<tr>";
          echo "<td>" . $dato['IdRestriccion'] . "</td>";
          echo "<td>" . $dato['TipoRestriccion'] . "</td>";
          echo "<td>" . $dato['ValorRestriccion'] . "</td>";
          echo "<td> <a href=''>Eliminar</a> <br /> <a href=''>Editar</a> </td>";
          echo "</tr>";
        }
        ?>
        
      </tbody>
    </table>
  </div>