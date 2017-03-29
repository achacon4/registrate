<?php

namespace modelo;

require_once '../entidad/Menu.php';
require_once  '../entorno/Conexion.php';

class Menu{
    public $conexion;
    
    private $idMenu;
    private $menu;
    private $estado;
    
    function __construct(\entidad\Menu $menu){
        $this->idMenu = $menu->getIdMenu();
        $this->menu = $menu->getMenu();
        $this->estado = $menu->getEstado();
        
        $this->conexion = new \Conexion();
    }
    
    function consultar(){
        $condicion = $this->obtenerCondicion();
        $sentenciaSql = "SELECT 
                            *
                        FROM
                            menu
                        WHERE
                            estado = 'A'".$condicion;
        $this->conexion->ejecutar($sentenciaSql);
    }


     function insertarMenu(){       
        $sentenciaSql= "INSERT INTO                       
                          menu
                          (menu,estado)
                          VALUES
                          ('$this->menu','$this->estado')";

        $this->conexion->ejecutar($sentenciaSql);
    }

     function actualizarMenu(){
        $sentenciaSql= "UPDATE
                        menu 
                        SET
                        menu = '$this->menu',
                        estado = '$this->estado'
                        WHERE idMenu = $this->idMenu";

        $this->conexion->ejecutar($sentenciaSql);
     }



     function obtenerCondicion(){
        $condicion = '';
        $whereAnd = ' WHERE ';

        if ($this->idMenu  != '') { 
            $whereAnd = ' AND ';  
            $condicion = $condicion . $whereAnd . "idMenu = " . $this->idMenu;                     
        }

        if($this->menu != ''){
            $condicion = $condicion.$whereAnd." menu LIKE '%".$this->menu."%'";
            $whereAnd = ' AND ';
        }       

        if($this->estado != ''){
            $condicion = $condicion.$whereAnd." estado = '".$this->estado."'";
            $whereAnd = ' AND ';
        }
        return $condicion;
    }    
    
}