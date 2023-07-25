<?php
// Importacion del modelo productos
require_once("app/model/productosModel.php");
require_once("app/model/presentacionModel.php");

class ProductsController
{
    private $__view; // Variable de vista  para la pagina web

    private $__model; // Variable del modelo que contendra los metodos

    public function __index()
    {

        // ! Asignacion de la clase al modelo que contiene todo sus metodos
        $this->__model = new __productsModel();
        // ! Llamamos el metodo para obtener todos los datos
        $datos = $this->__model->__getAll();
        // Inicamos la sesion
        session_start();
        // Checamos si estamos iniciado sesion
        $__view = "app/view/admin/Productos/indexProductsView.php";
        include_once("app/view/admin/plantillaAdminView.php");


    }

    // ! LOGICA PARA AÑADIR DATOS
    public function __callFormAdd()
    {
        session_start();

        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $__view = "app/view/admin/Productos/AddProductsView.php";
            include_once("app/view/admin/plantillaAdminView.php");
        }
    }

    public function __add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $__model = new __productsModel();
            $__product = $__model->__getById($_POST['codigobarras'], $_POST['product']);

            if ($__product['codigoBarras'] == $_POST['codigobarras'] && $__product['nombreProducto'] == $_POST['product']) {
                session_start();
                $_SESSION['error'] = 'Este Producto ya existe';
                header("Location:?C=ProductsController&M=__callFormAdd");
            } else {
                // ! DATOS DE PRESENTACION
                $presentacion_data = array(
                    'descripcion'   => $_POST['pdescripcion'],
                    'cantidad'      => $_POST['cantidad']
                );

                // ! DATOS DE PRODUCTO
                $producto_data = array(
                    'codigobarras'      => $_POST['codigobarras'],
                    'imagenProducto'    => $_POST['imageProduct'],
                    'nombreProducto'    => $_POST['product'],
                    'descripcion'       => $_POST['descripcion'],
                    'precio'            => $_POST['price'],
                    'fecha'             => $_POST['date'],
                    'hora'              => $_POST['time'],
                    'existencia'        => $_POST['existencia'],
                    'presentacion'      => null
                );

                //! Comenzamos a procesar la imagen
                if (isset($_FILES['imageProduct']) && $_FILES['imageProduct']['error'] == UPLOAD_ERR_OK) {
                    //obtenemos la informacion necesaria del archivo que estamos cargando
                    $nombreArchivo = $_FILES['imageProduct']['name'];
                    $tipoArchivo = $_FILES['imageProduct']['type'];
                    $tamanoArchivo = $_FILES['imageProduct']['size'];
                    $rutaTemporal = $_FILES['imageProduct']['tmp_name'];
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
                    $nombreArchivo = uniqid('Producto_') . '.' . $extencion;
                    $rutaDestino = "app/view/src/img/products/" . $nombreArchivo;
                    //copiamos el archivo a nuestro servidor
                    if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        echo "Error al cargar el archivo";
                        exit;
                    }
                    $producto_data['imagenProducto'] = $nombreArchivo;
                }

                $__model = new __productsModel();

                $__res = $__model->__insertData($presentacion_data, $producto_data);

                session_start();
                unset($_SESSION['error']);
                header("Location:?C=ProductsController&M=__index");
                
            }

        }
    }

    // ! LOGICA PARA EDITAR DATOS
    public function __callFormEdit()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a editar
            $id     = $_GET['id'];
            $name   = $_GET['name'];
            //llamamos al metodo del modelo que obtiene los datos del usuario a editar
            $__model = new __productsModel();
            $datos = $__model->__getById($id, $name);

            //llamamos a la vista de editar usuario
            session_start();
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                $__view = "app/view/admin/Productos/EditProductsView.php";
                include_once("app/view/admin/plantillaAdminView.php");
            }   
        }

    }

    public function __edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($_POST['imagenProducto'] == "") {
                $this->__model = new __productsModel();
                $__product = $this->__model->__getById($_POST['codigoBarras'], $_POST['nombreProducto']);
                echo $__product['imagenProducto'];
                $_POST['imagenProducto'] = $__product["imagenProducto"];
            }

            //almacenamos los datos enviados por el formulario en un arreglo
            $product_data = array(
                'codigoBarras' => $_POST['codigoBarras'],
                'imagenProducto' => $_POST['imagenProducto'],
                'nombreProducto' => $_POST['nombreProducto'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'estado' => $_POST['estado'],
                'existencia' => $_POST['existencia'],
                'date' => $_POST['date'],
                'time' => $_POST['time'],
                'presentacion' => $_POST['presentacion']
            );

            //comenzamos a procesar la imagen 
            if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']['error'] === UPLOAD_ERR_OK) {
                //obtenemos la informacion necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['imagenProducto']['name'];
                $tipoArchivo = $_FILES['imagenProducto']['type'];
                $tamanoArchivo = $_FILES['imagenProducto']['size'];
                $rutaTemporal = $_FILES['imagenProducto']['tmp_name'];
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
                $nombreArchivo = uniqid('Producto_') . '.' . $extencion;
                $rutaDestino = "app/view/src/img/products/" . $nombreArchivo;
                //copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $this->__model = new __productsModel();
                $anterior = $this->__model->__getById($_POST['codigoBarras'], $_POST['nombreProducto']);
                if (!empty($anterior['imagenProducto'])) {
                    unlink("app/view/src/img/products/" . $anterior['imagenProducto']);
                }

                //tengo que ver si se toco o no se toco el input_file
                $product_data['imagenProducto'] = $nombreArchivo;
            } else {
                $product_data['imagenProducto'] = $_POST['imagenProducto'];
            }
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $__model = new __productsModel();
            $__model->__update($product_data);
            //redireccionamos al index de usuarios
            header("Location:?C=ProductsController&M=__index");
        }
    }

    public function __delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            $name = $_GET['name'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            //creo un segundo modelo para rescatar el registro con el nombre
            // $this->__model = new __userModel();
            // $usuario = $this->__model->__getById($id);
            $__model = new __productsModel();
            $__product = $__model->__getById($id, $name);


            $__model = new __presentacionModel();
            $__model->__delete($__product['presentacion']);

            $__model = new __productsModel();
            $__model->__delete($id, $name);

            unlink("app/view/src/img/products/" . $__product['imagenProducto']);



            //eliminamos el registro
            // unlink("app/src/img/avatars/" . $usuario['Avatar']);
            //redireccionamos al index de usuarios
            header("Location:?C=ProductsController&M=__index");
        }
    }
}
?>