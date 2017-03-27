<?php

namespace entidad;

class Categoria
{
    private $idCategoria;
    private $nombreCategoria;

    function getIdCategoria()
    {
        return $this->idCategoria;
    }

    function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;
    }

}
