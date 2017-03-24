<?php

require_once '../modelo/DatosPersonales.php';
$retorno=array("exito"=>1,"mensaje"=>"","data"=>array());

try {
               $idDatosPersonales =filter_input(INPUT_POST, 'hidIdDatosPersonales');
    
                $entidadE = new \entidad\DatosPersonales();
                $entidadE->setIdDatosPersonales($idDatosPersonales);
                $entidadM = new \modelo\DatosPersonales($entidadE);
                $entidadM->eliminar();
   
    $retorno['mensaje']='Se elimino correctamente';
} catch (Exception $error) {
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}

echo json_encode($retorno);

