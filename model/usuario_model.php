<?php
include_once ("connect_data.php");  
include_once ("usuario_class.php");

class usuario_model extends usuario_class
{
private $link;   

public function OpenConnect(){
    $konDat=new connect_data();
    try{
         $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);

    }
    catch(Exception $e){
   	 echo $e->getMessage();
    }

    $this->link->set_charset("utf8"); 
}                   
	 
public function CloseConnect(){
     mysqli_close ($this->link);
}



/*BUSCAR USUARIO*/
public function buscarUsuario(){

    $this->OpenConnect();
    $correo=$this->correo;
    $pasahitza=$this->contrasena;

    $sql="SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$pasahitza'";
    
    $result = $this->link->query($sql);
    $list = array();

    if ($this->link->affected_rows == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
            $new=new usuario_class();
                
            $new->setId($row['id']);
            $new->setCorreo($row['correo']);
            $new->setContrasena($row['contrasena']);
            $new->setAdmin($row['admin']);
             
            array_push($list, $new);
        }
        mysqli_free_result($result);
    
    } else {
        return "Falla al acceder a la cuenta:";
    }
    $this->CloseConnect();
    return $list;

}


public function insertar()
 {
     $this->OpenConnect();  
     
     $correo = $this->correo;
     $pasahitza = $this->contrasena;

     $sql = "CALL spInsert('$correo', '$pasahitza')";
     $this->link->query($sql);
     
     
     if ($this->link->affected_rows == 1)
     {
         $msg= $sql." Cuenta creada sin problemas: ".$this->link->affected_rows;
     } else {
         $msg=$sql." No se ha podido crear una nueva cuenta: (" . $this->link->errno . ") " . $this->link->error;
     }
     $this->CloseConnect();
     return $msg;
     
 }

}