<?php
require_once '../modelo/Usuario.php';    
$retorno = array("exito"=>1,"mensaje"=>"","data"=>"");
try{    
    $idUsuario = filter_input(INPUT_POST, 'hidIdUsuario');
    $usuario = filter_input(INPUT_POST,'txtUsuario');
    $contrasenia = filter_input(INPUT_POST,'txtContrasenia');
    $estado = filter_input(INPUT_POST,'selEstado');
    
    $usuarioE = new \entidad\Usuario();
    $usuarioE->setIdUsuario($idUsuario);
    $usuarioE->setUsuario($usuario);
    $usuarioE->setContrasenia($contrasenia);
    $usuarioE->setEstado($estado);
    
    $usuarioM = new \modelo\Usuario($usuarioE);
    $usuarioM->conexion->iniciarTransaccion();
    $usuarioM->modificarContrasenia();
    $usuarioM->conexion->confirmarTransaccion();
    $retorno['mensaje'] = 'Se modifico correctamente la contraseña del usuario';
    
}  catch (Exception $error){
    $clienteM->conexion->cancelarTransaccion();
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);