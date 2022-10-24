<?php
class noticias_class{
    public $idNoticia;
    public $imagenNoticia;
    public $titulo;
    public $fecha;
    public $texto;

    function getIdNoticia(){
        return $this->idNoticia;
    }

    function getImagenNoticia(){
        return $this->imagenNoticia;
    }

    function getTitulo(){
        return $this->titulo;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getTexto(){
        return $this->texto;
    }

    function setIdNoticia($idNoticia){
        $this->idNoticia = $idNoticia;
    }

    function setImagenNoticia($imagenNoticia){
        $this->imagenNoticia = $imagenNoticia;
    }

    function setTitulo($titulo){
        $this->titulo = $titulo; 
    }

    function setFecha($fecha){
        $this->fecha = $fecha;
    }

    function setTexto($texto){
        $this->texto = $texto;
    }
}
