<div>
    <h2>BENEFICIOS</h2>

    <p>
      <a href="">Beneficios</a>
    </p>
    <!--tabla de Beneficios-->
    <table border=1>
      <thead>
        <td>IdBeneficio</td>
        <td>TipoBeneficio</td>
        <td>ValorBeneficio</td>
        
      </thead>
      <tbody>
        <?php
        foreach($datos as $dato){
          echo "<tr>";
          echo "<td>" . $dato['IdBeneficio'] . "</td>";
          echo "<td>" . $dato['TipoBeneficio'] . "</td>";
          echo "<td>" . $dato['ValorBeneficio'] . "</td>";
          echo "<td> <a href=''>Eliminar</a> <br /> <a href=''>Editar</a> </td>";
          echo "</tr>";
        }
        ?>
        
      </tbody>
    </table>
  </div>