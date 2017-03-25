<?php
require_once '../modelo/Usuario.php';    
$retorno = array("exito"=>1,"mensaje"=>"","data"=>"");
try{
    $idDatosPersonales = filter_input(INPUT_POST, 'hidIdDatosPersonales');
    $usuario = filter_input(INPUT_POST, 'txtUsuario');
    $contrasenia = filter_input(INPUT_POST,'txtContrasenia');
    $estado = filter_input(INPUT_POST,'selEstado');
        
    $usuarioE = new \entidad\Usuario();
    $usuarioE->setUsuario($usuario);
    $usuarioE->setContrasenia($contrasenia);
    $usuarioE->setEstado($estado);
    $usuarioE->setIdDatosPersonales($idDatosPersonales);
    
    $usuarioM = new \modelo\Usuario($usuarioE);
    $usuarioM->conexion->iniciarTransaccion();
    $usuarioM->adicionar();
    $usuarioM->conexion->confirmarTransaccion();
    $retorno['mensaje'] = 'Se adicionó correctamente un nuevo Usuario';
    
}  catch (Exception $error){
    $clienteM->conexion->cancelarTransaccion();
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}

echo json_encode($retorno);