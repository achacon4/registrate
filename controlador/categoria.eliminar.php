<?php
namespace controlador;

require_once '../modelo/Categoria.php';

$retorno = array("exito"=>1,"mensaje"=>"");
try
{
    $idCategoria = filter_input(INPUT_POST, 'hidIdCategoria');
    $nombreCategoria = filter_input(INPUT_POST, 'txtNombreCategoria');
    
    $categoriaE = new \entidad\Categoria();
    $categoriaE->setIdCategoria($idCategoria);
    $categoriaE->setNombreCategoria($nombreCategoria);
    
    $categoriaM = new \modelo\Categoria($categoriaE);
    
    $categoriaM->conexion->iniciarTransaccion();
    $categoriaM->eliminar();
    
    $categoriaM->conexion->confirmarTransaccion();
    
    $retorno['mensaje'] = 'Se eliminó correctamente la categoria.';
}
catch (Exception $error)
{
    $categoriaM->conexion->cancelarTransaccion();
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}

echo json_encode($retorno);