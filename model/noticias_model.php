<?php
include_once ("connect_data.php");
include_once ("noticias_class.php");

class noticias_model extends noticias_class{

private $link;  // datu basera lotura - enlace a la bbdd     
    
public function OpenConnect(){

    $konDat=new connect_data();
    try{
        $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
        // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
        // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
    //databasearen artean UTF -8 erabiltzera datuak trukatzeko
}                   
         
public function CloseConnect(){
    mysqli_close ($this->link);
}

public function setNoticia()
{
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $sql="SELECT * FROM noticias";
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
                    // se guarda en result toda la informacion solicitada a la bbdd
        $list = array();
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new noticias_class();
            
            $new->setIdNoticia($row['id_noticia']);
            $new->setImagenNoticia($row['imagenNoticia']);
            $new->setTitulo($row['titulo']);
            $new->setFecha($row['fecha']);
            $new->setTexto($row['texto']);


            array_push($list, $new);   
        }
       mysqli_free_result($result); 
       $this->CloseConnect();
       return $list;
 }


}
