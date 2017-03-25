<?php
namespace entidad;
 class Usuario{
     private $idUsuario;
     private $idDatosPersonales;
     private $usuario;
     private $contrasenia;
     private $contrasenia2;
     private $contraseniaNueva;
     private $estado;  
     
     function getIdUsuario() {
         return $this->idUsuario;
     }

     function getUsuario() {
         return $this->usuario;
     }

     function getContrasenia() {
         return $this->contrasenia;
     }
     
     function getContrasenia2() {
         return $this->contrasenia2;
     }

     function getContraseniaNueva() {
         return $this->contraseniaNueva;
     }
     
     function getEstado() {
         return $this->estado;
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

     function setContrasenia($contrasenia) {
         $this->contrasenia = $contrasenia;
     }
     
     function setContrasenia2($contrasenia2) {
         $this->contrasenia2 = $contrasenia2;
     }

     function setContraseniaNueva($contraseniaNueva) {
         $this->contraseniaNueva = $contraseniaNueva;
     }
     
     function setEstado($estado) {
         $this->estado = $estado;
     }

     function setIdDatosPersonales($idDatosPersonales) {
         $this->idDatosPersonales = $idDatosPersonales;
     }    
 }
