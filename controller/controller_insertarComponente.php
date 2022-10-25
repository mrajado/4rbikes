<?php
include_once ("../model/componentes_model.php");

$data=json_decode(file_get_contents("php://input"),true);
$compo= new componentes_model();

$compo->nombre=$data['nombre'];
$compo->tipo=$data['tipo'];
$compo->stock=$data['stock'];
$compo->idMarca=$data['idMarca'];

$response=array();
$response['error']=$compo->insert();

echo json_encode($response);
unset($compo);