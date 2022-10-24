<?php
include_once ("../model/usuario_model.php");

$datos=json_decode(file_get_contents("php://input"),true);
$usuario= new usuario_model();


$usuario->correo=$datos['correo'];
$usuario->contrasena=$datos['pasahitza'];

$response=array();
$response['error']=$usuario->insertar();

echo json_encode($response);
unset($usuario);