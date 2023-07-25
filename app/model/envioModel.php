<?php

class __envios
{
    private $__envioConnection;

    public function __construct()
    {
        require_once("../config/dbconnection.php");
        $this->__envioConnection = new __DataBaseConnection();
    }

    // Método para obtener todos los envíos
    public function __getAll()
    {
        // Consulta SQL para obtener todos los envíos
        $__query = "SELECT * FROM envios";

        // Obtener la conexión a la base de datos
        $__connection = $this->__envioConnection->__GetConnection();

        // Ejecutar la consulta
        $__result = $__connection->query($__query);

        // Verificar si se obtuvieron resultados
        $__envios = array();
        while ($__envio = $__result->fetch_assoc()) {
            $__envios[] = $__envio;
        }

        // Cerrar la conexión a la base de datos
        $this->__envioConnection->__CloseConnection();

        // Retornar los envíos obtenidos
        return $__envios;
    }

    // Método para obtener un envío específico por su ID
    public function __getById($idEnvio)
    {
        // Consulta SQL para obtener un envío por su ID
        $__query = "SELECT * FROM envios WHERE IdEnvio = $idEnvio";

        // Obtener la conexión a la base de datos
        $__connection = $this->__envioConnection->__GetConnection();

        // Ejecutar la consulta
        $__result = $__connection->query($__query);

        // Verificar si se obtuvo un resultado
        if ($__result && $__result->num_rows > 0) {
            $__envio = $__result->fetch_assoc();
        } else {
            $__envio = false;
        }

        // Cerrar la conexión a la base de datos
        $this->__envioConnection->__CloseConnection();

        // Retornar el envío obtenido
        return $__envio;
    }

    // Método para insertar datos de un nuevo envío
    public function __insertData($idEnvio, $folio, $fechaSalida, $fechaEntrega, $horaSalida, $horaEntrega, $infoSeguimiento, $estadoEnvio)
    {
        // Consulta SQL para insertar datos de un nuevo envío
        $__query = "INSERT INTO envios(IdEnvio, Folio, FechaSalida, FechaEntrega, HoraSalida, HoraEntrega, InfoSeguimiento, EstadoEnvio) VALUES ('$idEnvio', '$folio', '$fechaSalida', '$fechaEntrega', '$horaSalida', '$horaEntrega', '$infoSeguimiento', '$estadoEnvio')";

        // Obtener la conexión a la base de datos
        $__connection = $this->__envioConnection->__GetConnection();

        // Ejecutar la consulta
        $__connection->query($__query);

        // Cerrar la conexión a la base de datos
        $this->__envioConnection->__CloseConnection();
    }

    // Método para actualizar datos de un envío
    public function __updateData($idEnvio, $nuevoFolio, $nuevaFechaSalida, $nuevaFechaEntrega, $nuevaHoraSalida, $nuevaHoraEntrega, $nuevaInfoSeguimiento, $nuevoEstadoEnvio)
    {
        // Consulta SQL para actualizar datos de un envío
        $__query = "UPDATE envios SET Folio = '$nuevoFolio', FechaSalida = '$nuevaFechaSalida', FechaEntrega = '$nuevaFechaEntrega', HoraSalida = '$nuevaHoraSalida', HoraEntrega = '$nuevaHoraEntrega', InfoSeguimiento = '$nuevaInfoSeguimiento', EstadoEnvio = '$nuevoEstadoEnvio' WHERE IdEnvio = $idEnvio";

        // Obtener la conexión a la base de datos
        $__connection = $this->__envioConnection->__GetConnection();

        // Ejecutar la consulta
        $__connection->query($__query);

        // Cerrar la conexión a la base de datos
        $this->__envioConnection->__CloseConnection();
    }

    // Método para eliminar un envío
    public function __deleteData($idEnvio)
    {
        // Consulta SQL para eliminar un envío
        $__query = "DELETE FROM envios WHERE IdEnvio = $idEnvio";

        // Obtener la conexión a la base de datos
        $__connection = $this->__envioConnection->__GetConnection();

        // Ejecutar la consulta
        $__connection->query($__query);

        // Cerrar la conexión a la base de datos
        $this->__envioConnection->__CloseConnection();
    }
}
