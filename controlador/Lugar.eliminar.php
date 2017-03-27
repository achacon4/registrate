<?php

require_once '../modelo/Lugar.php';
$retorno=array("exito"=>1,"mensaje"=>"","data"=>array());

try {
               $idLugar =filter_input(INPUT_POST, 'hidIdLugar');
    
                $entidadE = new \entidad\Lugar();
                $entidadE->setIdLugar($idLugar);
                $entidadM = new \modelo\Lugar($entidadE);
                $entidadM->eliminar();
   
    $retorno['mensaje']='Se eliminó correctamente';
} catch (Exception $exc) {
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}

echo json_encode($retorno);
