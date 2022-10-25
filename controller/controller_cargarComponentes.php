<?php
include_once ("../model/componentes_model.php");

$compo= new componentes_model();
$response=array();

$response['list']=$compo->getList(); 
$response['error']="no error"; 

echo json_encode($response);
unset ($compo);