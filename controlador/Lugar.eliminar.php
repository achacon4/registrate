<?php

require_once '../modelo/Lugar.php';
$retorno=array("exito"=>1,"mensaje"=>"","data"=>array());

try {
               $idLugar =filter_input(INPUT_POST, 'hidIdLugar');
    
                $entidadE = new \entidad\Cliente();
                $entidadE->setIdCliente($idCliente);
                $entidadM = new \modelo\Cliente($entidadM);
                $entidadM->eliminar();
   
    $retorno['mensaje']='Se elimino corecctamente';
} catch (Exception $exc) {
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}

echo json_encode($retorno);
