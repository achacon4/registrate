<?php
namespace controlador;
require_once '../modelo/Categoria.php';

$retorno = array("exito"=>1,"mensaje"=>"");
try
{
    $nombreCategoria = filter_input(INPUT_POST, 'txtNombreCategoria');
    
    $categoriaE = new \entidad\Categoria();
    $categoriaE->setNombreCategoria($nombreCategoria);
    
    $categoriaM = new \modelo\Categoria($categoriaE);
    
    $categoriaM->conexion->iniciarTransaccion();
    $categoriaM->adicionar();
    
    $categoriaM->conexion->confirmarTransaccion();
    
    $retorno['mensaje'] = 'Se adicionó correctamente un nueva categoria.';
}
catch (Exception $error)
{
    $categoriaM->conexion->cancelarTransaccion();
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}

echo json_encode($retorno);