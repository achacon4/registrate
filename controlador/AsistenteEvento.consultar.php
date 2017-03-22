<?php

require_once '../modelo/AsistenteEvento.php';
require_once '../entidad/AsistenteEvento.php';

$retorno = array('exito'=>1,'mensaje'=>'','data'=>array());
    try
    {
        
        $idAsistenteEvento = $_POST['idAsistenteEvento'];
        $idEventoFK = $_POST['txtEvento'];
        $nombre= $_POST['txtNombre'];
        $apaterno = $_POST['txtApaterno'];
        $amaterno= $_POST['txtAmaterno'];
        $tipoDocumento = $_POST['selTipoDocumento'];
        $numeroDocumento = $_POST['txtNumeroDocumento'];
        $email = $_POST['txtEmail'];
        $telefono = $_POST['txtTelefono'];
        $estado= $_POST['selEstado'];
        
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


        $clienteM = new \modelo\AsistenteEvento($clienteE,null);
        $clienteM->consultar();	

        $numeroRegistros = $clienteM->conexion->obtenerNumeroRegistros();
        
        $retorno['data']['numeroRegistros'] = $numeroRegistros;
        $contador = 0;
  		
        while($fila = $clienteM->conexion->obtenerObjeto())
        {
            $retorno['data'][$contador]['idAsistenteEvento']=$fila->idAsistenteEvento;
            $retorno['data'][$contador]['idEventoFK']=$fila->idEventoFK;
            $retorno['data'][$contador]['nombre']=$fila->nombre;
            $retorno['data'][$contador]['apaterno']=$fila->apaterno;
            $retorno['data'][$contador]['amaterno']=$fila->amaterno;
            $retorno['data'][$contador]['tipoDocumento']=$fila->tipoDocumento;
            $retorno['data'][$contador]['numeroDocumento']=$fila->numeroDocumento;
            $retorno['data'][$contador]['email']=$fila->email;
            $retorno['data'][$contador]['telefono']=$fila->telefono;
            $retorno['data'][$contador]['estado']=$fila->estado;
           
            $contador ++;

        }

    } catch (Exception $error) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error.getMessage();
        }
	echo json_encode($retorno);

