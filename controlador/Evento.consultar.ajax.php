<?php

require_once '../modelo/Evento.php';

try{
    $evento = $_REQUEST['term'];
    $eventoE = new \entidad\Evento();
    $eventoM = new \modelo\Evento($eventoE);
    $eventoM->consultarAjax($evento, 'limit 3');
    $contador = 0;
    while ($fila = $eventoM->conexion->obtenerObjeto()){
        $retorno[$contador]['id'] = $fila->idEvento;
        $retorno[$contador]['value'] = utf8_encode($fila->nombreEvento);
        $contador++;
    }
} catch (Exception $error) {

}
echo json_encode($retorno);