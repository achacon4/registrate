<?php
require_once '../modelo/Cliente.php';
require_once '../modelo/Municipio.php';
$retorno = array("exito"=>1,"mensaje"=>"");
try{
    
    $numeroIdentificacion = filter_input(INPUT_POST, 'txtNumeroIdentificacion');
    $cliente = filter_input(INPUT_POST, 'txtCliente');
    $municipioResidencia = filter_input(INPUT_POST, 'selMunicipioResidencia');
    $municipioNegocio = filter_input(INPUT_POST, 'selMunicipioNegocio');
    $fechaNacimiento = filter_input(INPUT_POST, 'txtFechaNacimiento');
    $estado = filter_input(INPUT_POST, 'selEstado');
    $telefonos = $_POST['telefonos'];
    
    
    $clienteE = new \entidad\Cliente();
    $clienteE->setNumeroIdentificacion($numeroIdentificacion);
    $clienteE->setCliente($cliente);

    $municipioResidenciaE = new \entidad\Municipio();
    $municipioResidenciaE->setIdMunicipio($municipioResidencia);
    $clienteE->setMunicipioResidencia($municipioResidenciaE);

    $municipioNegocioE = new \entidad\Municipio();
    $municipioNegocioE->setIdMunicipio($municipioNegocio);
    $clienteE->setMunicipioNegocio($municipioNegocioE);

    $clienteE->setFechaNacimiento($fechaNacimiento);
    $clienteE->setEstado($estado);

    $clienteE->setTelefonos($telefonos);
    
    $clienteM = new \modelo\Cliente($clienteE, null);  
    $clienteM->conexion->iniciarTransaccion();
    $clienteM->adicionar();
    
//    foreach ($telefonos as $indice => $telefono) {
//        $clienteTelefonoE = new \entidad\ClienteTelefono();
//        $clienteTelefonoE->setIdCliente($this->idCliente);
//        $clienteTelefonoE->setTipo($telefono['tipo']);
//        $clienteTelefonoE->setNumero($telefono['numero']);
//        $clienteTelefonoE->setEstado('A');
//
//        $clienteTelefonoM = new \modelo\ClienteTelefono($clienteTelefonoE, $clienteM->conexion);
//        $clienteTelefonoM->adicionar();
//    }
    $clienteM->conexion->confirmarTransaccion();
    
    $retorno['mensaje'] = 'Se adicionó correctamente un nuevo cliente.';
}catch (Exception $error){
    $clienteM->conexion->cancelarTransaccion();
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $error->getMessage();
}
echo json_encode($retorno);
