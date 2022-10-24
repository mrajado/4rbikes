<?php

include_once ("../model/noticias_model.php");

$noticia= new noticias_model();

$list=array();
$list['list']=$noticia->setNoticia();
$list['error']="not error"; 

echo json_encode($list);

unset ($noticia);