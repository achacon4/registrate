<?php
namespace controlador;
require_once '../entidad/RegistroAsistente.php';
require_once '../modelo/RegistroAsistente.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>"");
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
        $clienteM->consultar();	

        $numeroRegistros = $clienteM->conexion->obtenerRegistro();
        
        $retorno['data']['numeroRegistros'] = $numeroRegistros;
        $contador = 0;
  		
  		while($fila = $clienteM->conexion->obtenerObjeto())
        {
            $retorno['data']['RegistroAsistente'][$contador]['idAsistenteEvento']=$fila->idAsistenteEvento;
            $retorno['data']['RegistroAsistente'][$contador]['idEventoFK']=$fila->idEventoFK;
            $retorno['data']['RegistroAsistente'][$contador]['nombre']=$fila->nombre;
            $retorno['data']['RegistroAsistente'][$contador]['apaterno']=$fila->apaterno;
            $retorno['data']['RegistroAsistente'][$contador]['amaterno']=$fila->amaterno;
            $retorno['data']['RegistroAsistente'][$contador]['tipoDocumento']=$fila->tipoDocumento;
            $retorno['data']['RegistroAsistente'][$contador]['numeroDocumento']=$fila->numeroDocumento;
            $retorno['data']['RegistroAsistente'][$contador]['email']=$fila->email;
            $retorno['data']['RegistroAsistente'][$contador]['telefono']=$fila->telefono;
           
            $contador ++;

        }

    } catch (Exception $error) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error.getMessage();
	}
	echo json_encode($retorno);

