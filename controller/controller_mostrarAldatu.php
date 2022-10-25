<?php
include_once ("../model/componentes_model.php");
$datos=json_decode(file_get_contents("php://input"),true);

$compo= new componentes_model();
$response=array();


$compo->idComponente=$datos['leer'];

$response['list']=$compo->update1();
$response['error']="not error";

echo json_encode($response);
unset ($compo);