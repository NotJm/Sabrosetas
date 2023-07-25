<?php
class __promocionModel
{
    private $__promocionConnection;

    public function __construct()
    {
        //acceso a la base de datos
        require_once('app/config/dbconnection.php');
        $this->__promocionConnection = new __DataBaseConnection();
    }

    //metodo para obtener todas las promociones
    public function getAll()
    {
        $sql = "CALL promocionesGETALL()";

        $connection = $this->__promocionConnection->__GetConnection();

        $result = $connection->query($sql);

        $promociones = array();

        while ($promocion = $result->fetch_assoc()) {
            $promociones[] = $promocion;
        }

        $this->__promocionConnection->__CloseConnection();

        return $promociones;
    }

    //extraer una promociones por su id
    public function getById($id)
    {
        $sql = "SELECT * FROM Promociones WHERE IdPromocion='" . $id . "'";
        $connection = $this->__promocionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt && $reslt->num_rows > 0) {
            $promociones = $reslt->fetch_assoc();
        } else {
            $promociones = false;
        }
        $this->__promocionConnection->__CloseConnection();
        return $promociones;
    }

    //metodo para insertar promocion
    public function insert($promociones)
    {
        $sql = "INSERT INTO promocion(IdPromocion, NombrePromocion, Descripcion, FechaInicio, FechaFinalizacion, 
            Codigo, IdBeneficio, IdCondicicion,IdRestriccion, Estado) 
            VALUES('" . $promociones['IdPromocion'] . "','" . $promociones['NombrePromocion'] . "','" . $promociones['Descripcion'] . "',
            '" . $promociones['FechaInicio'] . "','" . $promociones['FechaFinalizacion'] . "','" . $promociones['Codigo'] . "',
            '" . $promociones['IdBeneficio'] . "','" . $promociones['IdCondicion'] . "','" . $promociones['IdRestriccion'] . "',
            '" . $promociones['Estado'] . "')";
        $connection = $this->__promocionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__promocionConnection->__CloseConnection();
        return $res;
    }

    //metodo para editar promocion
    public function update($promociones)
    {
        $sql = "UPDATE promociones SET IdPromocion='" . $promociones['IdPromocion'] . "', NombrePromocion='" . $promociones['NombrePromocion'] . "', 
            Descripcion='" . $promociones['Descripcion'] . "', FechaInicio='" . $promociones['FechaInicio'] . "', FechaFinalizacion='" . $promociones['FechaFinalizacion'] . "', 
            Codigo='" . $promociones['Codigo'] . "', IdBeneficio='" . $promociones['IdBeneficio'] . "', IdCondicion='" . $promociones['IdCondicion'] . "'
            , IdRestriccion='" . $promociones['IdRestriccion'] . "', Estado='" . $promociones['Estado'] . "' WHERE IdPromocion=" . $promociones['IdPromocion'];
        $connection = $this->__promocionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__promocionConnection->__CloseConnection();
        return $res;
    }

    //metodo para eliminar una promocion por su id
    public function delete($id)
    {
        $sql = "DELETE FROM Promociones WHERE IdPromocion=$id";
        $connection = $this->__promocionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__promocionConnection->__CloseConnection();
        return $res;
    }

}
?>