<?php

require_once '../modelo/DatosPersonales.php'; 


$retorno=array("exito"=>1,"mensaje"=>"","data"=>array());

try {
    $nombre = filter_input(INPUT_POST, 'txtNombre');
    $apaterno = filter_input(INPUT_POST, 'txtApaterno');
    $amaterno = filter_input(INPUT_POST, 'txtAmaterno');
    $tipoDocumento = filter_input(INPUT_POST, 'selTipoDocumento');
    $numeroDocumento = filter_input(INPUT_POST, 'txtNumeroDocumento');
    $email = filter_input(INPUT_POST, 'txtEmail');
    $telefono = filter_input(INPUT_POST, 'txtTelefono');
    $estado = filter_input(INPUT_POST, 'selEstado');
    
    $clienteE = new \entidad\DatosPersonales();
        $clienteE->setNombre($nombre);
        $clienteE->setApaterno($apaterno);
        $clienteE->setAmaterno($amaterno);
        $clienteE->setTipoDocumento($tipoDocumento);
        $clienteE->setNumeroDocumento($numeroDocumento);
        
      
    
        
        $clienteE->setEmail($email);
        $clienteE->setTelefono($telefono);
        $clienteE->setEstado($estado);

        
        $clienteM = new \modelo\DatosPersonales($clienteE,null);
        $clienteM->conexion->iniciarTransaccion();
        $clienteM->adicionar();
        $clienteM->conexion->confirmarTransaccion();
        $retorno['mensaje']='Se adiciono correctamente';
} catch (Exception $error) {
    $clienteM->conexion->cancelarTransaccion();
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}

echo json_encode($retorno);


