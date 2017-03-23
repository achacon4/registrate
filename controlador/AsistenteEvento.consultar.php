<?php

require_once '../modelo/AsistenteEvento.php';
require_once '../entidad/AsistenteEvento.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>array("AsistenteEvento"=>array()));
    try
    {
        
        $idAsistenteEvento = filter_input(INPUT_POST,'idAsistenteEvento');
        $idEventoFK = filter_input(INPUT_POST,'txtEvento');
        $nombre= filter_input(INPUT_POST,'txtNombre');
        $apaterno = filter_input(INPUT_POST,'txtApaterno');
        $amaterno= filter_input(INPUT_POST,'txtAmaterno');
        $tipoDocumento = filter_input(INPUT_POST,'selTipoDocumento');
        $numeroDocumento = filter_input(INPUT_POST,'txtNumeroDocumento');
        $email = filter_input(INPUT_POST,'txtEmail');
        $telefono = filter_input(INPUT_POST,'txtTelefono');
        $estado= filter_input(INPUT_POST,'selEstado');
        
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
            $retorno['data']['AsistenteEvento'][$contador]['idAsistenteEvento']=$fila->idAsistenteEvento;
            $retorno['data']['AsistenteEvento'][$contador]['idEventoFK']=$fila->idEventoFK;
            $retorno['data']['AsistenteEvento'][$contador]['nombreEventos']=$fila->nombreEventos;
            $retorno['data']['AsistenteEvento'][$contador]['nombre']=$fila->nombre;
            $retorno['data']['AsistenteEvento'][$contador]['apaterno']=$fila->apaterno;
            $retorno['data']['AsistenteEvento'][$contador]['amaterno']=$fila->amaterno;
            $retorno['data']['AsistenteEvento'][$contador]['tipoDocumento']=$fila->tipoDocumento;
            $retorno['data']['AsistenteEvento'][$contador]['numeroDocumento']=$fila->numeroDocumento;
            $retorno['data']['AsistenteEvento'][$contador]['email']=$fila->email;
            $retorno['data']['AsistenteEvento'][$contador]['telefono']=$fila->telefono;
            $retorno['data']['AsistenteEvento'][$contador]['estado']=$fila->estado;
           
            $contador ++;

        }

    } catch (Exception $error) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error.getMessage();
        }
	echo json_encode($retorno);

