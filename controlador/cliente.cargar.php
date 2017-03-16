<?php
require_once '../modelo/Municipio.php';
$retorno = array("exito"=>1,"mensaje"=>"", "data"=>array());

try{
    $municipioE = new \entidad\Municipio();
    $municipioM = new \modelo\Municipio($municipioE);
    $municipioM->consultar();
    $contador = 0;
    while($fila = $municipioM->conexion->obtenerObjeto()){
        $retorno['data']['municipios'][$contador]['idMunicipio'] = $fila->idMunicipio;
        $retorno['data']['municipios'][$contador]['municipio'] = $fila->municipio;
        $contador++;
    }
}catch (Exception $error){
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);