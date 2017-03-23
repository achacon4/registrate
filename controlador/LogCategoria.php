<?php

require_once '../entidad/Categoria.php';
require_once '../modelo/CategoriaModelo.php';
$categoria = new CategoriaEntidad();
$categoriaModelo = new CategoriaModel(); 
$accion = $_POST["accion"];
switch ($accion) {
    case "ADICIONAR":
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
                $categoria->setIdCategoria($_POST["categoria"]); 
                $categoria->setNombreCategoria($_POST["nombre"]);
                $objeto[] = array(
                        "categoria"=>$categoria->getIdCategoria(),
                        "nombreCategoria"=>$categoria->getNombreCategoria()
                    );
                 $categoriaModelo->actualizarCategoria($objeto);
        break;
    case "ELIMINAR":
                $categoria->setIdCategoria($_POST["categoria"]);    
                $objeto[] = array(
                        "categoria"=>$categoria->getIdCategoria()
                    );
               
                 $categoriaModelo->eliminarCategoria($objeto);
        break;
    case "CONSULTARID":
        $id = $_POST["id"];
        $categoriaModelo->consultarId($id);
        break;
} 

