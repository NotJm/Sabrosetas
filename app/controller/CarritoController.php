<?php
class CarritoController
{
    private $__view;

    public function __index()
    {
        // Inicalizamos la variable de vista
        $__view = "app/view/public/indexCarritoView.php";
        // Lo incluimos a la plantilla
        include_once("app/view/public/plantillaPublicView.php");

    }
}
?>