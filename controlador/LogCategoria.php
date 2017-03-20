<?php

require_once '../entidad/Categoria.php';
require_once '../modelo/CategoriaModelo.php';
$categoria = new CategoriaEntidad();
$categoriaModelo = new CategoriaModel(); 
$accion = $_POST["accion"];
switch ($accion) {
    case "ADICIONAR":
    echo "Entro y el nombre de la categoria es: ".$_POST["nombre"];
                $categoria->setNombreCategoria($_POST["nombre"]);    
                $objeto[] = array(
                        "categoria"=>$categoria->getNombreCategoria()
                    );
                if(count($objeto)>0){
                    $categoriaModelo->insertarCategoria($objeto);
                } 
        break;
    case "CONSULTAR" :
                 $categoriaModelo->consultarCategoria();
        break;
    case "MODIFICAR" :   
                $categoria->setIdCategoria($_POST["idCategoria"]);    
                $objeto[] = array(
                        "categoria"=>$categoria->getNombreCategoria()
                    );
                 $categoriaModelo->actualizarCategoria($objeto);
        break;
    case "ELIMINAR":
                $categoria->setIdCategoria($_POST["idCategoria"]);    
                $objeto[] = array(
                        "categoria"=>$categoria->getNombreCategoria()
                    );
                 $categoriaModelo->eliminarCategoria($objeto);
        break;
} 

