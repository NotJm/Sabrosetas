<?php

class __userModel
{
    //creamos un atributo para manipular los datos en la bd
    private $__userConnection;

    //definimos el contructor de la clase usermodel
    public function __construct()
    {
        //requiero la clase dbconnection 
        require_once('app/config/dbconnection.php');
        //instranciamos __userConnection con dbconnection 
        $this->__userConnection = new __DataBaseConnection();
    }

    //a partir de esto vienen los metodos logicos de la app
    //metodo para obtener todos los usuarios
    public function __getAll()
    {
        //paso 1 creo la consulta
        $sql = "call usuarioGETALL()";
        //paso 2 llamo a la conneccion 
        $connection = $this->__userConnection->__GetConnection();
        //paso 3 ejecuto la consulta
        $result = $connection->query($sql);
        //paso 4 verifico y acomodo datos 
        //paso 4.1 creo un arreglo para almacenar los usuarios de la bd 
        $users = array();
        //tengo que recorrer $result para ir extrayendo los renglones (registros de usuarios)
        //ocupare un while y la instruccion fetch_assoc
        while ($user = $result->fetch_assoc()) {
            $users[] = $user;
        }
        //paso 5 cierro la coneccion 
        $this->__userConnection->__CloseConnection();
        //paso 6 arrojo resultados
        return $users;
    }

    //getById metodo que extrae un usuario por su id
    public function __getById($id)
    {
        //creamos consulta
        $sql = "call usuarioGETBYID('$id')";
        //obtenemos la coneccion 
        $connection = $this->__userConnection->__GetConnection();
        //ejecutamos la consulta
        $reslt = $connection->query($sql);
        //verificamos que traiga datos y los sacamos a una variable
        if ($reslt && $reslt->num_rows > 0) {
            $user = $reslt->fetch_assoc();
        } else {
            $user = false;
        }
        //cerramos la coneccion
        $this->__userConnection->__CloseConnection();
        //arrojamos resultados
        return $user;
    }

    //metodo para verificar credenciales de logeo
    public function __getCredentials($us, $ps)
    {
        // Creamos la consulta
        $sql = "call usuarioGetCredentials('{$us}', '{$ps}')";  
        // Obtenemos la coneccion
        $connection = $this->__userConnection->__GetConnection();
        // Ejecutamos la consulta
        $result = $connection->query($sql);
        // Verificamos que existan resultados
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            $user = false;
        }

        // Cerramos la coneccion
        $this->__userConnection->__CloseConnection();
        // Arrojamos el resultado
        return $user;
    }

    // Metodo para insertar usuarios
    public function __insertData($user, $direccion)
    {
        // Obtenemos el ultimo id que se ha insertado
        $lastestId = $this->__getLastidDireccion();
        // Verificamos el ultimo id insertado
        if ($lastestId != 0)
            // Si es diferente a 0 se le aumenta 1 para nuevo id
            $id = $lastestId + 1;
        else
            // De no ser asi igualamos como el primero
            $id = 1;
        
        // Igualamos el campo direccion de usuarios con el id insertado en la tabla
        $user['direccion'] = $id;

        // Instanciamos la sentencia sql para insertar datos a la tabla de direccion
        $__sql_direccion = "call direccionInsert
            (
                '" . $id . "','" .
            $direccion['colonia'] . "','" .
            $direccion['municipio'] . "','" .
            $direccion['localidad'] . "','" .
            $direccion['calle'] . "','" .
            $direccion['numerocasa'] . "','" .
            $direccion['codigopostal'] .
            "')";

        // Instanciamos la sentencia sql para insertar datos a la tabla de usuarios
        $__sql_usuario = "call usuarioInsert 
            ('" .
            $user['username'] . "','" .
            $user['password'] . "','" .
            $user['nombre'] . "','" .
            $user['apaterno'] . "','" .
            $user['amaterno'] . "','" .
            $user['email'] . "','" .
            $user['telefono'] . "','" .
            $user['direccion'] . "','" .
            $user['imagenPerfil']
            . "')";

        // Conectamos a la base de datos
        $connection = $this->__userConnection->__GetConnection();

        while($connection->more_results())
        {
            $connection->next_result();
        }
        
        if(!$connection->multi_query($__sql_direccion))
        {
            $errorMessage = $connection->error;
            throw new Exception("Error al ejecutar la consulta \$___sql_direccion: ".  $errorMessage);
        }

        $connection->next_result();

        if(!$connection->multi_query($__sql_usuario))
        {
            $errorMessage = $connection->error;
            throw new Exception("Error al ejecutar la consulta \$___sql_usuario: ".  $errorMessage);
        }

        $connection->next_result();

        while($connection->more_results())
        {
            $connection->next_result();
        }
        
        // Cerramos la coneccion
        $this->__userConnection->__CloseConnection();
        // Arrojamos resultados
        return true;
    }

    //metodo para editar usuarios
    public function __update($user)
    {
        //paso1 creamos la consulta
        $__sql = "call usuarioUpdate
        (
            '" . $user["username"] . "',
            '" . $user["password"] . "',
            '" . $user["nombre"] . "', 
            '" . $user["apaterno"] . "',
            '" . $user["amaterno"] . "',
            '" . $user['email'] . "',
            '" . $user['telefono'] . "',
            '" . $user['imagenPerfil'] . "',
            '" . $user['permisos'] . "'
        )";
        //paso 2 conectamos a la base de datos
        $__connection = $this->__userConnection->__GetConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $__connection->query($__sql);
        //paso 4 preparamos la respuesta
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        //paso 5 cerramos la coneccion
        $this->__userConnection->__CloseConnection();
        //paso 6 arrojamos resultados
        return $res;
    }

    //metodo para eliminar usuarios
    //metodo para eliminar un usuario por su ID
    public function __delete($id)
    {
        //paso1 creamos la consulta
        $sql = "call usuarioDelete('$id')";
        //paso 2 conectamos a la base de datos
        $connection = $this->__userConnection->__GetConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        //paso 5 cerramos la coneccion
        $this->__userConnection->__CloseConnection();
        //paso 6 arrojamos resultados
        return $res;
    }

    // ! METODOS POR PARTE DE LA TABLA DE DIRECCION

    // Obtener el ultimo id registrado
    public function __getLastidDireccion()
    {
        // Obteniendo la conexión
        $__connection = $this->__userConnection->__GetConnection();
        // Creamos la consulta para obtener la ultima id insertada
        $__sql = "call usuarioGetLastDireccion()";
        // Obteniendo el último ID insertado en la tabla "direccion"
        // Inicializamos la variable
        $latestId = 0;
        //Ejecutamos la consulta
        $result = $__connection->query($__sql);
        // Verficamos los resultados
        if ($result) {
            // Obtenemos la fila
            $row = $result->fetch_assoc();
            // Obtenemos la id
            $latestId = $row['max_id'];
        }

        // Retornando el último ID insertado en la tabla "direccion"
        return $latestId;
    }

}