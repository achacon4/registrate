<?php
require_once '../entidad/RegistroAsistente.php';
require_once '../modelo/RegistroAsistente.php';

$retorno = array("exito"=>1,"mensaje"=>"");
    try
    {
        $idAsistenteEvento = filter_input(INPUT_POST,'idAsistenteEvento'); 
     
        $clienteE = new \entidad\RegistroAsistente();

        $clienteE->setIdAsistente($idAsistenteEvento);
        
        $clienteM = new \modelo\RegistroAsistente($clienteE);
   
        $clienteM->eliminar();
   
        
         $retorno["mensaje"] = 'Se eliminó correctamente el asistente';
    }catch(Exception $error)
    {
        $retorno['exito'] = 0;
        $retorno['mensaje']=$error->getMessage();
        
    }
  echo json_encode($retorno);

