<?php
require_once("../entorno/Conexion.php");

class Acceso{
	
	private $conexion;
	private $usuario;
	private $pass;

	public function __construct($usuario,$pass){
		$this->conexion = new Conexion();
		$this->usuario = $usuario;
		$this->pass = $pass;
	}

	public function Login(){
		try {
	            $query = "SELECT * FROM usuario WHERE contrasena=".$this->pass;
                $resultQuery = $this->conexion->ejecutar($query);
	            if($this->conexion->obtenerNumeroRegistros($resultQuery)>0){
	            	 echo json_encode('http://localhost/registrate/vista/FrmCategoria.php');	            	 
	            }

	        } catch (Exception $e) {
	          echo $e -> getMessage();
	        }
	}
}

?>