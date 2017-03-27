<?php

require_once '../modelo/Lugar.php';

try {
    $lugar = $_REQUEST['term'];
    $lugarE = new \entidad\Lugar();
    $lugarM = new \modelo\Lugar($lugarE);
    $lugarM->consultarAjax($lugar, 'limit 3');
    $contador = 0;
    while ($fila = $lugarM->conexion->obtenerObjeto()){
        $retorno[$contador]['id'] = $fila->idLugar;
        $retorno[$contador]['value'] = $fila->nombre;
        $contador++;
    }
    
} catch (Exception $error) {
   
}
echo json_encode($retorno);