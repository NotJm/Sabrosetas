<?php
// Definimos la clase controlador por default que se invoca al inicion de la app
class DefaultController
{
    // El controlador tiene un atributo llamado view
    private $__view;

    // Definimos el metodo index de nuestro controlador
    public function __index()
    {
        // Creamos una vista del principal del admin
        $__view = "app/view/public/indexPublicView.php";
        // Incluimos a la plantilla
        include_once("app/view/public/plantillaPublicView.php");
    }
}
?>