<?php

//require_once '../modelo/asistenteEvento.php';

$retorno=array("exito"=>1,"mensaje"=>"","data"=>array());

try {
    $cantidad = filter_input(INPUT_POST, 'hidCantidad');
    
//    $asistenciaE =  new \entidad\AsistenciaEvento();
//    $asistenciaM = new \modelo\AsistenciaEvento($asistenciaE, null);

//    $asistenciaM->conexion->iniciarTransaccion();
    
    for($i = 0; $i < $cantidad; $i++){
        $idAsistenteEvento = filter_input(INPUT_POST, 'hidAsistencia'.$i);
        if(isset($_POST['cbAsistencia'.$i])){
            $estado = 'CONFIRMADO';
        }else{
            $estado = 'SIN CONFIRMAR';
        }
        echo "<br>".$sentenciaSql = "UPDATE asistenteevento SET  estado = '$estado' WHERE idAsistenteEvento = $idAsistenteEvento";
        //$asistenciaM->modificarEstado($idAsistenteEvento, $estado);
    }               
//    $asistenciaM->conexion->confirmarTransaccion();
    $retorno['mensaje']='Se registró correctamente la asistencia.';
    
} catch (Exception $ex) {
    $asistenciaM->conexion->cancelarTransaccion();
    $retorno['exito']=0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);



