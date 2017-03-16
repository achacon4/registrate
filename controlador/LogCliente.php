<?php
require_once '../modelo/Municipio.php';
require_once '../modelo/Cliente.php';

$accion = filter_input(INPUT_POST, 'hidAccion');
switch ($accion){
    case  'ADICIONAR':
        $numeroIdentificacion = filter_input(INPUT_POST, 'txtNumeroIdentificacion');
        $cliente = filter_input(INPUT_POST, 'txtCliente');
        $idMunicipioResidencia = filter_input(INPUT_POST, 'selMunicipioResidencia');
        $idMunicipioNegocio = filter_input(INPUT_POST, 'selMunicipioNegocio');
        $fechaNacimiento = filter_input(INPUT_POST, 'txtFechaNacimiento');
        $estado = filter_input(INPUT_POST, 'selEstado');

        try{
            $clienteE = new \entidad\Cliente();
            $clienteE->setNumeroIdentificacion($numeroIdentificacion);
            $clienteE->setCliente($cliente);
            
            $municipioResidenciaE = new \entidad\Municipio();
            $municipioResidenciaE->setIdMunicipio($idMunicipioResidencia);
            $clienteE->setMunicipioResidencia($municipioResidenciaE);
            
            $municipioNegocioE = new \entidad\Municipio();
            $municipioNegocioE->setIdMunicipio($idMunicipioNegocio);
            $clienteE->setMunicipioNegocio($municipioNegocioE);
            
            $clienteE->setFechaNacimiento($fechaNacimiento);
            $clienteE->setEstado($estado);
            
            $clienteM = new \modelo\Cliente($clienteE);
            $clienteM->adicionar();
            
            
            echo '<br>Se adicionó correctamente un nuevo cliente.';
        }catch (Exception $error){
            echo $error->getMessage();
        }
    breaK;
    case  'CONSULTAR':
        try{
            $idCliente = filter_input(INPUT_POST, 'hidIdCliente');
            $numeroIdentificacion = filter_input(INPUT_POST, 'txtNumeroIdentificacion');
            $cliente = filter_input(INPUT_POST, 'txtCliente');
            $idMunicipioResidencia = filter_input(INPUT_POST, 'selMunicipioResidencia');
            $idMunicipioNegocio = filter_input(INPUT_POST, 'selMunicipioNegocio');
            $fechaNacimiento = filter_input(INPUT_POST, 'txtFechaNacimiento');
            $estado = filter_input(INPUT_POST, 'selEstado');
            
            $clienteE = new \entidad\Cliente();
            $clienteE->setIdCliente($idCliente);
            $clienteE->setNumeroIdentificacion($numeroIdentificacion);
            $clienteE->setCliente($cliente);
            
            $municipioResidenciaE = new \entidad\Municipio();
            $municipioResidenciaE->setIdMunicipio($idMunicipioResidencia);
            $clienteE->setMunicipioResidencia($municipioResidenciaE);
            
            $municipioNegocioE = new \entidad\Municipio();
            $municipioNegocioE->setIdMunicipio($idMunicipioNegocio);
            $clienteE->setMunicipioNegocio($municipioNegocioE);
            
            $clienteE->setFechaNacimiento($fechaNacimiento);
            $clienteE->setEstado($estado);
            
            $clienteM = new \modelo\Cliente($clienteE);
            $clienteM->consultar();
            $numeroRegistros = $clienteM->conexion->obtenerNumeroRegistros();
            if($numeroRegistros == 1){
                $fila = $clienteM->conexion->obtenerObjeto();
                $_POST['hidIdCliente'] = $fila->idCliente;
                $_POST['txtNumeroIdentificacion'] = $fila->numeroIdentificacion;
                $_POST['txtCliente'] = $fila->cliente;
                $_POST['selMunicipioResidencia'] = $fila->idMunicipioResidencia;
                $_POST['txtFechaNacimiento'] = $fila->fechaNacimiento;
                $_POST['selEstado'] = $fila->estado;
            }
        } catch (Exception $ex) {
            echo $error->getMessage();
        }
    break;
}