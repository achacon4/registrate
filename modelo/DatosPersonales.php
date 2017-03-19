<?php
require_once '../entidad/DatosPersonales.php';
require_once '../entorno/Conexion.php';
class DatosPersonales{
    
    public $conexion;
    
    private $idDatosPersonales;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $tipoDocumento;
    private $numeroDocumento;
    private $email;
    private $telefono;
    private $estado;
    
    
     function __construct(\entidad\DatosPersonales $datosPersonales, $conexion = null) {
        $this->idDatosPersonales = $datosPersonales->getIdDatosPersonales();
        $this->nombre = $datosPersonales->getNombre();
        $this->apaterno = $datosPersonales->getApaterno();
        $this->amaterno = $datosPersonales->getAmaterno();
        $this->tipoDocumento = $datosPersonales->getTipoDocumento();
        $this->numeroDocumento = $datosPersonales->getNumeroDocumento();
        $this->email = $datosPersonales->getEmail();
        $this->telefono = $datosPersonales->getTelefono();
        $this->estado = $datosPersonales->getEstado();
        
        if($conexion == null){
            $this->conexion = new \Conexion();
        }else{
            $this->conexion = $conexion;
         }
     }
      function adicionar(){
        $sentenciaSql= "INSERT INTO
                            datospersonales
                        (
                            nombre
                            ,apaterno
                            ,amaterno
                            ,tipoDocumento
                            ,numeroDocumento
                            ,email
                            ,telefono
                            ,estado

                        )
                        VALUES
                        (
                            ".$this->nombre."
                            ,'$this->apaterno'
                            ,".$this->amaterno."
                            ,".$this->tipoDocumento."
                            ,'$this->numeroDocumento'
                            ,'$this->email'
                            ,'$this->telefono'
                            ,'$this->estado'
                        )";
        $this->conexion->ejecutar($sentenciaSql);
       
    }
    
     function modificar(){
        $sentenciaSql= "UPDATE
                            datospersonales
                        SET
                            nombre=".$this->nombre."
                            ,apaterno='$this->apaterno'
                            ,amaterno=".$this->amaterno."
                            ,tipoDocumento=".$this->tipoDocumento."
                            ,numeroDocumento='$this->numeroDocumento'
                            ,email='$this->email'
                            ,telefono='$this->telefono'
                            ,estado='$this->estado'

                        WHERE
                            idDatosPersonales = $this->idDatosPersonales
                        ";
        $this->conexion->ejecutar($sentenciaSql);
     }
     
     function eliminar(){
        $sentenciaSql= "DELETE FROM
                            datospersonales
                        WHERE
                            idDatosPersonales = $this->idDatosPersonales
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultar(){
       
        $sentenciaSql= "SELECT 
                          *
                        FROM 
                          datospersonales
            
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
   
}
