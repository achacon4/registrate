<?php
namespace controlador;

require_once '../modelo/Evento.php';
require_once '../modelo/Lugar.php';
require_once '../modelo/DatosPersonales.php';
require_once '../modelo/Categoria.php';

$retorno = array("exito"=>1, "mensaje"=>"", "data"=>array());
try
{
    $idEvento = filter_input(INPUT_POST, 'hidIdEvento');
    $idLugarFK = filter_input(INPUT_POST, 'selLugarEvento');
    $idDatosPersonalesFK = filter_input(INPUT_POST, 'selDatosPersonales');
    $idCategoriaFK = filter_input(INPUT_POST, 'selCategoriaEvento');
//    $LugarFK = filter_input(INPUT_POST, 'hidIdLugarFK');
//    $datosPersonalesFK = filter_input(INPUT_POST, 'hidIdDatosPersonalesFK');
//    $categoriaFK = filter_input(INPUT_POST, 'hidIdCategoriaFK');
    $nombreEvento = filter_input(INPUT_POST, 'txtNombreEvento');
    $fechaInicial = filter_input(INPUT_POST, 'dtFechaInicial');
    $fechaFinal = filter_input(INPUT_POST, 'dtFechaFinal');
    $horaInicial = filter_input(INPUT_POST, 'tmHoraInicial');
    $horaFinal = filter_input(INPUT_POST, 'tmHoraFinal');
    $cantidadAsistentes = filter_input(INPUT_POST, 'txtCantidadAsistentes');
    $descripcionEvento = filter_input(INPUT_POST, 'txtDescripcionEvento');
    $estadoEvento = filter_input(INPUT_POST, 'selEstadoEvento');
    
    $eventoE = new \entidad\Evento();
    $eventoE->setIdEvento($idEvento);
    
    $lugarE = new \entidad\Lugar();
    $lugarE->setIdLugar($idLugarFK);
    $eventoE->setLugarFK($lugarE);
    
    $datosPersonalesE = new \entidad\DatosPersonales();
    $datosPersonalesE->setIdDatosPersonales($idDatosPersonalesFK);
    $eventoE->setDatosPersonalesFK($datosPersonalesE);
    
    $categoriaE = new \entidad\Categoria();
    $categoriaE->setIdCategoria($idCategoriaFK);
    $eventoE->setCategoriaFK($categoriaE);
    
    $eventoE->setNombreEvento($nombreEvento);
    $eventoE->setFechaInicial($fechaInicial);
    $eventoE->setFechaFinal($fechaFinal);
    $eventoE->setHoraInicial($horaInicial);
    $eventoE->setHoraFinal($horaFinal);
    $eventoE->setCantidadAsistentes($cantidadAsistentes);
    $eventoE->setDescripcionEvento($descripcionEvento);
    $eventoE->setEstadoEvento($estadoEvento);

    $eventoM = new \modelo\Evento($eventoE); //(Mandar como parametro un null)
    
    $eventoM->consultar();
    
    $numeroRegistros = $eventoM->conexion->obtenerNumeroRegistros();
    $retorno['numeroRegistros'] = $numeroRegistros;
    
    $contador = 0;
    
    while ($fila = $eventoM->conexion->obtenerObjeto()) {
        $retorno['data']['eventos'][$contador]['idEvento'] = $fila->idEvento;
        $retorno['data']['eventos'][$contador]['idLugarFK'] = $fila->idLugarFK;
        $retorno['data']['eventos'][$contador]['lugarFK'] = $fila->lugarFK;
        $retorno['data']['eventos'][$contador]['idDatosPersonalesFK'] = $fila->idDatosPersonalesFK;
        $retorno['data']['eventos'][$contador]['datosPersonalesFK'] = $fila->datosPersonalesFK;
        $retorno['data']['eventos'][$contador]['idCategoriaFK'] = $fila->idCategoriaFK;
        $retorno['data']['eventos'][$contador]['categoriaFK'] = $fila->categoriaFK;
        $retorno['data']['eventos'][$contador]['nombreEvento'] = utf8_encode($fila->nombreEvento);
        $retorno['data']['eventos'][$contador]['fechaInicial'] = $fila->fechaInicial;
        $retorno['data']['eventos'][$contador]['fechaFinal'] = $fila->fechaFinal;
        $retorno['data']['eventos'][$contador]['horaInicial'] = $fila->horaInicial;
        $retorno['data']['eventos'][$contador]['horaFinal'] = $fila->horaFinal;
        $retorno['data']['eventos'][$contador]['cantidadAsistentes'] = $fila->cantidadAsistentes;
        $retorno['data']['eventos'][$contador]['descripcionEvento'] = $fila->descripcionEvento;
        $retorno['data']['eventos'][$contador]['estadoEvento'] = $fila->estadoEvento;
        
        $contador++;
    }
}
catch (Exception $error)
{
    
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);