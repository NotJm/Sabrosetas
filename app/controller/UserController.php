<?php
require_once("app/model/userModel.php");
require_once("app/model/direccionModel.php");
class UserController
{
    private $__view;
    private $__model;

    public function __index()
    {
        //En el index vamos a mostrar una tabla con todos los usuarios

        // Creamos una nuevo objecto
        $__model = new __userModel();
        // Llamamos el metodo getAll
        $datos = $__model->__getAll();
        // Creamos la variable de sesion
        session_start();
        // unset($_SESSION['logedin']);
        // Nos fijamos si estamos logeados
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            // Si es asi nos dirigimos para la pagina por parte de admin
            $__view = "app/view/admin/Usuarios/IndexUserView.php";
            include_once("app/view/admin/plantillaAdminView.php");
        } else {
            // En caso nos dirigimos a la parte del publica
            $__view = "app/view/public/indexPublicView.php";
            include_once("app/view/public/plantillaPublicView.php");
        }
    }

    // ! LOGICA DE INSERTADO DE DATOS
    //Creamos el metodo para llamar a la vista de agregar usuario
    public function __callFormAdd()
    {
        // Iniciamos la variable de sesion
        session_start();

        // Checamos si estamos logueados
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            // En caso de que si nos dirijmos a la parte del admin
            $__view = "app/view/admin/Usuarios/AddUserView.php";
            include_once("app/view/admin/plantillaAdminView.php");
        } else {
            // En caso contrario nos dirigimos a la parte de registro por parte del publico
            $__view = "app/view/public/indexRegistroView.php";
            include_once("app/view/public/plantillaPublicView.php");
        }
    }

    // ! Creamos el metodo para agregar un usuario y direccion
    public function __add()
    {

        // Verificamos si el metodo de envio de datos es POST
        // Verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Almacenamos los datos enviados por el formulario en un arreglo

            $__model = new __userModel();
            $__user = $__model->__getById($_POST['username']);

            if ($__user['NombreUsuario'] == $_POST['username']) {
                session_start();
                $_SESSION['error'] = 'Este Usuario ya existe';
                header("Location:?C=UserController&M=__callFormAdd");
            } else {
                // ! DATOS DE DIRECCION
                $direccion_data = array(
                    'colonia' => $_POST['colonia'],
                    'municipio' => $_POST['municipio'],
                    'localidad' => $_POST['localidad'],
                    'calle' => $_POST['calle'],
                    'numerocasa' => $_POST['ncasa'],
                    'codigopostal' => $_POST['codigopostal']
                );

                // ! DATOS DE USUARIO
                $user_data = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'nombre' => $_POST['name'],
                    'apaterno' => $_POST['apaterno'],
                    'amaterno' => $_POST['amaterno'],
                    'email' => $_POST['email'],
                    'direccion' => null,
                    'telefono' => $_POST['telefono'],
                    'imagenPefil' => $_POST['avatar']
                );

                // ! Comenzamos a procesar la imagen 
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    //obtenemos la informacion necesaria del archivo que estamos cargando
                    $nombreArchivo = $_FILES['avatar']['name'];
                    $tipoArchivo = $_FILES['avatar']['type'];
                    $tamanoArchivo = $_FILES['avatar']['size'];
                    $rutaTemporal = $_FILES['avatar']['tmp_name'];
                    //validamos que tipo de imagen puedo subir
                    $extenciones = array('jpg', 'jpeg', 'png');
                    $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                    if (!in_array($extencion, $extenciones)) {
                        echo "Formato de archivo no valido";
                        exit;
                    }
                    //validamos el tamaño del archivo a cargar
                    $tamanomaximo = 2 * 1024 * 1024; // ! 2 mb
                    if ($tamanoArchivo > $tamanomaximo) {
                        echo "ya mejor sube un video o una lona";
                        exit;
                    }
                    //generamos el numbre del archivo
                    $nombreArchivo = uniqid('Avatar_') . '.' . $extencion;
                    $rutaDestino = "app/view/src/img/avatars/" . $nombreArchivo;
                    //copiamos el archivo a nuestro servidor
                    if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        echo "Error al cargar el archivo";
                        exit;
                    }

                    
                    $user_data['imagenPerfil'] = $nombreArchivo;
                }

                // Llamamos al metodo del modelo que agrega al usuario a la base de datos
                $__model = new __userModel();
                // Iniciamos el metodo
                $res = $__model->__insertData($user_data, $direccion_data);
                /* 
                Podria poner una consicion en la que si el elemnto fue insertado correctamente
                Llamaria al index de usuarios y si no llamaria al formulario de agregar
                redireccionamos al index de usuarios 
                */

                session_start();
                unset($_SESSION['error']);
                if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true)
                    header("Location:?C=UserController&M=__index");
                else
                    header("Location:?C=UserController&M=__callFormLogin");
            }
        }
    }

    // ! LOGICA DE EDICION DE DATOS
    //Creamos el metodo para llamar a la vista de editar usuario
    public function __callFormEdit()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a editar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que obtiene los datos del usuario a editar
            $__model = new __userModel();
            $datos = $__model->__getById($id);

            //llamamos a la vista de editar usuario
            session_start();
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                $__view = "app/view/admin/Usuarios/EditUserView.php";
                include_once("app/view/admin/plantillaAdminView.php");
            }
        }
    }
    //creamos el metodo para editar un usuario
    public function __edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            if ($_POST['avatar'] == "") {
                $this->__model = new __userModel();
                $__username = $this->__model->__getById($_POST['username']);
                echo $__username['ImagenPerfil'];
                $_POST['avatar'] = $__username["ImagenPerfil"];
            }

            //almacenamos los datos enviados por el formulario en un arreglo
            $user_data = array(
                'permisos' => $_POST['permisos'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nombre' => $_POST['name'],
                'apaterno' => $_POST['apaterno'],
                'amaterno' => $_POST['amaterno'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono'],
                'imagenPerfil' => $_POST['avatar'],
            );

            //comenzamos a procesar la imagen 
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                //obtenemos la informacion necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['avatar']['name'];
                $tipoArchivo = $_FILES['avatar']['type'];
                $tamanoArchivo = $_FILES['avatar']['size'];
                $rutaTemporal = $_FILES['avatar']['tmp_name'];
                //validamos que tipo de imagen puedo subir
                $extenciones = array('jpg', 'jpeg', 'png');
                $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extencion, $extenciones)) {
                    echo "Formato de archivo no valido";
                    exit;
                }
                //validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "ya mejor sube un video o una lona";
                    exit;
                }
                //generamos el numbre del archivo
                $nombreArchivo = uniqid('Avatar_') . '.' . $extencion;
                $rutaDestino = "app/view/src/img/avatars/" . $nombreArchivo;
                //copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $this->__model = new __userModel();
                $anterior = $this->__model->__getById($_POST['username']);
                if (!empty($anterior['ImagenPerfil'])) {
                    unlink("app/view/src/img/avatars/" . $anterior['ImagenPerfil']);
                }

                //tengo que ver si se toco o no se toco el input_file
                $user_data['imagenPerfil'] = $nombreArchivo;
            } else {
                $user_data['imagenPerfil'] = $_POST['avatar'];
            }
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $__model = new __userModel();
            $__model->__update($user_data);
            //redireccionamos al index de usuarios
            session_start();

            header("Location:?C=UserController&M=__index");
        }
    }

    // ! LOGICA DE LOGIN
    public function __callFormLogin()
    {
        // Iniciamos la variable de sesion
        session_start();
        // Verificamos si estamos logueados como admin
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
        } else {
            // Vista por parte del publico
            $__view = "app/view/public/indexLoginView.php";
            include_once("app/view/public/plantillaPublicView.php");
        }

    }

    public function __login()
    {
        // Checa que se esta enviando con el metodo post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instanciamos el modelo de usuario
            $this->__model = new __userModel();
            // Obtenemos las credenciales por medio del del metodo getCredentials
            $usuario = $this->__model->__getCredentials(
                $_POST['username'],
                $_POST['password']
            );
            // Verificamos que el usuario exista
            if ($usuario == false) {
                session_start();
                $_SESSION['error'] = 'El usuario o la contraseña son incorrectas';
                header("Location:?C=UserController&M=__callFormLogin");
                // echo "<script src='app/view/public/js/errorLogin.js'></script>";
            } else {
                if ($usuario["Permisos"] == 1) {
                    // ! PUBLICS
                    // Iniciamos la sesion
                    session_start();
                    unset($_SESSION['error']);
                    // Instanciamos el login
                    $_SESSION['logedin'] = true;
                    // $_SESSION['foto'] = $usuario['Avatar'];
                    $_SESSION['name'] = $usuario['Nombre'] . ' ' . $usuario['Apaterno'] . ' ' . $usuario['Amaterno'];
                    $__view = "app/view/public/indexPublicView.php";
                    // Lo incluimos en la parte publica
                    include_once("app/view/public/plantillaPublicView.php");
                } else {
                    // ! ADMINS 
                    // Iniciamos la sesion
                    session_start();
                    unset($_SESSION['error']);
                    // El logeo va se verdadero
                    $_SESSION['logedin'] = true;
                    // $_SESSION['foto'] = $usuario['Avatar'];
                    $_SESSION['name'] = $usuario['Nombre'] . ' ' . $usuario['Apaterno'] . ' ' . $usuario['Amaterno'];
                    // Igualamos las vista de la index por parte del admin
                    header("Location:?C=AdminController&M=__index");
                }

            }
        }
    }

    public function __login_out()
    {
        session_start();
        unset($_SESSION['logedin']);
        // Vista por parte del publico
        header("Location:/");
    }

    //Creamos el metodo para eliminar un usuario de la base de datos, este metodo se llamara una vez que 
    //se haya confirmado la eliminacion del usuario en la vista de index mediante un confirm de javascript
    public function __delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            //creo un segundo modelo para rescatar el registro con el nombre
            $__model = new __userModel();
            $usuario = $__model->__getById($id);

            // ! ELIMINAR DEPENDENCIAS
            $__model = new __direccionModel();
            $__model->__delete($usuario['Direccion']);

            // ! ELIMINAR IMAGEN
            unlink("app/view/src/img/avatars/" . $usuario['ImagenPerfil']);

            $__model = new __userModel();
            $__model->__delete($id);


            //eliminamos el registro
            // unlink("app/src/img/avatars/" . $usuario['Avatar']);
            //redireccionamos al index de usuarios
            header("Location:?C=UserController&M=__index");
        }
    }




}