<?php

require_once '../entidad/Categoria.php';

$accion = INPUT_POST['accion'];
switch ($accion) {
    case "ADICIONAR":
        $nombreCategoria = INPUT_POST['txtNombreCategoria'];

        try {
            $categoriaE = new \entidad\Categoria();
            $categoriaE->setNombreCategoria($nombreCategoria);

            echo '<br>Se adicion� correctamente un nuevo cliente.';
        } catch (Exception $error) {
            echo $error->getMessage();
        }
        break;

    case "CONSULTAR" :
        $idCategoria = filter_input(INPUT_POST, 'hidIdCategoria');
        $nombreCategoria = filter_input(INPUT_POST, 'txtNombreCategoria');
        try {
            $categoriaE = new \entidad\Categoria();
            $categoriaE->setIdCategoria($idCategoria);
            $categoriaE->setNombreCategoria($nombreCategoria);
        } catch (Exception $ex) {
            
        } 
    case "MODIFICAR" : 
        
} 

//{
//    var accion = "adicionar";
//    var nombre = $(#txtNombre).val();
//    var json = {"accion":accion,"txtNombreCategoria":nombre};
//    data : json;
//            
//}
