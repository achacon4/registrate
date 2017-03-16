<?php
require_once '../modelo/Cliente.php';
require_once '../modelo/Municipio.php';
$retorno = array("exito"=>1,"mensaje"=>"", "data"=>array("clientes"=>array(), "telefonos"=>array()));

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
    $retorno['data']['numeroRegistros'] = $numeroRegistros;
    
    $contador = 0;
    while ($fila = $clienteM->conexion->obtenerObjeto()) {
        $retorno['data']['clientes'][$contador]['idCliente'] = $fila->idCliente;
        $retorno['data']['clientes'][$contador]['numeroIdentificacion'] = $fila->numeroIdentificacion;
        $retorno['data']['clientes'][$contador]['cliente'] = $fila->cliente;
        $retorno['data']['clientes'][$contador]['idMunicipioResidencia'] = $fila->idMunicipioResidencia;
        $retorno['data']['clientes'][$contador]['municipioResidencia'] = $fila->municipioResidencia;
        $retorno['data']['clientes'][$contador]['fechaNacimiento'] = $fila->fechaNacimiento;
        $retorno['data']['clientes'][$contador]['estado'] = $fila->estado;
        $retorno['data']['clientes'][$contador]['idMunicipioNegocio'] = $fila->idMunicipioNegocio;
        $retorno['data']['clientes'][$contador]['municipioNegocio'] = $fila->municipioNegocio;
        $retorno['data']['clientes'][$contador]['departamentoNegocio'] = $fila->departamentoNegocio;
        
        if($numeroRegistros === 1){
            $contadorTelefonos = 0;
            $clienteTelefonoE = new \entidad\ClienteTelefono();
            $clienteTelefonoE->setIdCliente($fila->idCliente);
            
            $clienteTelefonoM = new \modelo\ClienteTelefono($clienteTelefonoE);
            $clienteTelefonoM->consultar();
            while ($telefonos = $clienteTelefonoM->conexion->obtenerObjeto()) {
                $retorno['data']['telefonos'][$contadorTelefonos]['id'] = $telefonos->idClienteTelefono;
                $retorno['data']['telefonos'][$contadorTelefonos]['tipo'] = $telefonos->tipo;
                $retorno['data']['telefonos'][$contadorTelefonos]['numero'] = $telefonos->numero;
                $contadorTelefonos++;
            }
        }
        
        $contador++;
    }
} catch (Exception $ex) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);