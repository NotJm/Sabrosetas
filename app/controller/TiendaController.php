<?php
require_once("app/model/productosModel.php");
class TiendaController
{
    // Inicializador de la vista de contactos
    private $__view;
    private $__model;

    function __index()
    {
         // ! Asignacion de la clase al modelo que contiene todo sus metodos
         $this->__model = new __productsModel();
         // ! Llamamos el metodo para obtener todos los datos
        $datos = $this->__model->__getAll();
        // Inicializando variable de la vista con la ruta de la vista
        $__view = "app/view/public/indexTiendaView.php";
        // Incluyendo la vista a la plantilla
        include_once("app/view/public/plantillaPublicView.php");
    }
}
?>