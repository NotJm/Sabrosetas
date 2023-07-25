<?php
class __direccionModel
{
    private $__direccionConnection;

    public function __construct()
    {
        require_once("app/config/dbconnection.php");
        $this->__direccionConnection = new __DataBaseConnection();
    }

    public function __getAll()
    {
        $__query = "call direccionGETALL()";

        $__connection = $this->__direccionConnection->__GetConnection();

        $__result = $__connection->query($__query);

        $direcciones = array();

        while ($direccion = $__result->fetch_assoc())
            $direcciones[] = $direccion;

        $this->__direccionConnection->__CloseConnection();

        return $direcciones;
    }

    // ! Metodo para obtener la direccion de un usuario especifico
    public function __getById($username)
    {
        $__query = "call direccionById('$username')";

        $__connection = $this->__direccionConnection->__GetConnection();

        $__result = $__connection->query($__query);

        if ($__result && $__result->num_rows > 0)
            $direccion = $__result->fetch_assoc();
        else
            $direccion = false;

        $this->__direccionConnection->__CloseConnection();

        return $direccion;

    }

    // ! Acciones de la base de datos
    public function __update($direccion)
    {
        $__sql = "call direccionUpdate
        (
            '" . $direccion["username"] . "',
            '" . $direccion['colonia'] . "',
            '" . $direccion['municipio'] . "',
            '" . $direccion['localidad'] . "',
            '" . $direccion['calle'] . "',
            '" . $direccion['ncasa'] . "',
            '" . $direccion['codigop'] . "'
        )";

        $__connection = $this->__direccionConnection->__GetConnection();

        $__result = $__connection->query($__sql);

        if ($__result)
            $__res = true;
        else
            $__res = false;

        $this->__direccionConnection->__CloseConnection();

        return $__res;
    }

    public function __delete($id)
    {
        $__sql = "call direccionDelete('$id')";

        $__connection = $this->__direccionConnection->__GetConnection();

        $__result = $__connection->query($__sql);

        if ($__result)
            $__res = true;
        else
            $__res = false;

        $this->__direccionConnection->__CloseConnection();

        return $__res;
    }
}

?>