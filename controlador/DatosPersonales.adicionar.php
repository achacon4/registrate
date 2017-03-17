<?php

try{
    $nombre = filter_input(INPUT_POST, 'aaa');
    $apaterno = filter_input(INPUT_POST, 'aaa');
    $amaterno = filter_input(INPUT_POST, 'aaa');
    $tipoDocumento = filter_input(INPUT_POST, 'aaa');
    $numeroDocumento = filter_input(INPUT_POST, 'aaa');
    $email = filter_input(INPUT_POST, 'aaaa');
    $telefono = filter_input(INPUT_POST, 'aaa');
    $estado = filter_input(INPUT_POST, 'aaa');
    
    $datosPersonalesE = new \entidad\DatosPersonales();
    $datosPersonalesE->setNombre($nombre);
    $datosPersonalesE->setApaterno($apaterno);
    $datosPersonalesE->setAmaterno($amaterno);
    $datosPersonalesE->setTipoDocumento($tipoDocumento);
    $datosPersonalesE->setNumeroDocumento($numeroDocumento);
    $datosPersonalesE->setEmail($email);
    $datosPersonalesE->setTelefono($telefono);
    $datosPersonalesE->setEstado($estado);
    
    
    
} catch (Exception $ex) {

}

