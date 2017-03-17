<?php
namespace entidad;
 class Usuario{
     private $idUsuario;
     private $usuario;
     private $contraseña;
     private $idDatosPersonales;  
     
     function getIdUsuario() {
         return $this->idUsuario;
     }

     function getUsuario() {
         return $this->usuario;
     }

     function getContraseña() {
         return $this->contraseña;
     }

     function getIdDatosPersonales() {
         return $this->idDatosPersonales;
     }

     function setIdUsuario($idUsuario) {
         $this->idUsuario = $idUsuario;
     }

     function setUsuario($usuario) {
         $this->usuario = $usuario;
     }

     function setContraseña($contraseña) {
         $this->contraseña = $contraseña;
     }

     function setIdDatosPersonales($idDatosPersonales) {
         $this->idDatosPersonales = $idDatosPersonales;
     }

    
 }