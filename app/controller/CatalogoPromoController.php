<?php
require_once("app/model/catalogoPromocionesModel.php");
class CatalogoPromoController
{
    private $__view;
    private $__model;

    public function __index()
    {
        //en el index vamos a mostrar una tabla con todo el catalogo de promociones

        $__model = new __CatalogoPromoModel();
        $datos = $__model->getAll();

        $__view = "app/view/admin/Catalogo/indexCatalogoPromocionesView.php";
        include_once("app/view/admin/PlantillaAdminView.php");
    }

    //creamos el metodo para llamar a la __view de agregar al catalogo de promociones
    public function CallFormAdd()
    {
        $__view = "app/View/admin/users/AddCatalogoPromoView.php";
        include_once("app/View/admin/PlantillaAdminView.php");
    }
    //creamos el metodo para agregar al catalgo de promociones
    public function Add()
    {
        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                'IdPromocion' => $_POST['codigopromo'],
                'IdProducto' => $_POST['nombreProducto']
            );

            //llamamos al metodo del __model que agrega al catalogo de promociones a la base de datos
            $__model = new __CatalogoPromoModel();
            $res = $__model->insert($datos);
            //podria poner una consicion en la que si el elemnto fue insertado correctamente
            //llamaria al index de catalogo de promociones y si no llamaria al formulario de agregar
            //redireccionamos al index de catalogo de promociones
            header("Location:?C=CatalogoPromoController&M=__index");
        }
    }

    //Creamos el metodo para llamar a la __view de editar el catalogo de promociones
    public function CallFormEdit()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del catalogo de promociones a editar
            $id = $_GET['id'];
            //llamamos al metodo del __model que obtiene los datos del catalogo de promociones a editar
            $__model = new __CatalogoPromoModel();
            $datos = $__model->getById($id);
            //llamamos a la __view de editar catalogo de promociones
            $__view = 'app/view/admin/Catalogo/EditCatalogoPromoView.php';
            include_once('app/view/admin/plantillaAdminView.php');
        }
    }
    //creamos el metodo para editar un registro del catalogo de promociones
    public function Edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                'IdPromocion' => $_POST['id'], //agregamos el id de la promocion a editar
                'IdProducto' => $_POST['idproducto']
            );
            //llamamos al metodo del __model que actualiza los datos del catalogo de promociones
            $__model = new __CatalogoPromoModel();
            $__model->update($datos);
            //redireccionamos al index del catalogo de promociones
            header("Location:?C=UserController&M=index");
        }
    }

    //Creamos el metodo para eliminar un registro del catalogo de promociones de la base de datos, este metodo se llamara una vez que 
    public function __delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id de la promocion a eliminar
            $id = $_GET['id'];
            $codi = $_GET['codi'];
            //llamamos al metodo del __model que elimina al idpromocion de la base de datos
            $__model = new __CatalogoPromoModel();
            $__model->delete($id, $codi);
            //redireccionamos al index de catalogo de promociones
            header("Location:?C=CatalogoPromoController&M=__index");
        }
    }

}
?>