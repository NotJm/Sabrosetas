<div>
    <h2>CONDICIONES</h2>

    <p>
      <a href="">Condiciones</a>
    </p>
    <!--tabla de Condiciones-->
    <table border=1>
      <thead>
        <td>IdCondicion</td>
        <td>TipoCondicion</td>
        <td>ValorCondicion</td>
        
      </thead>
      <tbody>
        <?php
        foreach($datos as $dato){
          echo "<tr>";
          echo "<td>" . $dato['IdCondicion'] . "</td>";
          echo "<td>" . $dato['TipoCondicion'] . "</td>";
          echo "<td>" . $dato['ValorCondicion'] . "</td>";
          echo "<td> <a href=''>Eliminar</a> <br /> <a href=''>Editar</a> </td>";
          echo "</tr>";
        }
        ?>
        
      </tbody>
    </table>
  </div>