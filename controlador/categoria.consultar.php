<?php
namespace controlador;
require_once '../modelo/Categoria.php';

$retorno = array("exito"=>1, "mensaje"=>"", "data"=>array());
try
{
    $idCategoria = filter_input(INPUT_POST, 'hidIdCategoria');
    $nombreCategoria = filter_input(INPUT_POST, 'txtNombreCategoria');
    
    $categoriaE = new \entidad\Categoria();
    $categoriaE->setIdCategoria($idCategoria);
    $categoriaE->setNombreCategoria($nombreCategoria);
    
    $categoriaM = new \modelo\Categoria($categoriaE);
    $categoriaM->consultar();
    
    $numeroRegistros = $categoriaM->conexion->obtenerNumeroRegistros();
    $retorno['numeroRegistros'] = $numeroRegistros;
    
    $contador = 0;
    
    while ($fila = $categoriaM->conexion->obtenerObjeto()) {
        $retorno['data']['categorias'][$contador]['idCategoria'] = $fila->idCategoria;
        $retorno['data']['categorias'][$contador]['nombreCategoria'] = $fila->nombreCategoria;
        
        $contador++;
    }
}
catch (Exception $error)
{
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}

echo json_encode($retorno);