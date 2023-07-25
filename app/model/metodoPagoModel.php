<?php

class __metodoPagoModel
{
    private $__metodoPagoConnection;

    public function __construct()
    {
        require_once("../config/dbconnection.php");
        $this->__metodoPagoConnection = new __DataBaseConnection();
    }

    // Método para obtener todos los métodos de pago
    public function __getAll()
    {
        // Consulta SQL para obtener todos los métodos de pago
        $__query = "SELECT * FROM metodo_pago";

        // Obtenemos la conexión a la base de datos
        $__connection = $this->__metodoPagoConnection->__GetConnection();

        // Ejecutamos la consulta
        $__result = $__connection->query($__query);

        // Verificamos si se obtuvieron resultados
        $__metodosPago = array();
        while ($__metodoPago = $__result->fetch_assoc()) {
            $__metodosPago[] = $__metodoPago;
        }

        // Cerramos la conexión a la base de datos
        $this->__metodoPagoConnection->__CloseConnection();

        // Retornamos los métodos de pago obtenidos
        return $__metodosPago;
    }

    // Método para obtener un método de pago específico por su ID
    public function __getById($idMetodoPago)
    {
        // Consulta SQL para obtener el método de pago por su ID
        $__query = "SELECT * FROM metodo_pago WHERE idMetodoPago = $idMetodoPago";

        // Obtenemos la conexión a la base de datos
        $__connection = $this->__metodoPagoConnection->__GetConnection();

        // Ejecutamos la consulta
        $__result = $__connection->query($__query);

        // Verificamos si se obtuvo un resultado
        if ($__result && $__result->num_rows > 0) {
            $__metodoPago = $__result->fetch_assoc();
        } else {
            $__metodoPago = false;
        }

        // Cerramos la conexión a la base de datos
        $this->__metodoPagoConnection->__CloseConnection();

        // Retornamos el método de pago obtenido
        return $__metodoPago;
    }

    // Método para insertar datos de un nuevo método de pago
    public function __insertData($idMetodoPago, $nombre, $descripcion)
    {
        // Consulta SQL para insertar datos de un nuevo método de pago
        $__query = "INSERT INTO metodo_pago (idMetodoPago, Nombre, Descripcion) VALUES ('$idMetodoPago', '$nombre', '$descripcion')";

        // Obtenemos la conexión a la base de datos
        $__connection = $this->__metodoPagoConnection->__GetConnection();

        // Ejecutamos la consulta
        $__connection->query($__query);

        // Cerramos la conexión a la base de datos
        $this->__metodoPagoConnection->__CloseConnection();
    }

    // Método para actualizar datos de un método de pago
    public function __updateData($idMetodoPago, $nuevoNombre, $nuevaDescripcion)
    {
        // Consulta SQL para actualizar datos de un método de pago
        $__query = "UPDATE metodo_pago SET Nombre = '$nuevoNombre', Descripcion = '$nuevaDescripcion' WHERE idMetodoPago = $idMetodoPago";

        // Obtenemos la conexión a la base de datos
        $__connection = $this->__metodoPagoConnection->__GetConnection();

        // Ejecutamos la consulta
        $__connection->query($__query);

        // Cerramos la conexión a la base de datos
        $this->__metodoPagoConnection->__CloseConnection();
    }

    // Método para eliminar un método de pago por su ID
    public function __deleteData($idMetodoPago)
    {
        // Consulta SQL para eliminar un método de pago por su ID
        $__query = "DELETE FROM metodo_pago WHERE idMetodoPago = $idMetodoPago";

        // Obtenemos la conexión a la base de datos
        $__connection = $this->__metodoPagoConnection->__GetConnection();

        // Ejecutamos la consulta
        $__connection->query($__query);

        // Cerramos la conexión a la base de datos
        $this->__metodoPagoConnection->__CloseConnection();
    }
}
