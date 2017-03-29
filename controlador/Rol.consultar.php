<?php
namespace controlador;

require_once '../entidad/Rol.php';
require_once '../modelo/Rol.php';

$retorno = array("exito"=>1, "mensaje"=>"", "data"=>array());
try
{
        
    $idRol = filter_input(INPUT_POST, 'idRol');
    $nombre = filter_input(INPUT_POST, 'txtNombreRol');
    $estado = filter_input(INPUT_POST, 'selEstado');

    $rolE = new \entidad\Rol();
    $rolE->setIdRol($idRol);
    $rolE->setNombreRol($nombre);
    $rolE->setEstado($estado);

    $rolM = new \modelo\Rol($rolE,null); //(Mandar como parametro un null)    
    $rolM->consultarRol();
    
    $numeroRegistros = $rolM->conexion->obtenerNumeroRegistros();
    $retorno['numeroRegistros'] = $numeroRegistros;
    
    $contador = 0;
    
    while ($fila = $rolM->conexion->obtenerObjeto()) {
        $retorno['data']['rol'][$contador]['idRol'] = $fila->idRol;
        $retorno['data']['rol'][$contador]['rol'] = $fila->rol;
        $retorno['data']['rol'][$contador]['estado'] = $fila->estado;                
        $contador++;
    }
}
catch (Exception $error)
{    
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);