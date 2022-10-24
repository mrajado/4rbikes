<?php
include_once ("../model/usuario_model.php");
$datos=json_decode(file_get_contents("php://input"),true);

$usuario = new usuario_model();
$response = array();

$usuario->correo=$datos['correo'];
$usuario->contrasena=$datos['pasahitza'];
   
$response['list']=$usuario->buscarUsuario();   
$response['error']="Correo o Clave erroneas";

echo json_encode($response);

unset($usuario);