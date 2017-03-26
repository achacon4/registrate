<?php
require_once '../modelo/Categoria.php';

try
{
    $categoria = $_REQUEST['term'];
    $categoriaE = new \entidad\Categoria();
    $categoriaM = new \modelo\Categoria($categoriaE);
    $categoriaM->consultarAjaxCategoria($categoria, 'limit 2');
    $contador = 0;
    
    while($fila = $categoriaM->conexion->obtenerObjeto())
    {
        $retorno[$contador]['id'] = $fila->idCategoria;
        $retorno[$contador]['value'] = $fila->nombreCategoria;
        $contador++;
    }
}
catch (Exception $error)
{
    
}

echo json_encode($retorno);