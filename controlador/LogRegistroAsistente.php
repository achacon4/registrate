<?php
require_once '../modelo/RegistroAsistente.php';

$accion = filter_input(INPUT_POST, 'hidAccion');
switch ($accion){
    case 'ADICIONAR';
        $nombre = filter_input(INPUT_POST, 'txtNombre');
        $apaterno = filter_input(INPUT_POST, 'txtApaterno');
        $amaterno = filter_input(INPUT_POST, 'txtAmaterno');
        $tipoDocumento = filter_input(INPUT_POST, 'selTipoDocumento');
        $numeroDocumento = filter_input(INPUT_POST, 'txtNumeroDocumento');
        $email = filter_input(INPUT_POST, 'txtEmail');
        $telefono = filter_input(INPUT_POST, 'txtTelefono');
        
    try{
        $clienteE = new \entidad\RegistroAsistente();
        $clienteE->setIdAsistenteEvento($idAsistenteEvento);
        $clienteE->setIdEventoFK($idEventoFK);
        $clienteE->setNombre($nombre);
        $clienteE->setApaterno($apaterno);
        $clienteE->setAmaterno($amaterno);
        $clienteE->setTipoDocumento($tipoDocumento);
        $clienteE->setNumeroDocumento($numeroDocumento);
        $clienteE->setEmail($email);
        $clienteE->setTelefono($telefono);
        
        $clienteM = new \modelo\RegistroAsistente(clienteE);
        $clienteM->adicionar();
        
        echo 'Se adicionó correctamente.';
    } catch (Exception $error) {
         echo $error->getMessage();
    }
    break;
}

