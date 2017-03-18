<?php
 require_once '../modelo/DatosPersonales';
$retorno = array("exito"=>1,"mensaje"=>"");

try{
    $nombre = filter_input(INPUT_POST, 'txtNombre');
    $apaterno = filter_input(INPUT_POST, 'txtApaterno');
    $amaterno = filter_input(INPUT_POST, 'txtAmaterno');
    $tipoDocumento = filter_input(INPUT_POST, 'selTipoDocumento');
    $numeroDocumento = filter_input(INPUT_POST, 'txtNumeroDocumento');
    $email = filter_input(INPUT_POST, 'txtEmail');
    $telefono = filter_input(INPUT_POST, 'txtTelefono');
//    $estado = filter_input(INPUT_POST, 'aaa');
    
    $datosPersonalesE = new \entidad\DatosPersonales();
    $datosPersonalesE->setNombre($nombre);
    $datosPersonalesE->setApaterno($apaterno);
    $datosPersonalesE->setAmaterno($amaterno);
    $datosPersonalesE->setTipoDocumento($tipoDocumento);
    $datosPersonalesE->setNumeroDocumento($numeroDocumento);
    $datosPersonalesE->setEmail($email);
    $datosPersonalesE->setTelefono($telefono);
    $datosPersonalesE->setEstado('A');
    
    $datosPersonalesM = new \modelo\DatosPersonales($datosPersonalesE, null);
    
    $datosPersonalesM->conexion->iniciarTransaccion();
    $datosPersonalesM->adicionar();
    
    
} catch (Exception $ex) {

}

