<?php

require_once("../entorno/conexion.php");

class CategoriaModel
{
	private $conexion;
	private $idCategoria;
	private $nombreCategoria;

	public function _construct(){
			$this->conexion = new Conexion();
	}

	public function consultarCategoria(){
		try{
			
			$objeto = array();		
					//Consulta a la tabla.
					$query = "SELECT *FROM categoria";
					$resultQuery = $this->conexion->ejecutar($query);
					while($result = $this->conexion->obtenerObjeto($resultQuery)){
						$objeto[] = array(
							"idCategoria"=>$result->idCategoria,
							"nombreCategoria"=>$result->nombreCategoria
							);
					}

					//Retornando el objeto a ajax.
					echo json_encode($objeto);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

//
	public function insertarCategoria($nomCategoria){
		$this->nombreCategoria = $nomCategoria;
		try{

				$query = "INSERT INTO categoria (nombreCategoria) VALUES ($this->nombreCategoria)";
				$resultQuery = $this->conexion->ejecutar($query);
				if($this->conexion->obtenerNumeroRegistros($this->conexion)>0){
		     		echo json_encode("Registro exitoso!");
				}else{
					echo json_encode("Error!");
				}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function actualizarCategoria($nomCategoria){
		$this->nombreCategoria = $nomCategoria;
		try{

				$query = "UPDATE categoria SET nombreCategoria = $this->nombreCategoria WHERE nombreCategoria =".$this->nombreCategoria;
				$resultQuery = $this->conexion->ejecutar($query);
				if($this->conexion->obtenerNumeroRegistros($this->conexion)>0){
		     		echo json_encode("Actualizacion exitoso!");
				}else{
					echo json_encode("Error!");
				}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

		public function eliminarCategoria($nomCategoria){
		$this->nombreCategoria = $nomCategoria;
		try{
				$query = "DELETE FROM categoria WHERE nomCategoria =".$this->nombreCategoria;
				$resultQuery = $this->conexion->ejecutar($query);
				if($this->conexion->obtenerNumeroRegistros($this->conexion)>0){
		     		echo json_encode("Elimino exitoso!");
				}else{
					echo json_encode("Error!");
				}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}

?>