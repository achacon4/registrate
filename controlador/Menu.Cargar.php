<?php

require_once '../modelo/Menu.php';
$retorno = array("exito"=>1,"mensaje"=>"", "data"=>array()); 

try{
    $menuE = new \entidad\Menu();
    $menuM = new \modelo\Menu($menuE);
    $menuM->consultar();
    $contador = 0;
    
    while($fila = $menuM->conexion->obtenerObjeto()){
        $retorno['data']['menus'][$contador]['idMenu'] = $fila->idMenu;
        $retorno['data']['menus'][$contador]['menu'] = utf8_encode($fila->menu);
        $contador++;   
    }
} catch (Exception $ex) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
} 
echo json_encode($retorno);

