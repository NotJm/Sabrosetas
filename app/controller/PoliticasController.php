<?php
class PoliticasController
{
    // Variable donde se guardara la vista
    private $__view;

    function __index()
    {
        // Inicializar la visat con la ruta completa
        $__view = "app/view/public/indexPoliticasView.php";

        // Incluir la vista en la plantilla
        include_once("app/view/public/plantillaPublicView.php");

    }
}
?>