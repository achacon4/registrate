<?php
require_once '../modelo/Lugar.php'; 
require_once '../entidad/Lugar.php';

$retorno = array("exito"=>1,"mensaje"=>"", "data"=>array("lugares"=>array()));
try {
          $idLugar = filter_input(INPUT_POST, 'hidIdLugar');
          $nombre = filter_input(INPUT_POST, 'txtNombre');
	  $disponiblilidad = filter_input (INPUT_POST, 'selDisponibilidad');
	  $descripcion = filter_input (INPUT_POST, 'txtDescripcion');
	  $presupuesto = filter_input (INPUT_POST, 'txtPresupuesto');
	  $cantidadPersonas = filter_input (INPUT_POST, 'txtCantidadPersonas');
          
           $entidadE= new \entidad\Lugar();
                $entidadE->setIdLugar($idLugar);
	        $entidadE-> setNombre ($nombre);
	        $entidadE-> setDisponibilidad ($disponiblilidad);
	        $entidadE-> setDescripcion ($descripcion);
	        $entidadE-> setPresupuesto ($presupuesto);
	        $entidadE-> setCantidadPersonas ($cantidadPersonas);
                
           $entidadM = new \modelo\Lugar($entidadE);       
           $entidadM->consultar();
           $numeroRegistros = $entidadM->conexion->obtenerNumeroRegistros();
           $retorno['data']['numeroRegistros'] = $numeroRegistros;
           $contador = 0;
           
           while($fila = $entidadM->conexion->obtenerObjeto()){
              $retorno['data']['lugares'][$contador]['idLugar']=$fila->idLugar; 
              $retorno['data']['lugares'][$contador]['nombre']=$fila->nombre;
              $retorno['data']['lugares'][$contador]['disponibilidad']=$fila->disponibilidad; 
              $retorno['data']['lugares'][$contador]['descripcion']=$fila->descripcion;
              $retorno['data']['lugares'][$contador]['presupuesto']=$fila->presupuesto;
              $retorno['data']['lugares'][$contador]['cantidadPersonas']=$fila->cantidadPersonas;
              
               $contador ++;
               
               
           }
          
} catch (Exception $ex) {
            $retorno['exito']=0;
          $retorno['mensaje']=$error->getMessage();
}
echo json_encode($retorno);