<?php
namespace controlador;
require_once '../entidad/Rol.php';
require_once '../modelo/Rol.php';

$retorno = array("exito"=>1,"mensaje"=>"");
    try
    {
        
        $idRol = $_POST['idRol'];
        $nombre= $_POST['txtNombreRol'];
        $estado = $_POST['selEstado'];

        $rolE = new \entidad\Rol();
        $rolE->setIdRol($idRol);
        $rolE->setNombreRol($nombre);
        $rolE->setEstado($estado);


        $rolM = new \modelo\Rol($rolE, null);
        $rolM->insertarRol();

        $retorno['mensaje'] = 'Registro exitoso';
        

    }catch(Exception $error)
    {
        $retorno['exito'] = 0;
        $retorno['mensaje']=$error->getMessage();
        
    }
   echo json_encode($retorno);
