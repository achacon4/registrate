<?php
require_once '../modelo/Usuario.php';  

$retorno = array("exito"=>1,"mensaje"=>"","data"=>array("usuarios"=>array()));

try{
    $idUsuario = filter_input(INPUT_POST, 'hidIdUsuario');
    $idDatosPersonales = filter_input(INPUT_POST, 'hidIdDatosPersonales');
    $usuario = filter_input(INPUT_POST, 'txtUsuario');
    $contrasenia = filter_input(INPUT_POST,'txtContrasenia');
    $estado = filter_input(INPUT_POST,'selEstado');
        
    $usuarioE = new \entidad\Usuario();
    $usuarioE->setIdUsuario($idUsuario);
    $usuarioE->setIdDatosPersonales($idDatosPersonales);
    $usuarioE->setUsuario($usuario);
    $usuarioE->setContrasenia($contrasenia);
    $usuarioE->setEstado($estado);
    
    $usuarioM = new \modelo\Usuario($usuarioE);
    $usuarioM->consultar();
    $numeroRegistros = $usuarioM->conexion->obtenerRegistro();
    $retorno['data']['numeroRegistros'] = $numeroRegistros;
    $contador = 0;
    
    while ($fila = $usuarioM->conexion->obtenerObjeto()){
        $retorno['data']['usuarios'][$contador]['idUsuario'] = $fila->idUsuario;
        $retorno['data']['usuarios'][$contador]['idDatosPersonalesFK'] = $fila->idDatosPersonalesFK;
        $retorno['data']['usuarios'][$contador]['usuario'] = $fila->usuario;
        $retorno['data']['usuarios'][$contador]['contrasenia'] = $fila->contrasenia;
        $retorno['data']['usuarios'][$contador]['estado'] = $fila->estado;
        $retorno['data']['usuarios'][$contador]['nombre'] = $fila->nombre;
        $retorno['data']['usuarios'][$contador]['apaterno'] = $fila->apaterno;
        $retorno['data']['usuarios'][$contador]['amaterno'] = $fila->amaterno;
        
        $contador++;
    }
}  catch (Exception $error){
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}

echo json_encode($retorno);