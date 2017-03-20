<?php

//require_once '../modelo/AsistenciaEvento.php';
//
//$retorno=array("exito"=>1,"mensaje"=>"","data"=>array());
//
//try {
//    $asistencia = array();
//    if(isset($_POST['asistencia'])){
//        $asistencia = $_POST['asistencia'];
//    }
//                
//    $asistenciaE =  new \entidad\AsistenciaEvento();
//    $asistenciaM = new \modelo\AsistenciaEvento($asistenciaE, null);
//    
//    $asistenciaM->conexion->iniciarTransaccion();
//    $asistenciaM->adicionar($asistencia);
//    
//    $asistenciaM->conexion->confirmarTransaccion();
//    $retorno['mensaje']='Se registró correctamente la asistencia.';
//    
//} catch (Exception $ex) {
//    $asistenciaM->conexion->cancelarTransaccion();
//    $retorno['exito']=0;
//    $retorno['mensaje'] = $error->getMessage();
//}
//echo json_encode($retorno);



