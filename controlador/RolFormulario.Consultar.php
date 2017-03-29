<?php
namespace controlador;

require_once '../entidad/RolFormulario.php';
require_once '../modelo/RolFormulario.php';

$retorno = array("exito"=>1, "mensaje"=>"", "data"=>array());
try
{
        
    $idRolFormulario = filter_input(INPUT_POST, 'idRolFormulario');
    $idFormulario = filter_input(INPUT_POST, 'selIdFormulario');
    $idRol = filter_input(INPUT_POST, 'selIdRol');
    $estado = filter_input(INPUT_POST, 'selEstado');

    $rolFormularioE = new \entidad\RolFormulario();
    $rolFormularioE->setIdRolFormulario($idRolFormulario);
    $rolFormularioE->setIdFormulario($idFormulario);
    $rolFormularioE->setIdRol($idRol);
    $rolFormularioE->setEstado($estado);    

    $rolFormularioM = new \modelo\RolFormulario($rolFormularioE,null); //(Mandar como parametro un null)    
    $rolFormularioM->consultarRolFormulario();
    
    $numeroRegistros = $rolFormularioM->conexion->obtenerNumeroRegistros();
    $retorno['numeroRegistros'] = $numeroRegistros;
    
    $contador = 0;
    
    while ($fila = $rolFormularioM->conexion->obtenerObjeto()) {
        $retorno['data']['rolFormulario'][$contador]['idRolFormulario'] = $fila->idRolFormulario;
        $retorno['data']['rolFormulario'][$contador]['idFormulario'] = $fila->idFormulario;
        $retorno['data']['rolFormulario'][$contador]['idRol'] = $fila->idRol;   
        $retorno['data']['rolFormulario'][$contador]['estado'] = $fila->estado;                
        $contador++;
    }
}
catch (Exception $error)
{    
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);