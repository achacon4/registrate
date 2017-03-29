<?php
require_once '../modelo/Menu.php'; 

$retorno = array("exito"=>1,"mensaje"=>"","data"=>array()); 

try{
    
    $idMenu = filter_input(INPUT_POST, 'hidIdMenu'); 
    $txtMenu = filter_input(INPUT_POST, 'txtMenu'); 
    $estado = filter_input(INPUT_POST, 'selEstado'); 
    
    $MenuE =  new \entidad\Menu();
    $MenuE->setIdMenu($idMenu);  
    $MenuE->setMenu($txtMenu); 
    $MenuE->setEstado($estado); 
    
    $MenuM = new \modelo\Menu($MenuE); 
    $MenuM->consultar(); 
    
    $numeroRegistros = $MenuM->conexion->obtenerNumeroRegistros();
    $retorno['data']['numeroRegistros'] = $numeroRegistros;
    $contador = 0; 
    
     while ($fila = $MenuM->conexion->obtenerObjeto()){
        $retorno['data']['menu'][$contador]['idMenu'] = $fila->idMenu;
        $retorno['data']['menu'][$contador]['menu'] = utf8_encode ($fila->menu); 
        $retorno['data']['menu'][$contador]['estado'] = $fila->estado; 
        
        $contador++;
     }
     
} catch (Exception $ex) {
    $retorno['exito'] = 0;
        $retorno['mensaje'] = $error->getMessage();
} 

echo json_encode($retorno);

