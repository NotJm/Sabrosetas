<?php
// Definimos la constante para generar la rutas acceder
define('controlador', 'app/controller/');
// Operador ternario
$control = isset($_GET['C']) ? $_GET['C']: '';
// Armamos la ruta que se va seguir
$path = controlador.$control.".php";
// Verificacion que exista el archivo de ruta 
if(!empty($control) && file_exists($path))
{
    include_once($path);
    $object = new $control();
    // Operador ternario para el enrutador
    $method=isset($_GET['M'])?$_GET['M']:'';
    // Verificamos que lo que paso exista
    if(!empty($_GET['M']) && method_exists($object, $method))
        // Ejecucion del metodo
        $object->$method();
}
else
{
    // Llamamos al controlador por defecto
    require_once("app/controller/DefaultController.php");
    $__object = new DefaultController();
    $__object->__index();
}
?>