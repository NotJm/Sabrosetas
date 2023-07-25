<?php
    class __BeneficiosModel{
        // datos en la bd
        private $__beneficioConnection;

        public function __construct(){
            //dbconnection 
            require_once('app/config/dbconnection.php');
            $this->__beneficioConnection=new __DataBaseConnection();
        }

        //metodo para obtener todos los beneficios
        public function getAll(){
            $sql="SELECT * FROM Beneficios";
            $connection =$this->__beneficioConnection->__GetConnection();
            $result=$connection->query($sql);
            $beneficios=array();
            while($beneficio=$result->fetch_assoc()){
                $beneficio[]=$beneficios;
            }
            $this->__beneficioConnection->__CloseConnection();
            return $beneficio;
        }

        //extrae un beneficio por su id
        public function getById($id){
            $sql="SELECT * FROM Beneficios WHERE IdBeneficio='".$id."'";
            $connection=$this->__beneficioConnection->__GetConnection();
            $reslt=$connection->query($sql);
            if($reslt && $reslt->num_rows > 0){
                $Beneficios=$reslt->fetch_assoc();
            }else{
                $Beneficios=false;
            }
            $this->__beneficioConnection->__CloseConnection();
            return $Beneficios;
        }
 
        //metodo para insertar beneficio
        public function insert($Beneficios){
            $sql="INSERT INTO Beneficios(IdBeneficio, TipoBeneficio, ValorBeneficio) 
            VALUES('".$Beneficios['IdBeneficio']."','".$Beneficios['TipoBeneficio']."','".$Beneficios['ValorBeneficio']."')";
            $connection =$this->__beneficioConnection->__GetConnection();
            $reslt = $connection->query($sql);
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            $this->__beneficioConnection->__CloseConnection();
            return $res;
        }

        //metodo para editar Beneficios
        public function update($Beneficios){
            $sql="UPDATE Beneficios SET IdBeneficio='".$Beneficios['IdBeneficio']."', TipoBeneficio='".$Beneficios['TipoBeneficio']."',
            ValorBeneficio='".$Beneficios['ValorBeneficio']."' WHERE IdBeneficio=".$Beneficios['IdBeneficio'];
            $connection =$this->__beneficioConnection->__GetConnection();
            $reslt = $connection->query($sql);
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            $this->__beneficioConnection->__CloseConnection();
            return $res;
        }

        //metodo para eliminar un beneficio por su ID
        public function delete($id){
            $sql="DELETE FROM Beneficios WHERE IdBeneficio=$id";
            $connection =$this->__beneficioConnection->__GetConnection();
            $reslt = $connection->query($sql);
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            $this->__beneficioConnection->__CloseConnection();
            return $res;
        }
    }
?>