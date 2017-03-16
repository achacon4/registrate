<?php
namespace modelo;
require_once '../entorno/Conexion.php';
require_once '../entidad/Cliente.php';
require_once '../modelo/ClienteTelefono.php';
class Cliente{
    public $conexion;
    
    private $idCliente;
    private $numeroIdentificacion;
    private $cliente;
    private $municipioResidencia;
    private $fechaNacimiento;
    private $estado;
    private $municipioNegocio;
    private $telefonos = array();
    
    function __construct(\entidad\Cliente $cliente, $conexion = null) {
        $this->idCliente = $cliente->getIdCliente();
        $this->numeroIdentificacion = $cliente->getNumeroIdentificacion();
        $this->cliente = $cliente->getCliente();
        $this->municipioResidencia = $cliente->getMunicipioResidencia();
        $this->fechaNacimiento = $cliente->getFechaNacimiento();
        $this->estado = $cliente->getEstado();
        $this->municipioNegocio = $cliente->getMunicipioNegocio();
        
        $this->telefonos = $cliente->getTelefonos();
        
        if($conexion == null)
            $this->conexion = new \Conexion();
        else
            $this->conexion = $conexion;
    }
    function adicionar(){
        $sentenciaSql= "INSERT INTO
                            cliente
                        (
                            numeroIdentificacion
                            ,cliente
                            ,idMunicipioResidencia
                            ,idMunicipioNegocio
                            ,fechaNacimiento
                            ,estado

                        )
                        VALUES
                        (
                            ".$this->numeroIdentificacion."
                            ,'$this->cliente'
                            ,".$this->municipioResidencia->getIdMunicipio()."
                            ,".$this->municipioNegocio->getIdMunicipio()."
                            ,'$this->fechaNacimiento'
                            ,'$this->estado'
                        )";
        $this->conexion->ejecutar($sentenciaSql);
        
        $this->idCliente = $this->obtenerId();
        
        foreach ($this->telefonos as $indice => $telefono) {
            $clienteTelefonoE = new \entidad\ClienteTelefono();
            $clienteTelefonoE->setIdCliente($this->idCliente);
            $clienteTelefonoE->setTipo($telefono['tipo']);
            $clienteTelefonoE->setNumero($telefono['numero']);
            $clienteTelefonoE->setEstado('A');
            
            $clienteTelefonoM = new \modelo\ClienteTelefono($clienteTelefonoE, $this->conexion);
            $clienteTelefonoM->adicionar();
        }
    }
    function modificar($telefonosEliminados){
        $sentenciaSql= "UPDATE
                            cliente
                        SET
                            numeroIdentificacion=".$this->numeroIdentificacion."
                            ,cliente='$this->cliente'
                            ,idMunicipioResidencia=".$this->municipioResidencia->getIdMunicipio()."
                            ,idMunicipioNegocio=".$this->municipioNegocio->getIdMunicipio()."
                            ,fechaNacimiento='$this->fechaNacimiento'
                            ,estado='$this->estado'

                        WHERE
                            idCliente = $this->idCliente
                        ";
        $this->conexion->ejecutar($sentenciaSql);
        if(is_array($this->telefonos)){
            foreach ($this->telefonos as $indice => $telefono) {
                if (!isset($telefono['id'])) {
                    $clienteTelefonoE = new \entidad\ClienteTelefono();
                    $clienteTelefonoE->setIdCliente($this->idCliente);
                    $clienteTelefonoE->setTipo($telefono['tipo']);
                    $clienteTelefonoE->setNumero($telefono['numero']);
                    $clienteTelefonoE->setEstado('A');

                    $clienteTelefonoM = new \modelo\ClienteTelefono($clienteTelefonoE, $this->conexion);
                    $clienteTelefonoM->adicionar();
                }            
            }
        }
        if(is_array($telefonosEliminados)){
            foreach ($telefonosEliminados as $indice => $telefonoEliminado) {
                $clienteTelefonoE = new \entidad\ClienteTelefono();
                $clienteTelefonoE->setIdClienteTelefono($telefonoEliminado['id']);

                $clienteTelefonoM = new \modelo\ClienteTelefono($clienteTelefonoE, $this->conexion);
                $clienteTelefonoM->eliminar();
            }
        }
    }
    function eliminar(){
        $sentenciaSql= "DELETE FROM
                            cliente
                        WHERE
                            idCliente = $this->idCliente
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    function consultar(){
        $condicion = $this->obtenerCondicion();
        $sentenciaSql= "SELECT 
                            c.*
                            , mr.municipio AS municipioResidencia
                            , mn.municipio AS municipioNegocio
                            , dn.departamento AS departamentoNegocio
                        FROM 
                            cliente AS c
                            INNER JOIN municipio AS mr ON c.idMunicipioResidencia = mr.idMunicipio
                            INNER JOIN municipio AS mn ON c.idMunicipioNegocio = mn.idMunicipio
                            INNER JOIN departamento AS dn ON mn.idDepartamento = dn.idDepartamento
                        $condicion
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    function obtenerCondicion(){
        $condicion = '';
        $whereAnd = ' WHERE ';
        if($this->idCliente != ''){
            $condicion = $condicion.$whereAnd." c.idCliente = ".$this->idCliente;
            $whereAnd = ' AND ';
        }
        if($this->numeroIdentificacion != ''){
            $condicion = $condicion.$whereAnd." c.numeroIdentificacion = ".$this->numeroIdentificacion;
            $whereAnd = ' AND ';
        }
        if($this->cliente != ''){
            $condicion = $condicion.$whereAnd." c.cliente LIKE '%".$this->cliente."%'";
            $whereAnd = ' AND ';
        }
        if($this->municipioResidencia->getIdMunicipio() != ''){
            $condicion = $condicion.$whereAnd." c.idMunicipioResidencia = ".$this->municipioResidencia->getIdMunicipio();
            $whereAnd = ' AND ';
        }
        if($this->municipioNegocio->getIdMunicipio() != ''){
            $condicion = $condicion.$whereAnd." c.idMunicipioNegocio = ".$this->municipioNegocio->getIdMunicipio();
            $whereAnd = ' AND ';
        }
        if($this->fechaNacimiento != ''){
            $condicion = $condicion.$whereAnd." c.fechaNacimiento = '".$this->fechaNacimiento."'";
            $whereAnd = ' AND ';
        }
        if($this->estado != ''){
            $condicion = $condicion.$whereAnd." c.estado = '".$this->estado."'";
            $whereAnd = ' AND ';
        }
        return $condicion;
    }
    function obtenerId() {
        $id = 0;
        $sentenciaSql = "SELECT MAX(idCliente) as id FROM cliente";
        $this->conexion->ejecutar($sentenciaSql);
        if($fila = $this->conexion->obtenerObjeto()){
            $id = $fila->id;
        }
        return $id;
    }
}