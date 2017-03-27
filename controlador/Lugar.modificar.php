<?php
require_once '../modelo/Lugar.php'; 

$retorno= array("exito"=>1,"mensaje"=>"");

try {
       $idLugar = filter_input(INPUT_POST,'hidIdLugar');
       $nombre = filter_input(INPUT_POST,'txtNombre');
       $disponibilidad = filter_input(INPUT_POST, 'selDisponibilidad');
       $descripcion = filter_input (INPUT_POST, 'txtDescripcion');
       $presupuesto = filter_input (INPUT_POST, 'txtPresupuesto');
       $cantidadPersonas = filter_input (INPUT_POST, 'txtCantidadPersonas');
       
       $entidadE= new \entidad\Lugar();
       $entidadE->setIdLugar ($idLugar); 
       $entidadE-> setNombre ($nombre); 
       $entidadE-> setDisponibilidad ($disponibilidad);
       $entidadE-> setDescripcion ($descripcion);
       $entidadE-> setPresupuesto ($presupuesto);
       $entidadE-> setCantidadPersonas ($cantidadPersonas);
       
       $entidadM = new \modelo\Lugar($entidadE, null);
       
        $entidadM->conexion->iniciarTransaccion();
        $entidadM->modificar();
        $entidadM->conexion->confirmarTransaccion();
        $retorno['mensaje']='Se modificó correctamente';
} catch (Exception $ex) {
    $entidadM->conexion->cancelarTransaccion();
    $retorno['exito']=0;
    $retorno['mensaje']=$error->getMessage();
}
echo json_encode($retorno);

