<?php
class __presentacionModel
{
    private $__presentacionConnection;

    public function __construct()
    {
        require_once("app/config/dbconnection.php");
        $this->__presentacionConnection = new __DataBaseConnection();
    }

    /**
     * Obtiene todos los datos de la tabla "presentacion".
     *
     * @return array|bool Array con los datos de todas las presentaciones o false si hay un error.
     */
    public function __getAll()
    {
        $__query = "CALL presentacionGETALL()";
        $__connection = $this->__presentacionConnection->__GetConnection();
        $__result = $__connection->query($__query);

        $__presentaciones = array();

        while ($__presentacion = $__result->fetch_assoc()) {
            $__presentaciones[] = $__presentacion;
        }

        $this->__presentacionConnection->__CloseConnection();

        return $__presentaciones;
    }

    /**
     * Obtiene los datos de una presentación específica.
     *
     * @param int $idPresentacion El ID de la presentación a obtener.
     * @return array|bool Array con los datos de la presentación o false si no se encuentra.
     */
    public function __getById($idPresentacion)
    {
        $__query = "call presentacionGETBYID('{$idPresentacion}')";

        $__connection = $this->__presentacionConnection->__GetConnection();

        $__result = $__connection->query($__query);

        if ($__result && $__result->num_rows > 0)
            $__presentacion = $__result->fetch_assoc();
        else
            $__presentacion = false;

        $this->__presentacionConnection->__CloseConnection();

        return $__presentacion;
    }

    /**
     * Actualiza los datos de una presentación en la tabla "presentacion".
     *
     * @param int $idPresentacion El ID de la presentación a actualizar.
     * @param string $descripcion La nueva descripción de la presentación.
     * @param int $cantidadPiezas La nueva cantidad de piezas de la presentación.
     * @return bool True si la actualización fue exitosa, false si hubo un error.
     */

    public function __insert($presentacion)
    {
        $__sql_presentacion = "CALL presentacionInsert('{$presentacion['presentacion']}','{$presentacion['descripcion']}','{$presentacion['cantidad']}')";

        // Conectamos a la base de datos
        $connection = $this->__presentacionConnection->__GetConnection();
        // Obtenemos la respuesta
        $reslt = $connection->query($__sql_presentacion);
        // Preparamos la respuesta
        if ($reslt)
            $res = true;
        else
            $res = false;
        // Cerramos la coneccion
        $this->__presentacionConnection->__CloseConnection();
        // Arrojamos resultados
        return $res;
    }

    public function __update($presentacion)
    {
        $__query = "CALL presentacionUpdate(
            '{$presentacion['presentacion']}',
            '{$presentacion['descripcion']}',
            '{$presentacion['cantidadpiezas']}'
            )";

        $__connection = $this->__presentacionConnection->__GetConnection();
        $__success = $__connection->query($__query);

        $this->__presentacionConnection->__CloseConnection();

        return $__success;
    }

    public function __delete($id)
    {
        $__sql = "Call presentacionDelete('$id')";

        $__connection = $this->__presentacionConnection->__GetConnection();

        $__result = $__connection->query($__sql);

        if ($__result)
            $__res = true;
        else
            $__res = false;

        $this->__presentacionConnection->__CloseConnection();

        return $__res;
    }


}