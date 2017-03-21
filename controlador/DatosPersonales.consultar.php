<?php

require_once '../modelo/DatosPersonales.php';
require_once '../entidad/DatosPersonales.php';

$retorno = array("exito"=>1,"mensaje"=>"","data"=>array("datos"=>array()));

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
        
        $clienteM = new \modelo\DatosPersonales($clienteE);
        $clienteM->consultar();
        
        $numeroRegistros = $clienteM->conexion->obtenerNumeroRegistros();
        $retorno['data']['numeroRegistros'] = $numeroRegistros;
        $contador = 0;
     
     while($fila = $clienteM->conexion->obtenerObjeto()){
         $retorno['data']['datos'][$contador]['idDatosPersonales'] = $fila->idDatosPersonales;
         $retorno['data']['datos'][$contador]['nombre'] = $fila->nombre;
         $retorno['data']['datos'][$contador]['apaterno'] = $fila->apaterno;
         $retorno['data']['datos'][$contador]['amaterno'] = $fila->amaterno;
         $retorno['data']['datos'][$contador]['tipoDocumento'] = $fila->tipoDocumento;
         $retorno['data']['datos'][$contador]['numeroDocumento'] = $fila->numeroDocumento;
         $retorno['data']['datos'][$contador]['email'] = $fila->email;
         $retorno['data']['datos'][$contador]['telefono'] = $fila->telefono;
         
         $contador++;
     }
    
} catch (Exception $error) {
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}

echo json_encode($retorno);