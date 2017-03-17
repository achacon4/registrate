<?php


namespace entidad;

class Lugar {
    private $idLugar;
    private $nombre;
    private $disponibilidad;
    private $descripcion;
    private $presupuesto;
    private $cantidadPersonas;
    
    function getIdLugar() {
        return $this->idLugar;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDisponibilidad() {
        return $this->disponibilidad;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPresupuesto() {
        return $this->presupuesto;
    }

    function getCantidadPersonas() {
        return $this->cantidadPersonas;
    }

    function setIdLugar($idLugar) {
        $this->idLugar = $idLugar;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPresupuesto($presupuesto) {
        $this->presupuesto = $presupuesto;
    }

    function setCantidadPersonas($cantidadPersonas) {
        $this->cantidadPersonas = $cantidadPersonas;
    }


}
