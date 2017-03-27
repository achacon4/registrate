<?php

namespace modelo;
require_once '../entorno/Conexion.php';
require_once '../entidad/AsistenciaEvento.php';
require_once '../modelo/AsistenteEvento.php';

class AsistenciaEvento{
    public $conexion;
    
    private $idAsistenciaEvento;
    private $idAsistenteEventoFK;
    private $idEventoFK;
    private $tomarAsistencia;
    private $asistentes = array();
    
            
    function __construct(\entidad\AsistenciaEvento $asistencia, $conexion = null) {
        $this->idAsistenciaEvento = $asistencia->getIdAsistenciaEvento();
        $this->idAsistenteEventoFK = $asistencia->getIdAsistenteEventoFK();
        $this->idEventoFK = $asistencia->getIdEventoFK();
        $this->tomarAsistencia = $asistencia->getTomarAsistencia();
        
        $this->asistentes = $asistencia->getAsistentes();
        
        if($conexion == null){
            $this->conexion = new \Conexion();
        } else {
            $this->conexion = $conexion;
        }
    }
    
    function adicionar($asistencia){
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
        
        if(is_array($this->asistentes)){
            if(is_array($asistencia)){
                foreach ($asistencia as $indice => $tomarAsistencia){
                    $asistenciaE = new \entidad\AsistenciaEvento();
                    $asistenciaE->setIdAsistenteEventoFK($idAsistenteEventoFK['id']);
                }
            }
       }
       
       
    }
}
