<?php
namespace modelo;
require_once '../entidad/AsistenteEvento.php';
require_once '../entorno/Conexion.php';
class ReporteAsistencia{
    
    public $conexion;
    
     private $idAsistenteEvento;
    private $idEventoFK;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $tipoDocumento;
    private $numeroDocumento;
    private $email;
    private $telefono;
    private $estado;
    
     function __construct(\entidad\AsistenteEvento $datosPersonales, $conexion = null) {
        $this->idAsistenteEvento = $datosPersonales->getIdAsistenteEvento();
        $this->idEventoFK = $datosPersonales->getIdEventoFK();
        $this->nombre = $datosPersonales->getNombre();
        $this->apaterno = $datosPersonales->getApaterno();
        $this->amaterno = $datosPersonales->getAmaterno();
        $this->tipoDocumento = $datosPersonales->getTipoDocumento();
        $this->numeroDocumento = $datosPersonales->getNumeroDocumento();
        $this->email = $datosPersonales->getEmail();
        $this->telefono = $datosPersonales->getTelefono();
        $this->estado = $datosPersonales->getEstado();
        
        if($conexion == null){
            $this->conexion = new \Conexion();
        }else{
            $this->conexion = $conexion;
         }
     }
     
    function consultarAsistenciaConfirmada(){
     
        $sentenciaSql= "SELECT 
                          *
                        FROM 
                          asistenteevento
                        WHERE
                            estado = 'CONFIRMADO'
                       ";

        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarAsistenciaNoConfirmada(){
        $sentenciaSql= "SELECT 
                          *
                        FROM 
                          asistenteevento
                        WHERE
                            estado = 'SIN CONFIRMAR'
                       ";

        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarAsistenciaCancelada(){
        $sentenciaSql= "SELECT 
                          *
                        FROM 
                          asistenteevento
                        WHERE
                            estado = 'CANCELADO'
                       ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
        function obtenerCondicion(){
        $condicion = '';
        $whereAnd = ' WHERE ';
        if($this->idDatosPersonales != ''){
            $condicion = $condicion.$whereAnd." idDatosPersonales = ".$this->idDatosPersonales;
            $whereAnd = ' AND ';
        }
        if($this->nombre != ''){
            $condicion = $condicion.$whereAnd." nombre LIKE '%".$this->nombre."%'";
            $whereAnd = ' AND ';
        }
        if($this->apaterno != ''){
            $condicion = $condicion.$whereAnd." apaterno = ".$this->apaterno;
            $whereAnd = ' AND ';
        }
        if($this->amaterno != ''){
            $condicion = $condicion.$whereAnd." amaterno = ".$this->amaterno;
            $whereAnd = ' AND ';
        }
        if($this->tipoDocumento != ''){
            $condicion = $condicion.$whereAnd." tipoDocumento = ".$this->tipoDocumento;
            $whereAnd = ' AND ';
        }
        if($this->numeroDocumento != ''){
            $condicion = $condicion.$whereAnd." numeroDocumento = ".$this->numeroDocumento;
            $whereAnd = ' AND ';
        }
        if($this->email != ''){
            $condicion = $condicion.$whereAnd." email = ".$this->email;
            $whereAnd = ' AND ';
        }
        if($this->telefono != ''){
            $condicion = $condicion.$whereAnd." telefono = ".$this->telefono;
            $whereAnd = ' AND ';
        }
        if($this->estado != ''){
            $condicion = $condicion.$whereAnd." estado = '".$this->estado."'";
            $whereAnd = ' AND ';
        }
        return $condicion;
    }    
}
