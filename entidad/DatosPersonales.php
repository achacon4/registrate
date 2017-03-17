<?php
namespace entidad;
require_once '../entidad/DatosPersonales.php';

class DatosPersonales{
    private $idDatosPersonales;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $tipoDocumento;
    private $numeroDocumento;
    private $email;
    private $telefono;
    private $estado;
    function getIdDatosPersonales() {
        return $this->idDatosPersonales;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApaterno() {
        return $this->apaterno;
    }

    function getAmaterno() {
        return $this->amaterno;
    }

    function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdDatosPersonales($idDatosPersonales) {
        $this->idDatosPersonales = $idDatosPersonales;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApaterno($apaterno) {
        $this->apaterno = $apaterno;
    }

    function setAmaterno($amaterno) {
        $this->amaterno = $amaterno;
    }

    function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}


