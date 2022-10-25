<?php

include_once ("connect_data.php");
include_once ("marca_class.php");
include_once ("componentes_model.php");

class marca_model extends marca_class {

    private $link;
   
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



    public function findIdMarca() {
        $idMarca=$this->idMarca;
        
        $this->OpenConnect();  
        $sql = "CALL spFindIdMarca($idMarca)";
               
        $result=$this->link->query($sql);    
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                       
        $this->idMarca=$row['idMarca'];
        $this->nombre=$row['nombre'];
         
       
        mysqli_free_result($result); 
        $this->CloseConnect();
    }   

    
    public function mandarMarca() {

        $this->OpenConnect();   
           $sql = "SELECT * FROM marca";  
           
           $result = $this->link->query($sql); 
           
           $list=array();
           
           while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             
               $newMarca=new marca_model(); 
               $newMarca->idMarca=$row['idMarca'];
               $newMarca->nombre=$row['nombre'];
               

               array_push($list, $newMarca);  
           }
          mysqli_free_result($result);
          $this->CloseConnect();
          return($list);
    }






}