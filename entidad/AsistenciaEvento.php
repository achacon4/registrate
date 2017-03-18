<?php

namespace entidad;
require_once '../entidad/VerificacionAsistentes.php';
require_once '../entidad/Evento.php';

class AsistenciaEvento{
    
    private $idAsistenciaEvento;
    private $idAsistenteEventoFK;
    private $idEventoFK;
    private $tomarAsistencia;
    
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

    function setIdAsistenteEventoFK(\entidad\VerificacionAsistentes $idAsistenteEventoFK) {
        $this->idAsistenteEventoFK = $idAsistenteEventoFK;
    }

    function setIdEventoFK(\entidad\Evento $idEventoFK) {
        $this->idEventoFK = $idEventoFK;
    }

    function setTomarAsistencia($tomarAsistencia) {
        $this->tomarAsistencia = $tomarAsistencia;
    }
}

