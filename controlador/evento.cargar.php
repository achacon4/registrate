<?php
namespace controlador;
require_once '../modelo/Lugar.php';
require_once '../modelo/DatosPersonales.php';
require_once '../modelo/Categoria.php';

$retorno = array("exito"=>1,"mensaje"=>"", "data"=>array());

try
{
    $lugarE = new \entidad\Lugar();
    $lugarM = new \modelo\Lugar($lugarE);
    $lugarM->consultar();
    
    $datosPersonalesE = new \entidad\DatosPersonales();
    $datosPersonalesM = new \modelo\DatosPersonales($datosPersonalesE);
    $datosPersonalesM->consultar();
    
    $categoriaE = new \entidad\Categoria();
    $categoriaM = new \modelo\Categoria($categoriaE);
    $categoriaM->consultar();
    
    
    $contador = 0;
    
    while($fila = $lugarM->conexion->obtenerObjeto()){
        $retorno['data']['lugares'][$contador]['idLugar'] = $fila->idLugar;
        $retorno['data']['lugares'][$contador]['nombre'] = $fila->nombre;
        $contador++;
    }
    
    while($fila = $datosPersonalesM->conexion->obtenerObjeto()){
        $retorno['data']['datosPersonales'][$contador]['idDatosPersonales'] = $fila->idDatosPersonales;
        $retorno['data']['datosPersonales'][$contador]['nombre'] = $fila->nombre;
        $contador++;
    }
    
    while($fila = $categoriaM->conexion->obtenerObjeto()){
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