<?php
class __CatalogoPromoModel
{
    // datos en la bd
    private $__catalogoConnection;

    public function __construct()
    {
        //dbconnection 
        require_once('app/config/dbconnection.php');
        $this->__catalogoConnection = new __DataBaseConnection();
    }

    //metodo para obtener el catalogo de promociones
    public function getAll()
    {
        $sql = "CALL catalogoPromocionGETALL()";

        $connection = $this->__catalogoConnection->__GetConnection();

        $result = $connection->query($sql);

        $catalogoPromociones = array();

        while ($catalogoPromocion = $result->fetch_assoc()) {
            $catalogoPromociones[] = $catalogoPromocion;
        }

        $this->__catalogoConnection->__CloseConnection();

        return $catalogoPromociones;
    }

    //extrae un beneficio por su id
    public function getById($id)
    {
        $sql = "CALL catalogoPromocionGETBYID('{$id}')";

        $connection = $this->__catalogoConnection->__GetConnection();

        $reslt = $connection->query($sql);

        if ($reslt && $reslt->num_rows > 0) {
            $CatalogoPromociones = $reslt->fetch_assoc();
        } else {
            $CatalogoPromociones = false;
        }

        $this->__catalogoConnection->__CloseConnection();

        return $CatalogoPromociones;
    }

    //metodo para insertar al catalogo de promociones
    public function insert($CatalogoPromociones)
    {
        $sql = "CALL catalogoPromocionInsert('" . $CatalogoPromociones['IdPromocion'] . "','" . $CatalogoPromociones['IdProducto'] . "')";

        $connection = $this->__catalogoConnection->__GetConnection();

        $reslt = $connection->query($sql);

        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        
        $this->__catalogoConnection->__CloseConnection();
        
        return $res;
    }

    //metodo para editar catalogo de promociones
    public function update($CatalogoPromociones)
    {
        $sql = "UPDATE CatalogoPromociones SET IdPromocion='" . $CatalogoPromociones['IdPromocion'] . "', IdProducto='" . $CatalogoPromociones['IdProducto'] . "'
             WHERE IdPromoicion=" . $CatalogoPromociones['IdPromocion'];
        $connection = $this->__catalogoConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__catalogoConnection->__CloseConnection();
        return $res;
    }

    //metodo para eliminar un catalogo de promocion por ID
    public function delete($id, $codi)
    {
        $sql = "call catalogoPromocionDelete('{$id}','{$codi}')";
        $connection = $this->__catalogoConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        $this->__catalogoConnection->__CloseConnection();
        return $res;
    }



}
?>