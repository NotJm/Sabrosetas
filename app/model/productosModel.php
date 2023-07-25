<?php
class __productsModel
{
    // Declaracion de la variable para la conexion
    private $__productsConnection;

    // Constructor para inicializar la variable de conexion
    public function __construct()
    {
        // Importacion del archivo conexion de php
        require_once("app/config/dbconnection.php");

        // Inicializacion de la variable de conexion
        $this->__productsConnection = new __DataBaseConnection();

    }

    // Metodos para la insercion, eliminacion y actualizacion de datos, asi como metodos para obtener datos

    // Obtener todos los datos
    public function __getAll()
    {
        // Creamos el codigo de la consulta
        $__query = "call productoGETALL()";

        // Obtenenmos la conexion de la clase padre
        $__connection = $this->__productsConnection->__GetConnection();

        // Ejecutamos la consulta donde obtendremos los resultados
        $__result = $__connection->query($__query);

        // Instanciamos una variable de tipo array
        $__productos = array();

        // Obtenemos resultados para guardarlos en la variable
        while ($__producto = $__result->fetch_assoc())
            $__productos[] = $__producto;

        // Cerramos la conexion
        $this->__productsConnection->__CloseConnection();

        return $__productos;

    }

    public function __getById($id, $name)
    {
        // Creamos el codigo de la consulta
        $__query = "call productoGETBYID('$id', '$name')";

        // Obtenemos la conexion de la clase padre
        $__connection = $this->__productsConnection->__GetConnection();

        // Ejecutamos la consulta
        $__result = $__connection->query($__query);

        // Verficamos los resultados
        if ($__result && $__result->num_rows > 0)
            $__producto = $__result->fetch_assoc();
        else
            $__producto = false;

        // Cerramos la conexion
        $this->__productsConnection->__CloseConnection();

        // Retornamos el resultado
        return $__producto;
    }

    // ! ACCIONES DE LA BASE DE DATOS

    public function __insertData($presentacion, $product)
    {
        $lastId = $this->__getLastidPresentacion();

        if ($lastId != 0) {
            $id = $lastId + 1;
        } else {
            $id = 0;
        }

        $product['presentacion'] = $id;

        $__sql_presentacion = "CALL presentacionInsert('{$id}','{$presentacion['descripcion']}','{$presentacion['cantidad']}')";

        $__sql_producto = "CALL productoInsert('{$product['codigobarras']}','{$product['imagenProducto']}','{$product['nombreProducto']}','{$product['descripcion']}','{$product['precio']}','{$product['fecha']}','{$product['hora']}','{$product['existencia']}','{$product['presentacion']}')";

        $__connection = $this->__productsConnection->__GetConnection();

        // Limpiar resultados pendientes antes de ejecutar nuevas consultas
        while ($__connection->more_results()) {
            $__connection->next_result();
        }

        if (!$__connection->multi_query($__sql_presentacion)) {
            $errorMessage = $__connection->error;
            throw new Exception("Error al ejecutar la consulta \$__sql_presentacion: " . $errorMessage);
        }

        $__connection->next_result(); // Pasar al siguiente resultado para consumirlo

        if (!$__connection->multi_query($__sql_producto)) {
            $errorMessage = $__connection->error;
            throw new Exception("Error al ejecutar la consulta \$__sql_producto: " . $errorMessage);
        }

        $__connection->next_result(); // Pasar al siguiente resultado para consumirlo

        while ($__connection->more_results()) {
            $__connection->next_result();
        }

        $this->__productsConnection->__CloseConnection();

        return true;


    }

    public function __update($product)
    {
        //paso1 creamos la consulta
        $__sql = "CALL productoUpdate(
            '{$product["codigoBarras"]}',
            '{$product["imagenProducto"]}',
            '{$product["nombreProducto"]}', 
            '{$product["descripcion"]}',
            '{$product["precio"]}',
            '{$product["estado"]}',
            '{$product["date"]}',
            '{$product["time"]}',
            '{$product["existencia"]}',
            '{$product["presentacion"]}'
        )";
        //paso 2 conectamos a la base de datos
        $__connection = $this->__productsConnection->__GetConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $__connection->query($__sql);
        //paso 4 preparamos la respuesta
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        //paso 5 cerramos la coneccion
        $this->__productsConnection->__CloseConnection();
        //paso 6 arrojamos resultados
        return $res;
    }

    public function __delete($id, $name)
    {
        // Inicalizamos la consulta para la eliminacion
        $sql = "call productoDelete('{$id}', '{$name}')";
        // Conectamos a la base de datos
        $__connection = $this->__productsConnection->__GetConnection();
        // Ejecutamos la consulta
        $__reslt = $__connection->query($sql);
        // Verificamos los datos
        if ($__reslt)
            $res = true;
        else
            $res = false;

        // Cerramos la conexion
        $this->__productsConnection->__CloseConnection();

        // Retornamos los datos
        return $res;


    }

    public function __getLastidPresentacion()
    {
        try {
            // Obteniendo la conexión
            $__connection = $this->__productsConnection->__GetConnection();
            // Creamos la consulta para obtener la última id insertada
            $__sql = "CALL productoGetLastPresentacion()";
            // Inicializamos la variable
            $latestId = 0;
            //Ejecutamos la consulta
            $result = $__connection->query($__sql);
            // Verificamos los resultados
            if ($result) {
                // Obtenemos la fila
                $row = $result->fetch_assoc();
                // Obtenemos la id
                $latestId = $row['max_id'];
            }

            // Retornando el último ID insertado en la tabla "direccion"
            return $latestId;
        } catch (Exception $e) {
            // Manejo de errores
            // Puedes registrar el error en un archivo de registro o mostrar un mensaje de error al usuario.
            // Aquí, simplemente re-throw el error para propagarlo y manejarlo en otro lugar si es necesario.
            throw $e;
        }
    }

}
?>