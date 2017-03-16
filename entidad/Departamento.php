<?php
namespace entidad;
class Departamento{
    
    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    private $idDepartamento;
    private $departamento;
    private $estado;
}