<?php

namespace modelo;
require_once '../entidad/AsistenciaEvento.php';
require_once '../modelo/Evento.php';
require_once '../modelo/VerificacionAsistentes.php';

class AsistenciaEvento{
    public $conexion;
    
    private $idAsistenciaEvento;
    private $idAsistenteEventoFK;
    private $idEventoFK;
    private $tomarAsistencia;
    
    function __construct(\entidad\AsistenciaEvento $asistencia, $conexion = null) {
        $this->idAsistenciaEvento = $asistencia->getIdAsistenciaEvento();
        $this->idAsistenteEventoFK = $asistencia->getIdAsistenteEventoFK();
        $this->idEventoFK = $asistencia->getIdEventoFK();
        $this->tomarAsistencia = $asistencia->getTomarAsistencia();
        
        if($conexion == null){
            $this->conexion = new \Conexion();
        } else {
            $this->conexion = $conexion;
        }
    }
    
    function adicionar(){
        $sentenciaSql = "INSERT INTO 
                            AsistenciaEvento
                        (
                            idAsistenteEventoFK,
                            idEventoFK,
                            tomarAsistencia
                        )
                        VALUES
                        (
                            ".$this->idAsistenteEventoFK.",
                            ".$this->idEventoFK.",
                            '$this->tomarAsistencia'
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
}
