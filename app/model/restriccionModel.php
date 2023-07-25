<?php
class __restricionesModel
{// datos en la bd
    private $__restriccionesConnection;

    public function _construct(){
        //dbconnection 
        require_once('app/config/dbconnection.php');
        $this->__restriccionesConnection=new __DataBaseConnection();
    }

    //metodo para obtener todas las Restricciones
    public function getAll(){
        $sql="SELECT * FROM Restricciones";
        $connection =$this->__restriccionesConnection->__GetConnection();
        $result=$connection->query($sql);
        $restricciones=array();
        while($restriccion=$result->fetch_assoc()){
            $restricciones[]=$restriccion;
        }
        $this->__restriccionesConnection->__CloseConnection();
        return $restricciones;
    }

    //extrae una restriccion por su id
    public function getById($id){
        $sql="SELECT * FROM Restricciones WHERE IdRestriccion='".$id."'";
        $connection=$this->__restriccionesConnection->__GetConnection();
        $reslt=$connection->query($sql);
        if($reslt && $reslt->num_rows > 0){
            $Restricciones=$reslt->fetch_assoc();
        }else{
            $Restricciones=false;
        }
        $this->__restriccionesConnection->__CloseConnection();
        return $Restricciones;
    }

    //metodo para insertar restriccion
    public function insert($Restricciones){
        $sql="INSERT INTO Restricciones(IdRestriccion, TipoRestriccion, ValorRestriccion) 
        VALUES('".$Restricciones['IdRestriccion']."','".$Restricciones['IdPromocion']."','".$Restricciones['TipoRestriccion']."',
        '".$Restricciones['ValorRestriccion']."')";
        $connection =$this->__restriccionesConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        $this->__restriccionesConnection->__CloseConnection();
        return $res;
    }

    //metodo para editar Restriccion
    public function update($Restricciones){
        $sql="UPDATE Restricciones SET IdRestriccion='".$Restricciones['IdRestriccion']."', TipoRestriccion='".$Restricciones['TipoRestriccion']."', 
        ValorRestriccion='".$Restricciones['ValorRestriccion']."' WHERE IdRestriccion=".$Restricciones['IdRestriccion'];
        $connection =$this->__restriccionesConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        $this->__restriccionesConnection->__CloseConnection();
        return $res;
    }

    //metodo para eliminar una Restriccion por su ID
    public function delete($id){
        $sql="DELETE FROM Restricciones WHERE IdRestriccion=$id";
        $connection =$this->__restriccionesConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        $this->__restriccionesConnection->__CloseConnection();
        return $res;
    }
}
