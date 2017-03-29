<?php
namespace entidad;

class Menu{
    private $idMenu;
    private $menu;
    private $estado;
    
    function getIdMenu() {
        return $this->idMenu;
    }

    function getMenu() {
        return $this->menu;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    function setMenu($menu) {
        $this->menu = $menu;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
}