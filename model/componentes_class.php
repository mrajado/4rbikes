<?php

class componentes_class
{

    public $idComponente;
    public $nombre;
    public $tipo;
    public $stock;
    public $idMarca;

    function getIdComponente() {
        return $this->idComponente;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getStock() {
        return $this->stock;
    }

    function getIdMarca() {
        return $this->idMarca;
    }


    function setIdComponente($idComponente) {
        $this->idComponente = $idComponente;
    }


    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }

}