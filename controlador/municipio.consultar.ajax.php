<?php
require_once '../modelo/Municipio.php';
try{
    $municipio = $_REQUEST['term'];
    $municipioE = new \entidad\Municipio();
    $municipioM = new \modelo\Municipio($municipioE);
    $municipioM->consultarAjax($municipio, 'limit 3');
    $contador = 0;
    while($fila = $municipioM->conexion->obtenerObjeto()){
        $retorno[$contador]['id'] = $fila->idMunicipio;
        $retorno[$contador]['value'] = $fila->departamento."-".$fila->municipio;
        $contador++;
    }
}catch (Exception $error){
    
}
echo json_encode($retorno);