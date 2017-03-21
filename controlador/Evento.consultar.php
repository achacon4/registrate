<?php
require_once '../modelo/Evento.php';
require_once '../entidad/RegistroAsistente.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>array("asistentes"=>array()));

try{
$eventoE = new \entidad\Evento();
$eventoM = new \modelo\Evento($eventoE);
$eventoM->consultarAsistentes();

$contador = 0;

while ($fila = $eventoM->conexion->obtenerObjeto()){
    
    $retorno['data']['asistentes'][$contador]['nombre']= $fila->nombre;
    $retorno['data']['asistentes'][$contador]['apaterno']= $fila->apaterno;
    $retorno['data']['asistentes'][$contador]['amaterno']= $fila->amaterno;
    $retorno['data']['asistentes'][$contador]['tipoDocumento']= $fila->tipoDocumento;
    $retorno['data']['asistentes'][$contador]['numeroDocumento']= $fila->numeroDocumento;
    $retorno['data']['asistentes'][$contador]['telefono']= $fila->telefono;
    
    $contador++;
}

}  catch (Exception $error){
    $retorno['exito']=0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);

