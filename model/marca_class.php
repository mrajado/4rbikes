<?php

class marca_class
{

    public $idMarca;
    public $nombre;

    function getIdMarca() {
        return $this->idMarca;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}