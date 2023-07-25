<?php
require_once("app/model/restriccionModel.php.php");
    class UserController{
        private $vista;
        private $modelo;

        public function Index(){
            //en el index vamos a mostrar una tabla con todas las restricciones
            $vista="app/View/admin/users/IndexRestriccionesView.php";

            $modelo=new __restricionesModel();
            $datos=$modelo->getAll();

            include_once("app/View/admin/PlantillaAdminView.php");
        }

        //creamos el metodo para llamar a la vista de agregar restriccion
        public function CallFormAdd(){
            $vista="app/View/admin/users/AddRestriccionView.php";
            include_once("app/View/admin/PlantillaAdminView.php");
        }
        //creamos el metodo para agregar una restriccion
        public function Add(){
            //verificamos si el metodo de envio de datos es POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                    $datos=array(
                        'TipoRestriccion'=>$_POST['tiporestriccion'],
                        'ValorRestriccion'=>$_POST['valorrestriccion']
                    );
                    
                    //llamamos al metodo del modelo que agrega restriccion a la base de datos
                    $modelo=new __restricionesModel();
                    $res= $modelo->insert($datos);
                    //podria poner una consicion en la que si el elemento fue insertado correctamente
                    //llamaria al index de restricciones y si no llamaria al formulario de agregar
                    //redireccionamos al index de restricciones
                    header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

        //Creamos el metodo para llamar a la vista de editar restriccion
        public function CallFormEdit(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id de restriccion a editar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos de la restriccion a editar
                $modelo=new __restricionesModel();
                $datos=$modelo->getById($id);
                //llamamos a la vista de editar restriccion
                $vista='app/View/admin/users/EditRestriccionView.php';
                include_once('app/view/admin/PlantillaAdminView.php');
            }
        }
        //creamos el metodo para editar una restriccion
        public function Edit(){
            //verificamos que el metodo de envio de datos sea POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                $datos=array(
                    'IdRestriccion'=>$_POST['id'],//agregamos el id de la restriccion a editar
                    'TipoRestriccion'=>$_POST['tiporestriccion'],
                    'ValorRestriccion'=>$_POST['valorrestriccion']
                );
                //llamamos al metodo del modelo que actualiza los datos de la restriccion
                $modelo=new __restricionesModel();
                $modelo->update($datos);
                //redireccionamos al index de restricciones
                header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

        //Creamos el metodo para eliminar una restriccion de la base de datos, este metodo se llamara una vez que 
        public function Delete(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id de la restriccion a eliminar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que elimina restricciones de la base de datos
                $modelo=new __restricionesModel();
                $modelo->delete($id);
                //redireccionamos al index de restricciones
                header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

    }
?>