<?php
namespace Controlador;
require_once '../entidad/AsistenteEvento.php';
require_once '../modelo/AsistenteEvento.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>"");
    try
    {
        
        $idAsistenteEvento = $_POST['idAsistenteEvento'];
        $idEventoFK = $_POST['selEvento'];
        $nombre= $_POST['txtNombre'];
        $apaterno = $_POST['txtApaterno'];
        $amaterno= $_POST['txtAmaterno'];
        $tipoDocumento = $_POST['selTipoDocumento'];
        $numeroDocumento = $_POST['txtNumeroDocumento'];
        $email = $_POST['txtEmail'];
        $telefono = $_POST['txtTelefono'];
        $estado = $_POST['selEstado'];

        $clienteE = new \entidad\AsistenteEvento();
        $clienteE->setIdAsistenteEvento($idAsistenteEvento);
        $idEvento = new \entidad\Evento();
        $idEvento->setIdEvento($idEventoFK);
        $clienteE->setIdEventoFK($idEvento);
        
        $clienteE->setNombre($nombre);
        $clienteE->setApaterno($apaterno);
        $clienteE->setAmaterno($amaterno);
        $clienteE->setTipoDocumento($tipoDocumento);
        $clienteE->setNumeroDocumento($numeroDocumento);
        $clienteE->setEmail($email);
        $clienteE->setTelefono($telefono);
        $clienteE->setEstado($estado);


        $clienteM = new \modelo\AsistenteEvento($clienteE, null);
        $clienteM->modificar();

        $retorno['mensaje'] = 'Registro exitoso';
        

    }catch(Exception $error)
    {
        $retorno['exito'] = 0;
        $retorno['mensaje']=$error->getMessage();
        
    }
   echo json_encode($retorno);