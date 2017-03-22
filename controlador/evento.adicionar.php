<?php
namespace controlador;

require_once '../modelo/Evento.php';
require_once '../modelo/Lugar.php';
require_once '../modelo/DatosPersonales.php';
require_once '../modelo/Categoria.php';

$retorno = array("exito"=>1,"mensaje"=>"");
try
{
    $lugarFK = filter_input(INPUT_POST, 'selLugarEvento');
    $datosPersonalesFK = filter_input(INPUT_POST, 'selDatosPersonales');
    $categoriaFK = filter_input(INPUT_POST, 'selCategoriaEvento');
    $nombreEvento = filter_input(INPUT_POST, 'txtNombreEvento');
    $fechaInicial = filter_input(INPUT_POST, 'dtFechaInicial');
    $fechaFinal = filter_input(INPUT_POST, 'dtFechaFinal');
    $horaInicial = filter_input(INPUT_POST, 'tmHoraInicial');
    $horaFinal = filter_input(INPUT_POST, 'tmHoraFinal');
    $cantidadAsistentes = filter_input(INPUT_POST, 'txtCantidadAsistentes');
    $descripcionEvento = filter_input(INPUT_POST, 'txtDescripcionEvento');
    $estadoEvento = filter_input(INPUT_POST, 'selEstadoEvento');
   
    
    $eventoE = new \entidad\Evento();
    
    $lugarE = new \entidad\Lugar();
    $lugarE->setIdLugar($lugarFK);
    $eventoE->setLugarFK($lugarE);
    
    $datosPersonalesE = new \entidad\DatosPersonales();
    $datosPersonalesE->setIdDatosPersonales($datosPersonalesFK);
    $eventoE->setDatosPersonalesFK($datosPersonalesE);
    
    $categoriaE = new \entidad\Categoria();
    $categoriaE->setIdCategoria($categoriaFK);
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
    
    $eventoM->conexion->iniciarTransaccion();
    $eventoM->adicionar();
    
    $eventoM->conexion->confirmarTransaccion();
    
    $retorno['mensaje'] = 'Se adicionó correctamente un nuevo evento.';
}
catch (Exception $error)
{
    $eventoM->conexion->cancelarTransaccion();
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}

echo json_encode($retorno);