<?php
namespace entidad;
class RolFormulario{
    
    private $idRolFormulario;
    private $idFormulario;
    private $idRol;
    private $estado;
    

    function getIdRolFormulario() {
        return $this->idRolFormulario;
    }
    function getIdFormulario() {
        return $this->idFormulario;
    }
     function getidRol() {
        return $this->idRol;
    }
    function getEstado() {
        return $this->estado;
    }

    function setIdRolFormulario($idRolFormulario) {
        $this->idRolFormulario =$idRolFormulario;
    }

    function setIdFormulario($idFormulario) {
        $this->idFormulario = $idFormulario;
    }

    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}