<?php
namespace entidad;
class ClienteTelefono{
    private $idClienteTelefono;
    private $idCliente;
    private $tipo;
    private $numero;
    private $estado;    
    function getIdClienteTelefono() {
        return $this->idClienteTelefono;
    }
    function getIdCliente() {
        return $this->idCliente;
    }
    function getTipo() {
        return $this->tipo;
    }
    function getNumero() {
        return $this->numero;
    }
    function getEstado() {
        return $this->estado;
    }
    function setIdClienteTelefono($idClienteTelefono) {
        $this->idClienteTelefono = $idClienteTelefono;
    }
    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setNumero($numero) {
        $this->numero = $numero;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
}