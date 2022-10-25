<?php

include_once ("connect_data.php");
include_once ("componentes_class.php");
include_once ("marca_model.php");

class componentes_model extends componentes_class {

    public $link;
    public $objMarca;

    public function OpenConnect() {
        
        $konDat=new connect_data();
        
        try {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
    
        } catch(Exception $e) {
            echo $e->getMessage();
        }
            
        $this->link->set_charset("utf8"); 
    }                   
 
    public function CloseConnect() {
         mysqli_close ($this->link);
    }



    public function getList() {
           $this->OpenConnect();   
           $sql = "SELECT * FROM componentes";  
           
           $result = $this->link->query($sql); 
           
           $list=array();
           
           while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               
               $newComp=new componentes_model(); // self() 
               $newComp->idComponente=$row['idComponente'];
               $newComp->nombre=$row['nombre'];
               $newComp->tipo=$row['tipo'];
               $newComp->stock=$row['stock'];
               $newComp->idMarca=$row['idMarca'];
             

               $newMarca=new marca_model(); 
               $newMarca->idMarca=$row['idMarca'];
               $newMarca->nombre=$row['nombre'];

               $newMarca->findIdMarca();
               $newComp->objMarca=$newMarca;
               

               array_push($list, $newComp);  
           }
          mysqli_free_result($result);
          $this->CloseConnect();
          return($list);
    }


    public function insert(){

        $this->OpenConnect();
     
        $nombre = $this->nombre;
        $tipo = $this->tipo;
        $stock = $this->stock;
        $idMarca = $this->idMarca;

        $sql = "INSERT INTO componentes(nombre, tipo, stock, idMarca) VALUES ('$nombre', '$tipo', $stock, $idMarca)";
        $this->link->query($sql);
        
        
        if ($this->link->affected_rows == 1)
        {
            $msg= $sql." Persona se ha insertado con exito. Num de inserts: ".$this->link->affected_rows;
        } else {
            $msg=$sql." Fallo al insertar una Persona nueva: (" . $this->link->errno . ") " . $this->link->error;
        }
        $this->CloseConnect();
        return $msg;
        
    }


    public function delete() {
     
        $this->OpenConnect();
     
        $idComponente=$this->idComponente;
        $sql = "DELETE FROM componentes WHERE componentes.idComponente=$idComponente";
        $this->link->query($sql);
     
        if ($this->link->affected_rows == 1){
            return "El libro se ha borrado con exito.Num borrados: ".$this->link->affected_rows;
     
        } else {
            return "Falla el borrado del libro: (" . $this->link->errno . ") " . $this->link->error;
     
        }
     
        $this->CloseConnect();
 }

    public function update1() {
        $this->OpenConnect();  

        $idComponente=$this->idComponente;
        $sql = "SELECT * FROM componentes WHERE componentes.idComponente=$idComponente";  

        $result = $this->link->query($sql); 

        $list=array();

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
            $newComp=new componentes_model(); // self() 
            $newComp->idComponente=$row['idComponente'];
            $newComp->nombre=$row['nombre'];
            $newComp->tipo=$row['tipo'];
            $newComp->stock=$row['stock'];
            $newComp->idMarca=$row['idMarca'];
  
            $newMarca=new marca_model(); 
            $newMarca->idMarca=$row['idMarca'];
            $newMarca->nombre=$row['nombre'];

            $newMarca->findIdMarca();
            $newComp->objMarca=$newMarca;

            array_push($list, $newComp);  
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return($list);
}





 

}