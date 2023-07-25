<?php
require_once("app/model/direccionModel.php");
class DireccionController
{  
    private $__view;
    private $__model;

    // ! Metodo Inicial para obtener todos los datos
    public function __index(){
        $__model = new __direccionModel();

        $datos = $__model->__getAll();

        session_start();

        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true)
        {
            $__view = "app/view/admin/Direccion/indexDireccionView.php";
            include_once("app/view/admin/plantillaAdminView.php");
        }
    }

    // ! Logica para la edicion de los datos
    public function __callFormEdit()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $id = $_GET['id'];

            $__model = new __direccionModel();
            $datos = $__model->__getById($id);

            session_start();
            if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true)
            {
                $__view = "app/view/admin/Direccion/EditDireccionView.php";
                include_once("app/view/admin/plantillaAdminView.php");
            }
        }
    }

    public function __edit()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $direccion_data = array(
                'username' => $_POST['username'],
                'colonia'  => $_POST['colonia'],
                'calle'    => $_POST['calle'],
                'municipio'=> $_POST['municipio'],
                'localidad'=> $_POST['localidad'],
                'ncasa'    => $_POST['ncasa'],
                'codigop'  => $_POST['codigop']
            );

            $__model = new __direccionModel();
            $__model->__update($direccion_data);

            header("Location:?C=UserController&M=__index");
        }


    }

   
}
?>