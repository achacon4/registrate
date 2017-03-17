<?php


namespace entidad;

class Categoria {
    private $idCliente;
    private $nombreCategoria;
}

function getIdCliente() {
    return $this->idCliente;
}

 function getNombreCategoria() {
    return $this->nombreCategoria;
}

 function setIdCliente($idCliente) {
    $this->idCliente = $idCliente;
}

 function setNombreCategoria($nombreCategoria) {
    $this->nombreCategoria = $nombreCategoria;
}


