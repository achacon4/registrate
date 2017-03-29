<?php
require_once '../entidad/Menu.php';    
require_once '../modelo/Menu.php';    
$retorno = array("exito"=>1,"mensaje"=>"","data"=>"");

try{
    
    $idMenu = filter_input(INPUT_POST, 'hidIdMenu');
    $txtMenu = filter_input(INPUT_POST, 'txtMenu');
    $selEstado = filter_input(INPUT_POST, 'selEstado');
    
    $MenuE = new \entidad\Menu(); 
    $MenuE->setIdMenu($idMenu); 
    $MenuE->setMenu($txtMenu); 
    $MenuE->setEstado($selEstado); 
    
    $MenuM = new \modelo\Menu($MenuE); 
    $MenuM->actualizarMenu();
    $retorno['mensaje'] = 'Se modifico correctamente el Menu';
    
} catch (Exception $ex) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
} 

echo json_encode($retorno);