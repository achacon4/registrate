<?php

  if($_POST['usuario'] != "" && $_POST['password'] != ""){
        include('../modelo/LoginAcceso.php');
        $acceso = new Acceso($_POST['usuario'],$_POST['password']);
        $acceso->Login();
        exit;
  }else{
      echo json_encode('http://localhost/registrate/vista/FrmUsuario.php');      
  }

?>
