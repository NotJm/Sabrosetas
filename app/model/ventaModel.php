<?php
class __ventaModel
{
    
    private $__ventaConnection;

    public function __construct(){
        //acceso a la base de datos
        require_once('app/config/dbconnection.php'); 
        $this->__ventaConnection=new __DataBaseConnection();
    }

    //metodo para obtener todas las ventas detalle
    public function getAll(){
        $sql="call ventaGETALL()";
        $connection =$this->__ventaConnection->__GetConnection();
        $result=$connection->query($sql);
        $Vdetalle=array();
        while($Folio=$result->fetch_assoc()){
            $Vdetalle[]=$Folio;
        }
        $this->__ventaConnection->__CloseConnection();
        return $Vdetalle;
    }

    //extraer una venta detalle por su id
    public function getById($id){
        $sql="SELECT * FROM VentaDetalle WHERE Folio='".$id."'";
        $connection=$this->__ventaConnection->__GetConnection();
        $reslt=$connection->query($sql);
        if($reslt && $reslt->num_rows > 0){
            $Vdetalle=$reslt->fetch_assoc();
        }else{
            $Vdetalle=false;
        }
        $this->__ventaConnection->__CloseConnection();
        return $Vdetalle;
    }

    //metodo para insertar Venta detalle
    public function insert($Vdetalle){
        $sql="INSERT INTO Vdetalle(Folio, IdVenta, IdProducto, Subtotal, Total
        ) 
        VALUES('".$Vdetalle['Folio']."','".$Vdetalle['IdVenta']."','".$Vdetalle['IdProducto']."',
        '".$Vdetalle['Subtotal']."','".$Vdetalle['Total']."')";
        $connection =$this->__ventaConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        $this->__ventaConnection->__CloseConnection();
        return $res;
    }

    //metodo para editar Venta Detalle
    public function update($Vdetalle){
        $sql="UPDATE Vdetalle SET Folio='".$Vdetalle['Folio']."', IdVenta='".$Vdetalle['IdVenta']."', 
        IdProducto='".$Vdetalle['IdProducto']."', Subtotal='".$Vdetalle['Subtotal']."', Total='".$Vdetalle['Total']."' 
        WHERE Folio=".$Vdetalle['Folio'];
        $connection =$this->__ventaConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        $this->__ventaConnection->__CloseConnection();
        return $res;
    }

    //metodo para eliminar una venta detalle por su id
    public function delete($id){
        $sql="call ventaDelete('{$id}')";
        $connection =$this->__ventaConnection->__GetConnection();
        $reslt = $connection->query($sql);
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        $this->__ventaConnection->__CloseConnection();
        return $res;
    }
}
