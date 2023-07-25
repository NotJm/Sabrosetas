<?php
class AboutController
{
    private $__view; // Variable de la vista donde se almacen

    public function __index()
    {
        // Inicializacion de la variable 
        $__view = "app/view/public/indexAboutView.php";

        // Agregandolo a la vista de la plantilla del Admin
        include_once("app/view/public/plantillaPublicView.php");
    }
}
?>