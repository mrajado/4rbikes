<?php
include_once ("../model/componentes_model.php");

$datos=json_decode(file_get_contents("php://input"),true);
$compo=new componentes_model();


$compo->idComponente = $datos['idComponente'];
$response = array();

if ($compo ->idComponente!=null){
    
    $compo->setIdComponente($compo->idComponente);
    $response['error']=$compo->delete();
    
} else {
    $response['error']="Ez da id pasatu/No se ha pasado id, tio";
}

echo json_encode($response);