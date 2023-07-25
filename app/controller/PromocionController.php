<?php
require_once("app/model/promocionesModel.php");
require_once("app/model/productosModel.php");
class PromocionController
{
    private $__view;
    private $__model;

    public function Index()
    {
        

        $__model = new __promocionModel();
        $datos = $__model->getAll();

        include_once("app/View/admin/PlantillaAdminView.php");
        //en el index vamos a mostrar una tabla con todas las promociones 
        $__view = "app/View/admin/Promociones/.php";
    }

    //creamos el metodo para llamar a la __view de agregar promocion
    public function CallFormAdd()
    {
        $__view = "app/View/admin/users/AddPromocionView.php";
        include_once("app/View/admin/PlantillaAdminView.php");
    }
    //creamos el metodo para agregar una promocion
    public function Add()
    {
        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                'IdPromocion' => $_POST['idpromo'],
                'NombrePromocion' => $_POST['nombrepromo'],
                'Descripcion' => $_POST['descripcion'],
                'FechaInicio' => $_POST['fchinicio'],
                'FechaFinalizacion' => $_POST['fchtermino'],
                'Codigo' => $_POST['codigo'],
                'IdBeneficio' => $_POST['idbeneficio'],
                'IdCondicion' => $_POST['idcondicion'],
                'IdRestriccion' => $_POST['idrestriccion'],
                'Estado' => $_POST['estado']
            );

            //llamamos al metodo del __model que agrega a las promociones en a la base de datos
            $__model = new __promocionModel();
            $res = $__model->insert($datos);
            //podria poner una consicion en la que si el elemnto fue insertado correctamente
            //llamaria al index de promociones y si no llamaria al formulario de agregar
            //redireccionamos al index de promociones
            header("Location:http://localhost/?C=UserController&M=index");
        }
    }

    //Creamos el metodo para llamar a la __view de editar promocion
    public function CallFormEdit()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id de la promocion a editar
            $id = $_GET['id'];
            //llamamos al metodo del __model que obtiene los datos de la promocion a editar
            $__model = new __promocionModel();
            $datos = $__model->getById($id);
            //llamamos a la __view de editar promocion
            $__view = 'app/View/admin/users/EditPromocionView.php';
            include_once('app/view/admin/PlantillaAdminView.php');
        }
    }
    //creamos el metodo para editar una promocion
    public function Edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                'IdPromocion' => $_POST['idpromo'], //agregamos el id de promocion a editar
                'NombrePromocion' => $_POST['nombrepromocion'],
                'Descripcion' => $_POST['descripcion'],
                'FechaInicio' => $_POST['fechainicio'],
                'FechaFinalizacion' => $_POST['fechafinalizacion'],
                'Codigo' => $_POST['codigo'],
                'IdBeneficio' => $_POST['idbeneficio'],
                'IdCondicion' => $_POST['idcondicion'],
                'IdRestriccion' => $_POST['idrestriccion'],
                'Estado' => $_POST['estado']
            );
            //llamamos al metodo del __model que actualiza los datos de la promocion
            $__model = new __promocionModel();
            $__model->update($datos);
            //redireccionamos al index de promociones
            header("Location:http://localhost/pro/?C=UserController&M=index");
        }
    }

    //Creamos el metodo para eliminar una promocion de la base de datos, este metodo se llamara una vez que 
    public function Delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id de promocion a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del __model que elimina promociones de la base de datos
            $__model = new __promocionModel();
            $__model->delete($id);
            //redireccionamos al index de Promocion
            header("Location:http://localhost/pro/?C=UserController&M=index");
        }
    }
    public function assingProducto()
    {
        session_start();

        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true)
        {
            $__model = new  __productsModel();
            $__datos_products = $__model->__getAll();

            $__model = new __promocionModel();
            $__datos_promocion = $__model->getAll();

            $__view = "app/view/admin/Promociones/AssignPromocionProductoView.php";
            include_once("app/view/admin/plantillaAdminView.php");
        }
    }
    
}


?>