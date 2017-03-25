<?php
namespace controlador;

require_once '../modelo/Evento.php';

$retorno = array("exito"=>1,"mensaje"=>"");
try{
    
    $idEvento = filter_input(INPUT_POST, 'hidIdEvento');
    $lugarFK = filter_input(INPUT_POST, 'idLugarFK');
    $datosPersonalesFK = filter_input(INPUT_POST, 'idDatoPersonalFK');
    $categoriaFK = filter_input(INPUT_POST, 'idCategoriaFK');
    $nombreEvento = filter_input(INPUT_POST, 'txtNombreEvento');
    $fechaInicial = filter_input(INPUT_POST, 'dtFechaInicial');
    $fechaFinal = filter_input(INPUT_POST, 'dtFechaFinal');
    $horaInicial = filter_input(INPUT_POST, 'tmHoraInicial');
    $horaFinal = filter_input(INPUT_POST, 'tmHoraFinal');
    $cantidadAsistentes = filter_input(INPUT_POST, 'txtCantidadAsistentes');
    $descripcionEvento = filter_input(INPUT_POST, 'txtDescripcionEvento');
    $estadoEvento = filter_input(INPUT_POST, 'selEstadoEvento');
    
    $eventoE = new entidad\Evento();
    $eventoE->setIdEvento($idEvento);
    $eventoE->setLugarFK($lugarFK);
    $eventoE->setDatosPersonalesFK($datosPersonalesFK);
    $eventoE->setCategoriaFK($categoriaFK);
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
    $eventoM->eliminar();
    
    $eventoM->conexion->confirmarTransaccion();
    
    $retorno['mensaje'] = 'Se eliminó correctamente el evento.';
}
catch (Exception $error)
{
    $eventoM->conexion->cancelarTransaccion();
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}

echo json_encode($retorno);