<?php

require_once '../modelo/Lugar.php';
$retorno=array("exito"=>1,"mensaje"=>"","data"=>array());

try{
    $lugarE = new \entidad\Lugar();
    $lugarM = new \modelo\Lugar($lugarE);
    $lugarM -> consultar();
    $contador = 0;
    
    while($fila = $lugarM->conexion->obtenerObjeto()){
         $retorno['data']['lugar'][$contador]['idLugar']= $fila->idLugar;
        $retorno['data']['lugar'][$contador]['disponibilidad']= $fila->disponibilidad;
        $contador++;
        
    }
} catch (Exception $ex) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);