<?php

namespace modelo;

require_once '../entidad/Lugar.php';

Class Lugar {

    public $conexion;
    private $idLugar;
    private $nombre;
    private $disponibilidad;
    private $descripcion;
    private $presupuesto;
    private $cantidadPersonas;

    function __construct(\entidad\Lugar$Lugar) {
        $this->idLugar = $Lugar->getIdLugar();
        $this->nombre = $Lugar->getNombre();
        $this->disponibilidad = $Lugar->Disponibilidad();
        $this->presupuesto = $Lugar->getPresupuesto();
        $this->cantidadPersonas = $Lugar->getCantidadPersonas();
         $this->descripcion = $Lugar->getDescripcionescripcion();
        $this->conexion = new \Conexion();

        function adicionar() {
            $sentenciaSql = "INSERT INTO
      Lugar
         (
                    nombre
                   ,diponiblilidad
                   ,ldescripcion
                    ,presupuesto
                    ,cantidadPersonas
                     )
                 VALUES
                 (
   " . $this->nombre . "
    ,'$this->disponibilidad'
    ,'$this->ldescripcion'
    ,'$this->presupuesto'
    ,'$this->cantidadPersonas'
       )";
            $this->conexion->ejecutar($sentenciaSql);
        }

        function modificar() {
            $sentenciasql = "UPDATE
          Lugar
          SET
     nombre=".$this->nombre."
     diponiblilidad='$this->disponibilidad'
     ldescripcion='$this->ldescripcion'
     presupuesto='$this->presupuesto'
     cantidadPersonas='$this->cantidadPersonas'
WHERE
 idLugar='$this->idLugar'
";
            $this->conexion->ejecutar($sentenciaSql);
        }

        function eliminar() {
            $sentenciaSql = "DELETE FROM
       Lugar     
         WHERE
         idLugar = '$this->idLugar'
                 ";
            $this->conexion->ejecutar($sentenciaSql);
        }

        function consultar() {
          $sentenciaSql="  SELECT * Lugar from idLugar";
             $this->conexion->ejecutar($sentenciaSql);
        }

    }

}
