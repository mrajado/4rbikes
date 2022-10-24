<?php
$data=json_decode(file_get_contents("php://input"),true);


$nombre=$data['nombre'];
$correo=$data['correo'];
$asunto=$data['asunto'];
$mensaje=$data['mensaje'];

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Iker Musatadi <i_musatadi@fpzornotza.com>\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: u_garcia@fpzornotza.com\r\n"; 

mail($correo,$asunto,$mensaje,$headers);

$response=array();

$response['error']="email enviado";
echo json_encode($response);
?>