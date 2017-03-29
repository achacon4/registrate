<?php
namespace modelo;
require_once '../entidad/RolFormulario.php';
require_once '../entorno/Conexion.php';

class RolFormulario{
    
    public $conexion;    
    private $idRolFormulario;
    private $idFormulario;
    private $idRol;
    private $estado;
    
     function __construct(\entidad\RolFormulario $rolFormulario, $conexion = null) {
        $this->idRolFormulario = $rolFormulario->getIdRolFormulario();
        $this->idFormulario = $rolFormulario->getIdFormulario();
        $this->idRol = $rolFormulario->getIdRol();
        $this->estado = $rolFormulario->getEstado();
        
        if($conexion == null){
            $this->conexion = new \Conexion();
        }else{
            $this->conexion = $conexion;
         }
     }
     
     function actualizarRolFormulario(){
    //  echo "entro a actualizar";
        $sentenciaSql= "UPDATE
                        rolformulario 
                        SET
                        idFormulario = '$this->idFormulario',
                        idRol = '$this->idRol',
                        estado = '$this->estado'
                        WHERE idRolFormulario = $this->idRolFormulario";

        $this->conexion->ejecutar($sentenciaSql);
     }

     function eliminarRolFormulario(){
     // echo "entro a eliminar";
        $sentenciaSql= "DELETE FROM                       
                          rolformulario
                        WHERE 
                        idRolFormulario = $this->idRolFormulario";

        $this->conexion->ejecutar($sentenciaSql);
     }


    function insertarRolFormulario(){    
    // json_encode("A".$this->nombre."".$this->estado); 
        $sentenciaSql= "INSERT INTO                       
                          rolformulario
                          (idFormulario,idRol,estado)
                          VALUES
                          ($this->idFormulario,$this->idRol,'$this->estado')";

        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function consultarRolFormulario(){
   //   echo "entro a consultar".$this->idRol;
        $condicion = $this->obtenerCondicion();
        $sentenciaSql= "SELECT 
                          *
                        FROM 
                          rolformulario
                       ".$condicion;
        $this->conexion->ejecutar($sentenciaSql);
    }
    
    function obtenerCondicion(){
        $condicion = '';
        $whereAnd = ' WHERE ';
        if ($this->idRolFormulario != '') { 
            $condicion = $condicion . $whereAnd . "idRolFormulario = " . $this->idRolFormulario; 
            $whereAnd = ' AND ';             
        }

        if($this->idFormulario != ''){
            $condicion = $condicion.$whereAnd." idFormulario LIKE '%".$this->idFormulario."%'";
            $whereAnd = ' AND ';
        }       
        if($this->idRol != ''){
            $condicion = $condicion.$whereAnd." idRol LIKE '%".$this->idRol."%'";
            $whereAnd = ' AND ';
        }       
        if($this->estado != ''){
            $condicion = $condicion.$whereAnd." estado = '".$this->estado."'";
            $whereAnd = ' AND ';
        }
        return $condicion;
    }    
}
