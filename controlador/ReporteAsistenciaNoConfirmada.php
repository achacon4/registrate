<?php

require_once '../modelo/Evento.php';
require_once '../entidad/Evento.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>array("datos"=>array()));

try {
     $idEvento = filter_input(INPUT_POST, 'selEvento');
        $clienteE = new \entidad\Evento(); 
        $clienteM = new \modelo\Evento($clienteE);
        $clienteM->consultarAsistenciaNoConfirmada($idEvento);
        
        $numeroRegistros = $clienteM->conexion->obtenerNumeroRegistros();
        $retorno['data']['numeroRegistros'] = $numeroRegistros;
        $contador = 0;
     
     while($fila = $clienteM->conexion->obtenerObjeto()){
         $retorno['data']['datos'][$contador]['idAsistenteEvento'] = $fila->idAsistenteEvento;
          $retorno['data']['datos'][$contador]['idEventoFK'] = $fila->idEventoFK;
         $retorno['data']['datos'][$contador]['nombre'] = utf8_encode($fila->nombre);
         $retorno['data']['datos'][$contador]['apaterno'] = utf8_encode($fila->apaterno);
         $retorno['data']['datos'][$contador]['amaterno'] = utf8_encode($fila->amaterno);
         $retorno['data']['datos'][$contador]['tipoDocumento'] = $fila->tipoDocumento;
         $retorno['data']['datos'][$contador]['numeroDocumento'] = $fila->numeroDocumento;
         $retorno['data']['datos'][$contador]['email'] = $fila->email;
         $retorno['data']['datos'][$contador]['telefono'] = $fila->telefono;
         $retorno['data']['datos'][$contador]['estado'] = $fila->estado;
         
         $contador++;
     }
    
} catch (Exception $error) {
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}

echo json_encode($retorno);
