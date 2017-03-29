<?php
namespace controlador;
require_once '../entidad/RolFormulario.php';
require_once '../modelo/RolFormulario.php';

$retorno = array("exito"=>1,"mensaje"=>"");
    try
    {
        
        $idRolFormulario = $_POST['idRolFormulario'];
        $selIdFormulario= $_POST['selIdFormulario'];
        $selIdRol= $_POST['selIdRol'];
        $estado = $_POST['selEstado'];

        $rolFormularioE = new \entidad\RolFormulario();
        $rolFormularioE->setIdRolFormulario($selIdFormulario);
        $rolFormularioE->setIdFormulario($selIdFormulario);
        $rolFormularioE->setIdRol($selIdRol);
        $rolFormularioE->setEstado($estado);

        $rolM = new \modelo\RolFormulario($rolFormularioE, null);
        $rolM->insertarRolFormulario();

        $retorno['mensaje'] = 'Registro exitoso';
        

    }catch(Exception $error)
    {
        $retorno['exito'] = 0;
        $retorno['mensaje']=$error->getMessage();
        
    }
   echo json_encode($retorno);
