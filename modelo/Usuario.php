<?php
namespace modelo; 
require_once '../entidad/Usuario.php';
require_once '../entorno/Conexion.php';

class Usuario{
     public $conexion;
    
     private $idUsuario;
     private $idDatosPersonales;
     private $usuario;
     private $contrasenia;
     private $estado; 
    
    function __construct(\entidad\Usuario $usuario, $conexion = null) {
        $this->idDatosPersonales = $usuario->getIdDatosPersonales();
        $this->idUsuario = $usuario->getIdUsuario();
        $this->usuario =$usuario->getUsuario();
        $this->contrasenia = $usuario->getContrasenia();
        $this->estado=$usuario->getEstado();
        
        if ($conexion == null)
            $this->conexion = new \Conexion();
        else
            $this->conexion = $conexion;
    }
    
    function adicionar() {
        $sentenciaSql = "INSERT INTO
                        usuario
                        (
                          idDatosPersonalesFK
                          ,usuario
                          ,contrasenia
                          ,estado
                         )
                        VALUES
                         (
                            ".$this->idDatosPersonales."
                            ,'$this->usuario'
                            ,'".md5($this->contrasenia)."'
                            ,'$this->estado'
                         )";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function eliminar() {
        $sentenciaSql = "DELETE FROM
                                   usuario
                                 WHERE
                                  idUsuario = $this->idUsuario
                                 ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function modificar(){
        $sentenciaSql = "UPDATE
                        usuario
                        SET
                          usuario = '$this->usuario'
                          , estado = '$this->estado'
                        WHERE
                            idUsuario = $this->idUsuario
                          ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function modificarContrasenia(){
        $sentenciaSql = "UPDATE
                        usuario
                        SET
                          contrasenia = '".md5($this->contrasenia)."'
                        WHERE
                            idUsuario = $this->idUsuario
                          ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultar() {
        $condicion = $this->obtenerCondicion();
        $sentenciaSql = "SELECT
                            u.*
                            ,dp.nombre AS nombre
                            ,dp.apaterno AS apaterno
                            ,dp.amaterno AS amaterno
                        FROM
                            usuario AS u
                            INNER JOIN datospersonales AS dp ON u.idDatosPersonalesFK = dp.idDatosPersonales
                            $condicion
                            ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarAjax($valor, $limite = ''){
        $sentenciaSql = "SELECT
                               dp.idDatosPersonales 
                               , dp.nombre
                               , dp.apaterno
                               , dp.amaterno
                         FROM 
                               datospersonales AS dp
                         WHERE
                               CONCAT(dp.nombre, dp.apaterno, dp.amaterno) LIKE '%$valor%' AND dp.estado = 'A'
                               $limite";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function obtenerCondicion() {
        $condicion = '';
        $whereAnd = ' WHERE ';

        if ($this->idUsuario != '') {
            $condicion = $condicion . $whereAnd . "u.idUsuario = " . $this->idUsuario;
            $whereAnd = ' AND ';
        }
        
        if ($this->idDatosPersonales != '') {
            $condicion = $condicion . $whereAnd . "u.idDatosPersonalesFK = " . $this->idDatosPersonales;
            $whereAnd = ' AND ';
        }
        
        if ($this->usuario != '') {
            $condicion = $condicion . $whereAnd . "u.usuario = '" .$this->usuario. "'";
            $whereAnd = ' AND ';
        }
        if ($this->estado != '') {
            $condicion = $condicion . $whereAnd . "u.estado = '" . $this->estado . "'";
            $whereAnd = ' AND ';
        }
        return $condicion;
    }
}