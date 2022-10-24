<?php

class usuario_class
{
    public $id;
    public $correo;
    public $contrasena;
    public $admin;
    
    function getId() {
        return $this->id;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }


    
    
}