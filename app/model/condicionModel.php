<?php
class __condicionModel
{
    // datos en la bd
    private $__condicionConnection;

    public function _construct()
    {
        //dbconnection 
        require_once('app/config/dbconnection.php');
        $this->__condicionConnection = new __DataBaseConnection();
    }

    //metodo para obtener todas las condiciones
    public function getAll()
    {
        $sql = "SELECT * FROM Condiciones";
        $connection = $this->__condicionConnection->__GetConnection();
        $result = $connection->query($sql);
        $condiciones = array();
        while ($condicion = $result->fetch_assoc()) {
            $condiciones[] = $condicion;
        }
        $this->__condicionConnection->__CloseConnection();
        return $condiciones;
    }

    //extrae una condicion por su id
    public function getById($id)
    {
        $sql = "SELECT * FROM Condiciones WHERE IdCondicion='" . $id . "'";
        $connection = $this->__condicionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt && $reslt->num_rows > 0) {
            $Condiciones = $reslt->fetch_assoc();
        } else {
            $Condicion = false;
        }
        $this->__condicionConnection->__CloseConnection();
        return $Condiciones;
    }

    //metodo para insertar Condicion
    public function insert($Condiciones)
    {
        $sql = "INSERT INTO Condiciones(IdCondicion, TipoCondicion, ValorCondicion) 
            VALUES('" . $Condiciones['IdCondicion'] . "','" . $Condiciones['IdPromocion'] . "','" . $Condiciones['TipoCondicion'] . "',
            '" . $Condiciones['ValorCondicion'] . "')";
        $connection = $this->__condicionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__condicionConnection->__CloseConnection();
        return $res;
    }

    //metodo para editar Condicion
    public function update($Condiciones)
    {
        $sql = "UPDATE Condiciones SET IdCondicion='" . $Condiciones['IdCondicion'] . "', TipoCondicion='" . $Condiciones['TipoCondicion'] . "', 
            ValorCondicion='" . $Condiciones['ValorCondicion'] . "' WHERE IdCondicion=" . $Condiciones['IdCondicion'];
        $connection = $this->__condicionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__condicionConnection->__CloseConnection();
        return $res;
    }

    //metodo para eliminar una condicion por su ID
    public function delete($id)
    {
        $sql = "DELETE FROM Condiciones WHERE IdCondicion=$id";
        $connection = $this->__condicionConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__condicionConnection->__CloseConnection();
        return $res;
    }



}
?>