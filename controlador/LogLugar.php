<?php
  requiere_once '..modelo/Lugar'

$accion = filter_input(INPUT_POST, 'hidAaccion')
switch ($accion){
	case 'ADICIONAR'
	  $nombre =  filter_input(INPUT_POST, 'txtNombre');
	  $disponiblilidad = filter_input (INPUT_POST, 'selDisponibilidad');
	  $descripcion = filter_input (INPUT_POST, 'txtDescripcion');
	  $presupuesto = filter_input (INPUT_POST, 'txtPresupuesto');
	  $cantidadPersonas = filter_input (INPUT_POST, 'txtCantidadPersonas');


	  try{
	        $entidadE= new \entidad\Lugar();
	        $entidadE-> setNombre ($nombre);
	        $entidadE-> setDisponibilidad ($disponibilidad);
	        $entidadE-> setDescripcion ($descripcion);
	        $entidadE-> setPresupuesto ($presupuesto);
	        $entidadE-> setCantidadPersonas ($cantidadPersonas);

	        echo 'se adiciono correctamente el cliente.';
          catch (Exception $error){
              echo $error->getMessage();
          }
        break;
        
        case 'CONSULTAR':
               $idLugar = filter_input (INPUT_POST, 'hidIdLugar');
               $nombre = filter_input (INPUT_POST, 'txtnombre');
               $disponibilidad = filter_input (INPUT_POST, 'selDiponibilidad') ;
               $descripcion = filter_input (INPUT_POST, 'txtDescripcion');
               $presupuesto = filter_input (INPUT_POST, 'txtPresupuesto');
               $cantidadPersonas = filter_input (INPUT_POST, 'txtCantidadPersonas');
        try {
             $entidadE = new \entidad\Lugar ();
             $entidadE = setidLugar($idLugar);
             $entidadE = setNombre($nombre);
             $entidadE = setDisponibilidad ($disponibilidad);
             $entidadE = setDescripcion ($descripcion);
             $entidadE = setPresupuesto ($presupuesto);
             $entidadE = setCantidadPersona ($cantidadPersonas);
             

             $entidadM = new \modelo\lugar ($entidadE);
             $entidadM->consultar ();
             
             $numeroRegistros = $entidadM->conexion->obtenerNumeroRegistros();
             if ($numeroRegistros == 1){
                $fila = $entidadM->conexion->obtenerObjeto();
                $_POST ['hidIdLugar'] = $fila->idCliente;
                $_POST ['txtNombre'] = $fila->nombre;
                $_POST ['selDisponibilidad'] = $fila->disponibilidad;
                $_POST ['txtDescripcion'] = $fila->descripcion;
                $_POST ['txtPresupuesto'] = $fila->presupuesto;
                $_POST ['txtCantidadPersonas'] =$fila->cantidadPersonas;
             }catch (Exception $error){
                 echo $error->getMessage();
             }
             break;

             case 'ELIMINAR':
                try{
                   $idLugar = filter_input(INPUT_POST, 'hidIdLugar');
                   $sentenciaSql = "DELETE FROM lugar WHERE idLugar" =.idLugar;
                   $rsDelete = $conexion->query($sentenciaSql);
                   if ($rsDelete == false){
                     throw new Exception ("Error al eliminar los datos del cliente".$rsInsert);
                   }
                   echo 'se eliminó correctamente los datos del cliente';
                }catch (Exception $error){
                     echo $error->getMesage();
                }
                break;

                case 'MODIFICAR':
                   try {
                         $idLugar = filter_input (INPUT_POST, 'hidIdLugar');
                         $nombre =  filter_input(INPUT_POST, 'txtNombre');
	                     $disponibililidad = filter_input (INPUT_POST, 'selDisponibilidad');
	                     $descripcion = filter_input (INPUT_POST, 'txtDescripcion');
	                     $presupuesto = filter_input (INPUT_POST, 'txtPresupuesto');
	                     $cantidadPersonas = filter_input (INPUT_POST, 'txtCantidadPersonas');
                        
                        $sentenciaSql ="UPDATE lugar SET nombre =".$nombre.",disponibilidad = '".$disponibilidad."',descripcion = '".$descripcion."',presupuesto = '".$presupuesto."',cantidadPersonas = '".$cantidadPersonas."' WHERE idLugar =".$idLugar;
                        $rsUpdate = $conexion->query ($sentenciaSql);
                        if  ($rsUpdate == false){
                           throw new Exception ("error al modificar los datos del cliente".$rsInsert);
                        }catch (Exception $error){
                            echo $error->getMessage();
                        }
                   }

                   function obtenerCondicion(){

                         $idLugar = filter_input (INPUT_POST, 'hidIdLugar');
                         $nombre =  filter_input(INPUT_POST, 'txtNombre');
	                     $disponibililidad = filter_input (INPUT_POST, 'selDisponibilidad');
	                     $descripcion = filter_input (INPUT_POST, 'txtDescripcion');
	                     $presupuesto = filter_input (INPUT_POST, 'txtPresupuesto');
	                     $cantidadPersonas = filter_input (INPUT_POST, 'txtCantidadPersonas');

	                     $condicion ="";
	                     $whereAnd = " WHERE ";

	                     if(trim($idLugar)!=''){
                          $condicion = $condicion.$whereAnd." c.idLugar = ".$idLugar;
                          $whereAnd = " AND ";
                           }
                         if(trim($nombre)!=''){
                          $condicion = $condicion.$whereAnd." c.nombre = ".$nombre;
                          $whereAnd = " AND ";
                           }
                          if(trim($disponibilidad)!=''){
                          $condicion = $condicion.$whereAnd." c.disponibilidad = ".$disponibilidad;
                          $whereAnd = " AND ";
                           }
                            if(trim($presupuesto)!=''){
                          $condicion = $condicion.$whereAnd." c.presupuesto = ".$presupuesto;
                          $whereAnd = " AND ";
                           }
                            if(trim($cantidadPersonas)!=''){
                          $condicion = $condicion.$whereAnd." c.cantidadPersonas = ".$cantidadPersonas;
                          $whereAnd = " AND ";
                           }
                           return $condicion;


                   }

        }      




	  }
}