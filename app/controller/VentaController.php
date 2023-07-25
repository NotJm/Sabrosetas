<?php
require_once("app/model/ventaModel.php");
class VentaController
{
    private $__view;
    private $__model;

    public function __index()
    {
        //en el index vamos a mostrar una tabla con todas las ventas detalle 

        $__model = new __ventaModel();
        $datos = $__model->getAll();
        $__view = "app/view/admin/Ventas/IndexVentaDetalleView.php";
        include_once("app/view/admin/plantillaAdminView.php");
    }


    //Creamos el metodo para eliminar una venta detalle de la base de datos, este metodo se llamara una vez que 
    public function Delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id de venta detalle a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del __model que elimina venta detalle de la base de datos
            $__model = new __ventaModel();
            $__model->delete($id);
            //redireccionamos al index de venta detalle 
            header("Location:?C=VentaController&M=__index");
        }
    }

}
?>