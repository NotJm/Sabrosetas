<?php
require_once("app/model/condicionModel.php.php");
    class UserController{
        private $vista;
        private $modelo;

        public function Index(){
            //en el index vamos a mostrar una tabla con toda las condiciones
            $vista="app/View/admin/users/IndexCondicionView.php";

            $modelo=new __condicionModel();
            $datos=$modelo->getAll();

            include_once("app/View/admin/PlantillaAdminView.php");
        }

        //creamos el metodo para llamar a la vista de agregar condicion
        public function CallFormAdd(){
            $vista="app/View/admin/users/AddCondicionView.php";
            include_once("app/View/admin/PlantillaAdminView.php");
        }
        //creamos el metodo para agregar una condicion
        public function Add(){
            //verificamos si el metodo de envio de datos es POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                    $datos=array(
                        'TipoCondicion'=>$_POST['tipocondicion'],
                        'ValorCondicion'=>$_POST['valorcondicion']
                    );
                    
                    //llamamos al metodo del modelo que agrega una condicion a la base de datos
                    $modelo=new __condicionModel();
                    $res= $modelo->insert($datos);
                    //podria poner una consicion en la que si el elemnto fue insertado correctamente
                    //llamaria al index de condiciones y si no llamaria al formulario de agregar
                    //redireccionamos al index de condiciones
                    header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

        //Creamos el metodo para llamar a la vista de editar condicion
        public function CallFormEdit(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id de la condicion a editar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos de la condicion a editar
                $modelo=new __condicionModel();
                $datos=$modelo->getById($id);
                //llamamos a la vista de editar condicion
                $vista='app/View/admin/users/EditCondicionView.php';
                include_once('app/view/admin/PlantillaAdminView.php');
            }
        }
        //creamos el metodo para editar una condicion
        public function Edit(){
            //verificamos que el metodo de envio de datos sea POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                $datos=array(
                    'IdCondicion'=>$_POST['id'],//agregamos el id de la condicion a editar
                    'TipoCondicion'=>$_POST['tipocondicion'],
                    'ValorCondicion'=>$_POST['valorcondicion']
                );
                //llamamos al metodo del modelo que actualiza los datos de la condicion
                $modelo=new __condicionModel();
                $modelo->update($datos);
                //redireccionamos al index de condiciones
                header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

        //Creamos el metodo para eliminar una condicion de la base de datos, este metodo se llamara una vez que 
        public function Delete(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id de la condicion a eliminar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que elimina a la condicion de la base de datos
                $modelo=new __condicionModel();
                $modelo->delete($id);
                //redireccionamos al index de condiciones
                header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

    }
?>