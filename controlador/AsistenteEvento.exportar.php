<?php

include "../entorno/Conexion.php"; 
require_once '../modelo/AsistenteEvento.php'; 
require_once '../entidad/AsistenteEvento.php'; 
//Base de datos 
//$mysqli = new mysqli('localhost','root','','registrate'); 
 
//fecha de la exportación 
$clienteE = new \entidad\AsistenteEvento(); 
$clienteM = new \modelo\AsistenteEvento($clienteE,null); 
$clienteM->exportar(); 
//Inicio de la instancia para la exportación en Excel 
$fecha = date("d-m-Y"); 
header('Content-type: application/vnd.ms-excel'); 
header("Content-Disposition: attachment; filename=RegistroAsistentes_$fecha.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 


echo $tabla;
echo "<table border=1> ";
echo "<tr> ";
echo     "<th>idAsistente</th> ";
echo 	"<th>Evento</th> ";
echo     "<th>Nombre</th> ";
echo 	"<th>Apellido Paterno</th> ";
echo 	"<th>Apellido Materno</th> ";
echo 	"<th>Tipo de Documento</th> ";
echo 	"<th>Numero de Documento</th> ";
echo 	"<th>Email</th> ";
echo 	"<th>Telefono</th> ";
echo 	"<th>Estado</th> ";
echo "</tr> ";

$numeroRegistros = $clienteM->conexion->obtenerNumeroRegistros();
$contador = 0;
while($row =  $clienteM->conexion->obtenerObjeto()){	
//       
//	
//     
////        $idEventoFK = $clienteE->setIdEventoFK($row['nombreEventos']);
////	$nombre = $clienteE->setNombre($row['nombre']);
////	$apaterno = $clienteE->setApaterno($row['apaterno']);
////        $amaterno = $clienteE->setAmaterno($row['amaterno']);
////        $tipoDocumento = $clienteE->setTipoDocumento($row['tipoDocumento']) ;
////        $numeroDocumento =$clienteE->setNumeroDocumento($row['numeroDocumento']);
////        $email = $clienteE->setEmail($row['email']);
////        $telefono = $clienteE->setTelefono($row['telefono']);
////        $estado = $clienteE->setEstado($row['estado']);
//
	echo "<tr> ";
	echo 	"<td>".$idAsistenteEvento['idAsistenteEvento'][$contador]  = $row->idAsistenteEvento."</td> "; 
        echo 	"<td>".$idAsistenteEvento['nombreEventos'][$contador]  = $row->nombreEvento."</td> "; 
        echo 	"<td>".$idAsistenteEvento['nombre'][$contador]  = $row->nombre."</td> "; 
	echo 	"<td>".$idAsistenteEvento['apaterno'][$contador]  = $row->apaterno."</td> "; 
        echo 	"<td>".$idAsistenteEvento['amaterno'][$contador]  = $row->amaterno."</td> ";
	echo 	"<td>".$idAsistenteEvento['tipoDocumento'][$contador]  = $row->tipoDocumento."</td> "; 
        echo 	"<td>". $idAsistenteEvento['numeroDocumento'][$contador]  = $row->numeroDocumento."</td> "; 
        echo 	"<td>".$idAsistenteEvento['email'][$contador]  = $row->email."</td> "; 
        echo 	"<td>". $idAsistenteEvento['telefono'][$contador]  = $row->telefono."</td> "; 
        echo 	"<td>".$idAsistenteEvento['estado'][$contador]  = $row->estado."</td> "; 
    
	echo "</tr> ";
$contador++;
}
echo "</table> ";


