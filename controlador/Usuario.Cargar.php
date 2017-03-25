<?php
require_once '../modelo/Usuario.php';

try{
    $usuario = $_REQUEST['term'];
    $usuarioE = new \entidad\Usuario();
    $usuarioM = new \modelo\Usuario($usuarioE);
    $usuarioM->consultarAjax($usuario, '');
    $contador = 0;
    while($fila = $usuarioM->conexion->obtenerObjeto()){
        $retorno[$contador]['id'] = $fila->idDatosPersonales;
        $retorno[$contador]['value'] = $fila->nombre." ".$fila->apaterno." ".$fila->amaterno;
        $contador++;
    }
} catch (Exception $ex) {
    
}
echo json_encode($retorno);