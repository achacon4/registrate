<?php
require_once '../modelo/Usuario.php';

$retorno = array("exito"=>1,"mensaje"=>"", "data"=>array());

try{
    $idUsuario = $_POST['hidIdUsuario'];
    
    $usuarioE= new \entidad\Usuario();
    $usuarioE->setIdUsuario($idUsuario);
    $usuarioM=new \modelo\Usuario($usuarioE);
    $usuarioM->eliminar();
    
    $retorno['mensaje']='Se eliminó correctamente';
} catch (Exception $error) {
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}

echo json_encode($retorno);

