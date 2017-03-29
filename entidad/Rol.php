<?php
namespace entidad;
class Rol{
    
    private $idRol;
    private $nombreRol;
    private $estado;
    

    function getIdRol() {
        return $this->idRol;
    }
    function getNombreRol() {
        return $this->nombreRol;
    }
    function getEstado() {
        return $this->estado;
    }

    function setIdRol($idRol) {
        $this->idRol =$idRol;
    }

    function setNombreRol($nombreRol) {
        $this->nombreRol = $nombreRol;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}