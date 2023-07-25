<?php
class __DataBaseConnection
{
    // Creacion de un atributo para el manejo de la base de datos
    private $__connection;

    // Definicion del constructor de la clase
    public function __construct()
    {
        // Requerir los datos o credenciales de conexion a la base de datos
        require_once("app/config/config.php");

        // Creacion la instancia de la conexion a base de datos
        $this->__connection = new mysqli(
            DATABASE_HOST,
            DATABASE_USER,
            DATABASE_PASSWORD,
            DATABASE_NAME
        );

        // Manejo de errores
        if($this->__connection->connect_error)
        {
            
            die(
                'Error: Al conectar con la base de datos causa:' +
                $this->__connection->connect_error
            );
            
        }
    }

    // Creamos un metodo para obtener la conexion
    public function __GetConnection() { return $this->__connection; }

    // Creamos metodo para cerrar la conexion con las base de datos
    public function __CloseConnection() { $this->__connection->close(); }

}
?>