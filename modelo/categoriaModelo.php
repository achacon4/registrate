<?php

require_once("../entorno/Conexion.php");

class CategoriaModel
{
	private $conexion;
	private $idCategoria;
	private $nombreCategoria;

	public function __construct(){
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
                $this->nombreCategoria = $nomCategoria[0]['categoria'];
		try{
//Cuando una variable php se crea dentro de un metodo, esta variable es LOCAL y no necesita de atributo. No entiendo el puto error
				$query = "INSERT INTO categoria (nombreCategoria) VALUES ('$this->nombreCategoria')";
				$resultQuery = $this->conexion->ejecutar($query);
				if($this->conexion->obtenerNumeroRegistros($this->conexion)>0){
		     		echo json_encode(Array("resultado"=>"Registro exitoso!"));
				}else{
					echo json_encode(Array("resultado"=>"Error!"));
				}
		}
		catch(Exception $e){
			echo json_encode(Array("resultado"=>"Ocurrio un error al registrar la categoria."));
		}
	}

	public function actualizarCategoria($nomCategoria){
		$this->nombreCategoria = $nomCategoria[0]["categoria"];
                $nombre = $nomCategoria[0]["nombreCategoria"];
		try{

				$query = "UPDATE categoria SET nombreCategoria = '$nombre' WHERE idCategoria =".$this->nombreCategoria;
				$resultQuery = $this->conexion->ejecutar($query);
				if($this->conexion->obtenerNumeroRegistros($this->conexion)>0){
		     		echo json_encode(Array("resultado"=>"Cambio efectuado con exito!"));
				}else{
					echo json_encode(Array("resultado"=>"Error!"));
				}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

		public function eliminarCategoria($nomCategoria){
		$this->nombreCategoria = $nomCategoria[0]["categoria"];
                echo $this->nombreCategoria;
		try{
				$query = "DELETE FROM categoria WHERE idCategoria =".$this->nombreCategoria;
				$resultQuery = $this->conexion->ejecutar($query);
				if($this->conexion->obtenerNumeroRegistros($this->conexion)>0){
		     		echo json_encode(array("resultado"=>"Elimino efectuado!"));
				}else{
					echo json_encode(Array("resultado"=>"Error al eliminar!"));
				}
		}
		catch(Exception $e){
			echo json_encode(Array("resultado"=>"Ocurrio un error: La categoria no se puede eliminar por que tiene una dependecia de llave FK"));
		}
	}
        
        public function consultarId($id){
            try{
                $query = "SELECT * FROM categoria WHERE idCategoria=".$id;
                $resultQuery = $this->conexion->ejecutar($query);
                while($fila = $this->conexion->obtenerObjeto($resultQuery)){
            		$objeto[] = array(
                            "idCategoria"=>$fila->idCategoria,
                            "nombreCategoria"=>$fila->nombreCategoria                            
                        );
		}
                echo json_encode($objeto);
            } catch (Exception $ex) {
                   echo $ex->getMessage();
            }
        }
}

?>