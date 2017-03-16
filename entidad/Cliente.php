<?php
namespace entidad;
require_once '../entidad/Municipio.php';

class Cliente{
    private $idCliente;
    private $numeroIdentificacion;
    private $cliente;
    private $municipioResidencia;
    private $fechaNacimiento;
    private $estado;
    private $municipioNegocio;
    private $telefonos = array();
    
    function getMunicipioResidencia() {
        return $this->municipioResidencia;
    }

    function getMunicipioNegocio() {
        return $this->municipioNegocio;
    }

    function setMunicipioResidencia(\entidad\Municipio $municipioResidencia) {
        $this->municipioResidencia = $municipioResidencia;
    }

    function setMunicipioNegocio(\entidad\Municipio $municipioNegocio) {
        $this->municipioNegocio = $municipioNegocio;
    }
    
    function getIdCliente() {
        return $this->idCliente;
    }

    function getNumeroIdentificacion() {
        return $this->numeroIdentificacion;
    }

    function getCliente() {
        return $this->cliente;
    }

    

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getEstado() {
        return $this->estado;
    }

    

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setNumeroIdentificacion($numeroIdentificacion) {
        if(strlen($numeroIdentificacion) > 10){
            throw new Exception("La cantidad de caract�res supera la permitida: ");
        }
        $this->numeroIdentificacion = $numeroIdentificacion;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    function getTelefonos() {
        return $this->telefonos;
    }

    function setTelefonos($telefonos) {
        $this->telefonos = $telefonos;
    }
    
}