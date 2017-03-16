<?php
namespace modelo; 
require_once '../entidad/Municipio.php';
require_once '../entorno/Conexion.php';

class Municipio{
    public $conexion;
    
    private $idMunicipio;
    private $municipio;
    private $departamento;
    private $estado;
    
    function __construct(\entidad\Municipio $municipio) {
        $this->idMunicipio = $municipio->getIdMunicipio();
        $this->municipio = $municipio->getMunicipio();
        $this->departamento = $municipio->getDepartamento();
        $this->estado = $municipio->getEstado();
        
        $this->conexion = new \Conexion();
    }
    function consultar(){
         $condicion = $this->obtenerCondicion();
        $sentenciaSql = "SELECT 
                            * 
                        FROM 
                            municipio  
                        $condicion
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    function consultarAjax($valor, $limite = ''){
        $sentenciaSql = "SELECT 
                            m.idMunicipio
                            , m.municipio
                            , d.departamento 
                        FROM 
                            municipio AS m 
                            INNER JOIN departamento AS d ON m.idDepartamento = d.idDepartamento
                         WHERE 
                            CONCAT(m.municipio, d.departamento)  LIKE '%$valor%'
                        $limite";
        $this->conexion->ejecutar($sentenciaSql);
    }
    function obtenerCondicion(){
        $condicion = '';
        $whereAnd = ' WHERE ';
        if($this->municipio != ''){
            $condicion = $condicion.$whereAnd." municipio LIKE '%".$this->municipio."%'";
            $whereAnd = ' AND ';
        }
        
        return $condicion;
    }
}
