<?php
namespace entidad;
class Municipio{
    
    private $idMunicipio;
    private $municipio;
    private $departamento;
    private $estado;
    
    function getDepartamento() {
        return $this->departamento;
    }

    function setDepartamento(\entidad\Departamento $departamento) {
        $this->departamento = $departamento;
    }
    function getIdMunicipio() {
        return $this->idMunicipio;
    }
    function getMunicipio() {
        return $this->municipio;
    }
    function getEstado() {
        return $this->estado;
    }

    function setIdMunicipio($idMunicipio) {
        $this->idMunicipio = $idMunicipio;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    

    function setEstado($estado) {
        $this->estado = $estado;
    }

    

}