<?php

require_once '../modelo/DatosPersonales.php'; 

$retorno= array("exito"=>1,"mensaje"=>"");

try {
       $idDatosPersonales = filter_input(INPUT_POST, 'hidIdDatosPersonales');
    $nombre = filter_input(INPUT_POST, 'txtNombre');
    $apaterno = filter_input(INPUT_POST, 'txtApaterno');
    $amaterno = filter_input(INPUT_POST, 'txtAmaterno');
    $tipoDocumento = filter_input(INPUT_POST, 'selTipoDocumento');
    $numeroDocumento = filter_input(INPUT_POST, 'txtNumeroDocumento');
    $email = filter_input(INPUT_POST, 'txtEmail');
    $telefono = filter_input(INPUT_POST, 'txtTelefono');
    
    $clienteE = new \entidad\DatosPersonales();
        $clienteE->setIdDatosPersonales($idDatosPersonales);
        $clienteE->setNombre($nombre);
        $clienteE->setApaterno($apaterno);
        $clienteE->setAmaterno($amaterno);
        $clienteE->setTipoDocumento($tipoDocumento);
        $clienteE->setNumeroDocumento($numeroDocumento);
           
        $clienteE->setEmail($email);
        $clienteE->setTelefono($telefono);
        $clienteE->setEstado('A');
        
        $clienteM = new \modelo\DatosPersonales($clienteE,null);
       
//        $entidadM->conexion->iniciarTransaccion();
        $clienteM->modificar();
//        $entidadM->conexion->confirmarTransaccion();
        $retorno['mensaje']='Se modifico Correctamente';
} catch (Exception $error) {
//    $entidadM->conexion->cancelarTransaccion();
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}
echo json_encode($retorno);

