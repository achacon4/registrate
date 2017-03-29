<?php
require_once '../entidad/Menu.php'; 
require_once '../modelo/Menu.php';  
$retorno = array("exito"=>1,"mensaje"=>"","data"=>"");  
try{
    
    $txtMenu = filter_input(INPUT_POST, 'txtMenu'); 
    $selEstado = filter_input(INPUT_POST, 'selEstado'); 
    
    $MenuE = new \entidad\Menu(); 
    $MenuE->setMenu($txtMenu); 
    $MenuE->setEstado($selEstado);  

    
    $MenuM = new \modelo\Menu($MenuE); 
    $MenuM->insertarMenu();
    $retorno['mensaje'] = 'Se adicionó correctamente un Menu';
} catch (Exception $ex) {
    $MenuM->conexion->cancelarTransaccion();
        $retorno['exito'] = 0;
        $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);
