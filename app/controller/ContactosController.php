<?php
class ContactosController
{
    // Inicializador de la vista de contactos
    private $__view;

    function __index()
    {
        // Inicializando variable de la vista con la ruta de la vista
        $__view = "app/view/public/indexContactosView.php";

        // Incluyendo la vista a la plantilla
        include_once("app/view/public/plantillaPublicView.php");
    }
}
?>