<?php

class VerificacionAsistente{
    private $idAsistenteEvento;
    private $idEventoFK;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $tipoDocumento;
    private $numeroDocumento;
    private $email;
    private $telefono;
    
    function getIdAsistenteEvento() {
        return $this->idAsistenteEvento;
    }

    function getIdEventoFK() {
        return $this->idEventoFK;
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

    function setIdAsistenteEvento($idAsistenteEvento) {
        $this->idAsistenteEvento = $idAsistenteEvento;
    }

    function setIdEventoFK($idEventoFK) {
        $this->idEventoFK = $idEventoFK;
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


}

