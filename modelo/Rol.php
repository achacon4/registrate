<?php
namespace modelo;
require_once '../entidad/Rol.php';
require_once '../entorno/Conexion.php';

class Rol{
    
    public $conexion;    
    private $idRol;
    private $nombre;
    private $estado;
    
     function __construct(\entidad\Rol $rol, $conexion = null) {
        $this->idRol = $rol->getIdRol();
        $this->nombre = $rol->getNombreRol();
        $this->estado = $rol->getEstado();
        
        if($conexion == null){
            $this->conexion = new \Conexion();
        }else{
            $this->conexion = $conexion;
         }
     }
     
     function actualizarRol(){
    //  echo "entro a actualizar";
        $sentenciaSql= "UPDATE
                        rol 
                        SET
                        rol = '$this->nombre',
                        estado = '$this->estado'
                        WHERE idRol = $this->idRol";

        $this->conexion->ejecutar($sentenciaSql);
     }

     function eliminarRol(){
     // echo "entro a eliminar";
        $sentenciaSql= "DELETE FROM                       
                          Rol
                        WHERE 
                        idRol = $this->idRol";

        $this->conexion->ejecutar($sentenciaSql);
     }


    function insertarRol(){    
    // json_encode("A".$this->nombre."".$this->estado); 
        $sentenciaSql= "INSERT INTO                       
                          rol
                          (rol,estado)
                          VALUES
                          ('$this->nombre','$this->estado')";

        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarRol(){
   //   echo "entro a consultar".$this->idRol;
        $condicion = $this->obtenerCondicion();
        $sentenciaSql= "SELECT 
                          *
                        FROM 
                          rol
                       ".$condicion;
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function obtenerCondicion(){
        $condicion = '';
        $whereAnd = ' WHERE ';
        if ($this->idRol != '') { 
            $condicion = $condicion . $whereAnd . "idRol = " . $this->idRol; 
            $whereAnd = ' AND ';             
        }

        if($this->nombre != ''){
            $condicion = $condicion.$whereAnd." rol LIKE '%".$this->nombre."%'";
            $whereAnd = ' AND ';
        }       
        if($this->estado != ''){
            $condicion = $condicion.$whereAnd." estado = '".$this->estado."'";
            $whereAnd = ' AND ';
        }
        return $condicion;
    }    
}
