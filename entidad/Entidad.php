<?php
namespace entidad;
require_once '../entidad/Lugar.php';
require_once '../entidad/DatosPersonales.php';
require_once '../entidad/Categoria.php';
class Evento 
{
    private $idEvento;    
    private $lugarFK;
    private $datosPersonalesFK;
    private $categoriaFK;
    private $nombreEvento;
    private $fechaInicial;
    private $fechaFinal;
    private $horaInicial;
    private $horaFinal;
    private $cantidadAsistentes;
    private $descripcionEvento;
    private $estadoEvento;
    
    function getIdEvento() {
        return $this->idEvento;
    }

    function getLugarFK() {
        return $this->lugarFK;
    }

    function getDatosPersonalesFK() {
        return $this->datosPersonalesFK;
    }

    function getCategoriaFK() {
        return $this->categoriaFK;
    }

    function getNombreEvento() {
        return $this->nombreEvento;
    }

    function getFechaInicial() {
        return $this->fechaInicial;
    }

    function getFechaFinal() {
        return $this->fechaFinal;
    }

    function getHoraInicial() {
        return $this->horaInicial;
    }

    function getHoraFinal() {
        return $this->horaFinal;
    }

    function getCantidadAsistentes() {
        return $this->cantidadAsistentes;
    }

    function getDescripcionEvento() {
        return $this->descripcionEvento;
    }

    function getEstadoEvento() {
        return $this->estadoEvento;
    }

    function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    function setLugarFK(\entidad\Lugar $lugarFK) {
        $this->lugarFK = $lugarFK;
    }

    function setDatosPersonalesFK(\entidad\DatosPersonales $datosPersonalesFK) {
        $this->datosPersonalesFK = $datosPersonalesFK;
    }

    function setCategoriaFK(\entidad\Categoria $categoriaFK) {
        $this->categoriaFK = $categoriaFK;
    }

    function setNombreEvento($nombreEvento) {
        $this->nombreEvento = $nombreEvento;
    }

    function setFechaInicial($fechaInicial) {
        $this->fechaInicial = $fechaInicial;
    }

    function setFechaFinal($fechaFinal) {
        $this->fechaFinal = $fechaFinal;
    }

    function setHoraInicial($horaInicial) {
        $this->horaInicial = $horaInicial;
    }

    function setHoraFinal($horaFinal) {
        $this->horaFinal = $horaFinal;
    }

    function setCantidadAsistentes($cantidadAsistentes) {
        $this->cantidadAsistentes = $cantidadAsistentes;
    }

    function setDescripcionEvento($descripcionEvento) {
        $this->descripcionEvento = $descripcionEvento;
    }

    function setEstadoEvento($estadoEvento) {
        $this->estadoEvento = $estadoEvento;
    }


}