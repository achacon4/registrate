<?php
require_once '../modelo/DatosPersonales.php';

try
{
    $datosPersonales = $_REQUEST['term'];
    $datosPersonalesE = new \entidad\DatosPersonales();
    $datosPersonalesM = new \modelo\DatosPersonales($datosPersonalesE);
    $datosPersonalesM->consultarAjaxDatosPersonales($datosPersonales, 'limit 2');
    $contador = 0;
    
    while($fila = $datosPersonalesM->conexion->obtenerObjeto())
    {
        $retorno[$contador]['id'] = $fila->idDatosPersonales;
        $retorno[$contador]['value'] = $fila->nombre;
        $contador++;
    }
}
catch (Exception $error)
{
    
}

echo json_encode($retorno);