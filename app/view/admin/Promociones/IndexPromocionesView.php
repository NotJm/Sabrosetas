<div>
    <h2>PROMOCIONES</h2>
    <h3>Grandes Ofertas...!!</h3>
    <p>
      <a href="">Promociones</a>
    </p>
    <!--tabla de promociones-->
    <table border=1>
      <thead>
        <td>IdPromocion</td>
        <td>NombrePromocion</td>
        <td>Descripcion</td>
        <td>FechaInicio</td>
        <td>FechaFinalizacion</td>
        <td>Codigo</td>
        <td>IdBeneficio</td>
        <td>IdCondicion</td>
        <td>IdRestriccion</td>
        <td>Estado</td>
      </thead>
      <tbody>
        <?php
        foreach($datos as $dato){
          echo "<tr>";
          echo "<td>" . $dato['IdPromocion'] . "</td>";
          echo "<td>" . $dato['NombrePromocion'] . "</td>";
          echo "<td>" . $dato['Descripcion'] . "</td>";
          echo "<td>" . $dato['FechaInicio'] . "</td>";
          echo "<td>" . $dato['FechaFinalizacion'] . "</td>";
          echo "<td>" . $dato['Codigo'] . "</td>";
          echo "<td>" . $dato['IdBeneficio'] . "</td>";
          echo "<td>" . $dato['IdCondicion'] . "</td>";
          echo "<td>" . $dato['IdRestriccion'] . "</td>";
          echo "<td>" . $dato['Estado'] . "</td>";
          echo "<td> <a href=''>Eliminar</a> <br /> <a href=''>Editar</a> </td>";
          echo "</tr>";
        }
        ?>
        
      </tbody>
    </table>
  </div>