<?php
require_once '../modelo/Evento.php';
require_once '../entidad/AsistenteEvento.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>array("asistentes"=>array()));

try{
    $idEvento = filter_input(INPUT_POST, 'selEvento');
    $eventoE = new \entidad\Evento();
    $eventoM = new \modelo\Evento($eventoE);
    $eventoM->consultarAsistentes($idEvento);

    $contador = 0;

    while ($fila = $eventoM->conexion->obtenerObjeto()){
        
        $retorno['data']['asistentes'][$contador]['idAsistenteEvento']= $fila->idAsistenteEvento;
        $retorno['data']['asistentes'][$contador]['nombre']= utf8_encode($fila->nombre);
        $retorno['data']['asistentes'][$contador]['apaterno']= utf8_encode($fila->apaterno);
        $retorno['data']['asistentes'][$contador]['amaterno']= utf8_encode($fila->amaterno);
        $retorno['data']['asistentes'][$contador]['tipoDocumento']= $fila->tipoDocumento;
        $retorno['data']['asistentes'][$contador]['numeroDocumento']= $fila->numeroDocumento;
        $retorno['data']['asistentes'][$contador]['telefono']= $fila->telefono;
        $retorno['data']['asistentes'][$contador]['estado']= $fila->estado;

        $contador++;
    }

}  catch (Exception $error){
    $retorno['exito']=0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);

