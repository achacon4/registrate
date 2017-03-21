<?php

namespace entidad;
require_once '../entidad/RegistroAsistente.php';
require_once '../modelo/Evento.php';

class AsistenciaEvento{
    
    private $idAsistenciaEvento;
    private $idAsistenteEventoFK;
    private $idEventoFK;
    private $tomarAsistencia;
    private $asistentes = array();
    
    function getAsistentes() {
        return $this->asistentes;
    }

    function setAsistentes($asistentes) {
        $this->asistentes = $asistentes;
    }

        function getIdAsistenciaEvento() {
        return $this->idAsistenciaEvento;
    }

    function getIdAsistenteEventoFK() {
        return $this->idAsistenteEventoFK;
    }

    function getIdEventoFK() {
        return $this->idEventoFK;
    }

    function getTomarAsistencia() {
        return $this->tomarAsistencia;
    }

    function setIdAsistenciaEvento($idAsistenciaEvento) {
        $this->idAsistenciaEvento = $idAsistenciaEvento;
    }

    function setIdAsistenteEventoFK(\entidad\RegistroAsistente $idAsistenteEventoFK) {
        $this->idAsistenteEventoFK = $idAsistenteEventoFK;
    }

    function setIdEventoFK(\entidad\Evento $idEventoFK) {
        $this->idEventoFK = $idEventoFK;
    }

    function setTomarAsistencia($tomarAsistencia) {
        $this->tomarAsistencia = $tomarAsistencia;
    }
}

