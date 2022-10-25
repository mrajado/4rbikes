<?php
include_once ("../model/marca_model.php");

$marca= new marca_model();
$response=array();

$response['list']=$marca->mandarMarca(); 
$response['error']="no error"; 

echo json_encode($response);
unset ($marca);