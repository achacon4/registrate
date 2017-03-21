<?php
namespace modelo;
require_once '../entidad/DatosPersonales.php';
require_once '../entorno/Conexion.php';
class DatosPersonales{
    
    public $conexion;
    
    private $idDatosPersonales;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $tipoDocumento;
    private $numeroDocumento;
    private $email;
    private $telefono;
    private $estado;
    
    
     function __construct(\entidad\DatosPersonales $datosPersonales, $conexion = null) {
        $this->idDatosPersonales = $datosPersonales->getIdDatosPersonales();
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
      function adicionar(){
        $sentenciaSql= "INSERT INTO
                            datospersonales
                        (
                            nombre
                            ,apaterno
                            ,amaterno
                            ,tipoDocumento
                            ,numeroDocumento
                            ,email
                            ,telefono
                            ,estado

                        )
                        VALUES
                        (
                            '$this->nombre'
                            ,'$this->apaterno'
                            ,'$this->amaterno'
                            ,'$this->tipoDocumento'
                            ,'$this->numeroDocumento'
                            ,'$this->email'
                            ,'$this->telefono'
                            ,'$this->estado'
                        )";
        $this->conexion->ejecutar($sentenciaSql);
       
    }
    
     function eliminar(){
        $sentenciaSql= " DELETE FROM
                            datospersonales
                        WHERE
                            idDatosPersonales = $this->idDatosPersonales
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
   
    function consultar(){
       $condicion = $this->obtenerCondicion();
        $sentenciaSql= "SELECT 
                          *
                        FROM 
                          datospersonales
                        $condicion";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function modificar(){
        $sentenciaSql= "UPDATE
                            datospersonales
                        SET
                            nombre= '$this->nombre'
                            ,apaterno='$this->apaterno'
                            ,amaterno='$this->amaterno'
                            ,tipoDocumento='$this->tipoDocumento'
                            ,numeroDocumento='$this->numeroDocumento'
                            ,email='$this->email'
                            ,telefono='$this->telefono'
                            ,estado='$this->estado'

                        WHERE
                            idDatosPersonales = $this->idDatosPersonales
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
