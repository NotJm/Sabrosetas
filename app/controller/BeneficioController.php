<?php
require_once("app/model/beneficioModel.php.php"); 
    class UserController{
        private $vista;
        private $modelo;

        public function Index(){
            //en el index vamos a mostrar una tabla con todos los beneficios
            $vista="app/View/admin/users/IndexBeneficioView.php";

            $modelo=new __BeneficiosModel();
            $datos=$modelo->getAll();

            include_once("app/View/admin/PlantillaAdminView.php");
        }

        //creamos el metodo para llamar a la vista de agregar beneficio
        public function CallFormAdd(){
            $vista="app/View/admin/users/AddBeneficioView.php";
            include_once("app/View/admin/PlantillaAdminView.php");
        }
        //creamos el metodo para agregar un beneficio
        public function Add(){
            //verificamos si el metodo de envio de datos es POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                    $datos=array(
                        'TipoBeneficio'=>$_POST['tipobeneficio'],
                        'ValorBeneficio'=>$_POST['valorBeneficio']
                        
                    );
                    
                    //llamamos al metodo del modelo que agrega el beneficio a la base de datos
                    $modelo=new __BeneficiosModel();
                    $res= $modelo->insert($datos);
                    //podria poner una consicion en la que si el elemnto fue insertado correctamente
                    //llamaria al index de beneficios y si no llamaria al formulario de agregar
                    //redireccionamos al index de usuarios
                    header("Location:http://localhost/Pro/?C=UserController&M=index");
            }
        }

        //Creamos el metodo para llamar a la vista de editar beneficio
        public function CallFormEdit(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del beneficio a editar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos del beneficio a editar
                $modelo=new __BeneficiosModel();
                $datos=$modelo->getById($id);
                //llamamos a la vista de editar beneficio
                $vista='app/View/admin/users/EditBeneficioView.php';
                include_once('app/view/admin/PlantillaAdminView.php');
            }
        }
        //creamos el metodo para editar un beneficio
        public function Edit(){
            //verificamos que el metodo de envio de datos sea POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                $datos=array(
                    'IdBeneficio'=>$_POST['id'],//agregamos el id del beneficio a editar
                    'TipoBeneficio'=>$_POST['tipobeneficio'],
                    'ValorBeneficio'=>$_POST['valorbeneficio']
                );
                //llamamos al metodo del modelo que actualiza los datos del beneficio
                $modelo=new __BeneficiosModel();
                $modelo->update($datos);
                //redireccionamos al index de beneficio
                header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

        //se haya confirmado la eliminacion del beneficio en la vista de index mediante un confirm de javascript
        public function Delete(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del beneficio a eliminar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que elimina al beneficio de la base de datos
                $modelo=new __BeneficiosModel();
                $modelo->delete($id);
                //redireccionamos al index de beneficio
                header("Location:http://localhost/pro/?C=UserController&M=index");
            }
        }

    }
?>