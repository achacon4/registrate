<?php
namespace modelo;
require_once '../entorno/Conexion.php';
require_once '../entidad/ClienteTelefono.php';
class ClienteTelefono{
    public $conexion;
    
    private $idClienteTelefono;
    private $idCliente;
    private $tipo;
    private $numero;
    private $estado;
    
    function __construct(\entidad\ClienteTelefono $clienteTelefono, $conexion = null) {
        $this->idClienteTelefono = $clienteTelefono->getIdClienteTelefono();
        $this->idCliente = $clienteTelefono->getIdCliente();
        $this->tipo = $clienteTelefono->getTipo();
        $this->numero = $clienteTelefono->getNumero();
        $this->estado = $clienteTelefono->getEstado();
        
        if($conexion == null)
            $this->conexion = new \Conexion();
        else
            $this->conexion = $conexion;
    }
    function adicionar(){
        $sentenciaSql= "INSERT INTO
                            ClienteTelefono
                        (
                            idCliente
                            , tipo
                            , numero
                            , estado

                        )
                        VALUES
                        (
                            $this->idCliente
                            ,'$this->tipo'
                            ,$this->numero
                            ,'$this->estado'
                        )";
        $this->conexion->ejecutar($sentenciaSql);
    }
    function eliminar(){
        $sentenciaSql= "DELETE FROM
                            ClienteTelefono
                        WHERE
                            idClienteTelefono = $this->idClienteTelefono";
        $this->conexion->ejecutar($sentenciaSql);
    }
    function consultar(){
        $sentenciaSql= "SELECT
                            *
                        FROM
                            ClienteTelefono
                        WHERE
                            idCliente = $this->idCliente";
        $this->conexion->ejecutar($sentenciaSql);
    }
}