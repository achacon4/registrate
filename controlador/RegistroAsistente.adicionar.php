<?php
namespace controlador;
require_once '../entidad/RegistroAsistente.php';
require_once '../modelo/RegistroAsistente.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>"");
    try
    {
        
        $idAsistenteEvento = $_POST['idAsistenteEvento'];
        $idEventoFK = $_POST['idEvento'];
        $nombre= $_POST['txtNombre'];
        $apaterno = $_POST['txtApaterno'];
        $amaterno= $_POST['txtAmaterno'];
        $tipoDocumento = $_POST['selTipoDocumento'];
        $numeroDocumento = $_POST['txtNumeroDocumento'];
        $email = $_POST['txtEmail'];
        $telefono = $_POST['txtTelefono'];
        

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

        $retorno['mensaje'] = 'Registro exitoso';
        

    }catch(Exception $error)
    {
        $retorno['exito'] = 0;
        $retorno['mensaje']=$error->getMessage();
        
    }
   echo json_encode($retorno);
