<?php
// Requerimos del modelo de presentacion
require_once("app/model/presentacionModel.php");

class PresentacionController
{
    // Inicializacion de la vista presentaciones
    private $__view;
    // Inicializacion de los modelos
    private $__model;

    public function __index()
    {
        $__model = new __presentacionModel();

        $datos = $__model->__getAll();

        session_start();

        $__view = "app/view/admin/Presentaciones/indexPresentacionView.php";
        include_once("app/view/admin/plantillaAdminView.php");
    }

    public function __callFormAdd()
    {
        session_start();

        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $__view = "app/view/admin/Presentaciones/AddPresentacionView.php";
            include_once("app/view/admin/plantillaAdminView.php");
        }
    }

    public function __add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $__model = new __presentacionModel();
            $__presentacion = $__model->__getById($_POST['presentacion']);

            if ($__presentacion['idPresentacion'] == $_POST['presentacion']) {
                session_start();
                $_SESSION['error'] = 'Este Producto ya existe';
                header("Location:?C=PresentacionController&M=__callFormAdd");
            } else {
                // ! DATOS DE PRESENTACION
                $presentacion_data = array(
                    'presentacion' => $_POST['presentacion'],
                    'descripcion' => $_POST['pdescripcion'],
                    'cantidad' => $_POST['cantidad']
                );

                $__model = new __presentacionModel();

                $__res = $__model->__insert($presentacion_data);

                session_start();
                unset($_SESSION['error']);
                header("Location:?C=PresentacionController&M=__index");

            }

        }
    }

    public function __callFormEdit()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];

            $__model = new __presentacionModel();
            $datos = $__model->__getById($id);

            session_start();
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                $__view = "app/view/admin/Presentaciones/EditPresentacionView.php";
                include_once("app/view/admin/plantillaAdminView.php");
            }
        }
    }

    public function __edit()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $presentacion_data = array(
                'presentacion' => $_POST['presentacion'],
                'descripcion' => $_POST['descripcion'],
                'cantidadpiezas' => $_POST['cantidadpiezas']
            );

            $__model = new __presentacionModel();
            $__model->__update($presentacion_data);

            header("Location:?C=PresentacionController&M=__index");


        }
    }

}
?>