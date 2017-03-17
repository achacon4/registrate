<?php
namespace entidad;
 class Usuario{
     private $idUsuario;
     private $usuario;
     private $contrasena;
     private $idDatosPersonales;  
     
     function getIdUsuario() {
         return $this->idUsuario;
     }

     function getUsuario() {
         return $this->usuario;
     }

     function getContrasena() {
         return $this->contrasena;
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

     function setContrasena($contrasena) {
         $this->contrasena = $contrasena;
     }

     function setIdDatosPersonales($idDatosPersonales) {
         $this->idDatosPersonales = $idDatosPersonales;
     }



    
 }