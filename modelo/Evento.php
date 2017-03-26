<?php
namespace modelo;
require_once '../entorno/Conexion.php';
require_once '../entidad/Evento.php';
require_once '../modelo/Lugar.php';
require_once '../modelo/DatosPersonales.php';

class Evento
{
    public $conexion;
    
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
    
    function __construct(\Entidad\Evento $evento)
    {
        $this->idEvento = $evento->getIdEvento();
        $this->lugarFK = $evento->getLugarFK();
        $this->datosPersonalesFK = $evento->getDatosPersonalesFK();
        $this->categoriaFK = $evento->getCategoriaFK();
        $this->nombreEvento = $evento->getNombreEvento();
        $this->fechaInicial = $evento->getFechaInicial();
        $this->fechaFinal = $evento->getFechaFinal();
        $this->horaInicial = $evento->getHoraInicial();
        $this->horaFinal = $evento->getHoraFinal();
        $this->cantidadAsistentes = $evento->getCantidadAsistentes();
        $this->descripcionEvento = $evento->getDescripcionEvento();
        $this->estadoEvento = $evento->getEstadoEvento();
        
        $this->conexion = new \Conexion();
    }
    
    function adicionar(){
        $sentenciaSql= "INSERT INTO
                            evento
                        (
                            idLugarFK
                            , idDatosPersonalesFK
                            , idCategoriaFK
                            , nombreEvento
                            , fechaInicial
                            , fechaFinal
                            , horaInicial
                            , horaFinal
                            , cantidadAsistentes
                            , descripcionEvento
                            , estadoEvento
                        )
                        VALUES
                        (
                            ".$this->lugarFK->getIdLugar()."
                            , ".$this->datosPersonalesFK->getIdDatosPersonales()."
                            , ".$this->categoriaFK->getIdCategoria()."
                            , '$this->nombreEvento'
                            , '$this->fechaInicial'
                            , '$this->fechaFinal'
                            , '$this->horaInicial'
                            , '$this->horaFinal'
                            , '$this->cantidadAsistentes'
                            , '$this->descripcionEvento'
                            , '$this->estadoEvento'
                        )";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function modificar(){
        $sentenciaSql= "UPDATE
                            evento
                        SET
                            idLugarFK = ".$this->lugarFK->getLugarFK()."
                            , idDatosPersonalesFK = ".$this->datosPersonalesFK->getDatosPersonalesFK()."
                            , idCategoriaFK = ".$this->categoriaFK->getCategoriaFK()."
                            , nombreEvento = '$this->nombreEvento'
                            ' fechaInicial = '$this->fechaInicial'
                            ' fechaFinal = '$this->fechaInicial'
                            , horaInicial = '$this->horaInicial'
                            , horaFinal = '$this->horaFinal'
                            ' cantidadAsistentes = '$this->cantidadAsistentes'
                            ' descripcionEvento = '$this->descripcionEvento'
                            , estadoEvento = '$this->estadoEvento'
                        WHERE
                            idEvento = $this->idEvento
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function eliminar(){
        $sentenciaSql= "UPDATE 
                            evento
                        SET
                            estadoEvento = $this->estadoEvento
                        WHERE
                            idEvento = $this->idEvento
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }

    function consultar()
    {
        $condicion = $this->obtenerCondicion();
        $sentenciaSql= "SELECT 
                            e.*
                            , l.nombre AS lugarFK
                            , dp.nombre AS datosPersonalesFK
                            , c.nombreCategoria AS categoriaFK
                        FROM 
                            evento AS e
                            INNER JOIN lugar AS l ON e.idLugarFK = l.idLugar
                            INNER JOIN datospersonales AS dp ON e.idDatosPersonalesFK = dp.idDatosPersonales
                            INNER JOIN categoria AS c ON e.idCategoriaFK = c.idCategoria
                        $condicion
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarAjax($valor, $limite = ''){
        $sentenciaSql = "SELECT
                            e.idEvento
                            ,e.nombreEvento
                        FROM
                            evento AS e
                        WHERE e.nombreEvento LIKE '%$valor%'
                        $limite";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarAsistentes($idEvento){
        $sentenciaSql = "SELECT 
                            idAsistenteEvento
                            , nombre
                            , apaterno
                            , amaterno
                            , tipoDocumento
                            , numeroDocumento
                            , telefono
                            , estado
                        FROM
                            asistenteEvento
                        WHERE 
                            idEventoFK = $idEvento
                            and estado <> 'CANCELADO'
                        ";
        $this->conexion->ejecutar($sentenciaSql);     
    }
    
    function obtenerEvento($idEvento){
        $sentenciaSql = "SELECT nombreEvento,fechaInicial,horaInicial,horaFinal FROM evento WHERE idEvento = ".$idEvento;
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function obtenerCondicion()
    {
        $condicion = '';
        $whereAnd = ' WHERE ';
        
        if($this->idEvento != '')
        {
            $condicion = $condicion.$whereAnd." e.idEvento = ".$this->idEvento;
            $whereAnd = ' AND ';
        }
        
        if($this->lugarFK->getIdLugar() != '')
        {
            $condicion = $condicion.$whereAnd." e.idLugarFK = ".$this->lugarFK->getIdLugar();
            $whereAnd = ' AND ';
        }
        
        if($this->datosPersonalesFK->getIdDatosPersonales() != '')
        {
            $condicion = $condicion.$whereAnd." e.idDatosPersonalesFK  = ".$this->datosPersonalesFK->getIdDatosPersonales();
            $whereAnd = ' AND ';
        }
        
        if($this->categoriaFK->getIdCategoria() != '')
        {
            $condicion = $condicion.$whereAnd." e.idCategoriaFK = ".$this->categoriaFK->getIdCategoria();
            $whereAnd = ' AND ';
        }
        
        return $condicion;
    }
}