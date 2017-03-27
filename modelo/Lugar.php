<?php

namespace modelo;

require_once '../entorno/Conexion.php';
require_once '../entidad/Lugar.php';

Class Lugar {

    public $conexion;
    private $idLugar;
    private $nombre;
    private $disponibilidad;
    private $descripcion;
    private $presupuesto;
    private $cantidadPersonas;

    function __construct(\entidad\Lugar $Lugar, $conexion = null) {
        $this->idLugar = $Lugar->getIdLugar();
        $this->nombre = $Lugar->getNombre();
        $this->disponibilidad = $Lugar->getDisponibilidad();
        $this->descripcion = $Lugar->getDescripcion();
        $this->presupuesto = $Lugar->getPresupuesto();
        $this->cantidadPersonas = $Lugar->getCantidadPersonas();


        if($conexion == null)
            $this->conexion = new \Conexion();
        else
            $this->conexion = $conexion;
    }

   function adicionar()
    {
            $sentenciaSql = "INSERT INTO lugar
                                    (
                                      nombre,
                                      disponibilidad,
                                      descripcion,
                                      presupuesto,
                                      cantidadPersonas
                                    )
                                    VALUES
                                    (
                                    '$this->nombre',
                                    '$this->disponibilidad',
                                    '$this->descripcion',
                                    '$this->presupuesto',
                                    '$this->cantidadPersonas'
                                    )";

                $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarAjax($valor, $limite = ''){
        $sentenciaSql = "SELECT 
                                e.idLugar,
                                e.nombre
                         FROM
                            lugar AS e WHERE e.nombre LIKE '%$valor%'
                            $limite";
        $this->conexion->ejecutar($sentenciaSql);
    }

    function modificar(){
        $sentenciaSql= "UPDATE
                            lugar
                        SET
                            nombre='$this->nombre'
                            ,disponibilidad='$this->disponibilidad'
                            ,descripcion='$this->descripcion' 
                            ,presupuesto='$this->presupuesto'
                            ,cantidadPersonas='$this->cantidadPersonas'

                        WHERE
                            idLugar = $this->idLugar
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }

    function eliminar() {
        $sentenciaSql = "DELETE FROM
                            lugar     
                        WHERE
                            idLugar = '$this->idLugar'
                         ";
        $this->conexion->ejecutar($sentenciaSql);
    }

    function consultar() {
        $condicion = $this->obtenerCondicion();
        $sentenciaSql = "SELECT * FROM lugar $condicion";
        $this->conexion->ejecutar($sentenciaSql);
    }
         function obtenerLugar(){
         $sentenciaSql = "SELECT * FROM lugar";
         $this->conexion->ejecutar($sentenciaSql);
     }
        function obtenerCondicion(){
        $condicion = '';
        $whereAnd = ' WHERE ';
        if($this->idLugar != ''){
            $condicion = $condicion.$whereAnd." idLugar = ".$this->idLugar;
            $whereAnd = ' AND ';
        }
        if($this->nombre != ''){
            $condicion = $condicion.$whereAnd." nombre LIKE '%".$this->nombre."%'";
            $whereAnd = ' AND ';
        }
        if($this->disponibilidad != ''){
            $condicion = $condicion.$whereAnd." disponibilidad = '".$this->disponibilidad."'";
            $whereAnd = ' AND ';
        }
        if($this->descripcion != ''){
            $condicion = $condicion.$whereAnd." descripcion = ".$this->descripcion;
            $whereAnd = ' AND ';
        }
        if($this->presupuesto != ''){
            $condicion = $condicion.$whereAnd." presupuesto = ".$this->presupuesto;
            $whereAnd = ' AND ';
        }
       if($this->cantidadPersonas != ''){
            $condicion = $condicion.$whereAnd." cantidadPersonas = ".$this->cantidadPersonas;
            $whereAnd = ' AND ';
        }
        return $condicion;
    }
}