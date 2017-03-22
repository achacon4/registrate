<?php
namespace modelo;
require_once '../entorno/Conexion.php';
require_once '../entidad/AsistenteEvento.php';


class AsistenteEvento
{
    public $conexion;

    private $idAsistenteEvento;
    private $idEventoFK;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $tipoDocumento;
    private $numeroDocumento;
    private $email;
    private $telefono;
    private $estado;
	

	function __construct(\entidad\AsistenteEvento $asistente, $conexion =null){

			$this->idAsistenteEvento = $asistente->getIdAsistenteEvento();
			$this->idEventoFK = $asistente->getIdEventoFK();
			$this->nombre = $asistente->getNombre();
			$this->apaterno = $asistente->getApaterno();
			$this->amaterno = $asistente->getAmaterno();
			$this->tipoDocumento = $asistente->getTipoDocumento();
			$this->numeroDocumento = $asistente->getNumeroDocumento();
			$this->email = $asistente->getEmail();
			$this->telefono = $asistente->getTelefono();
                        $this->estado = $asistente->getEstado();

                      if($conexion==null)
                      {
                          $this->conexion = new \Conexion();
                      }else
                      {
                          $this->conexion = $conexion;
                      }
			
}

    function adicionar()
    {
            $sentenciaSql = "INSERT INTO asistenteevento
                                    (
                                      idEventoFK
                                      ,nombre
                                      ,apaterno
                                      ,amaterno
                                      ,tipoDocumento
                                      ,numeroDocumento
                                      ,email
                                      ,telefono
                                      ,estado
                                    )
                                    VALUES
                                    (
                                   
                                    ".$this->idEventoFK->getIdEvento()."
                                    ,'$this->nombre'
                                    ,'$this->apaterno'
                                    ,'$this->amaterno'
                                    ,'$this->tipoDocumento'
                                    ,'$this->numeroDocumento'
                                    ,'$this->email'
                                    ,'$this->telefono'
                                    ,'$this->estado'

                                    )";

                $this->conexion->ejecutar($sentenciaSql);
    }



    function modificar()
     {
         $sentenciaSql = "UPDATE 
                            asistenteevento 
                                 SET 
                                 idEventoFK= $this->idEventoFK
                                 ,nombre= '$this->nombre'
                                 ,apaterno= '$this->apaterno'
                                 ,amaterno= '$this->amaterno'
                                 ,tipoDocumento='$this->tipoDocumento'
                                 ,numeroDocumento= '$this->numeroDocumento'
                                 ,fechaNacimiento='$this->fechaNacimiento'
                                 ,email= '$this->email'
                                 ,telefono= '$this->telefono' 
                                 WHERE 
                                 idAsistenteEvento = $this->idAsistenteEvento";

              $this->conexion->ejecutar($sentenciaSql);
          }

      

     function consultarTodo()
     {

        $sentenciaSql = "SELECT * FROM   asistenteevento  "; 
        $this->conexion->ejecutar($sentenciaSql);
     }

     function consultar()
     {
      $condicion = $this->obtenerCondicion() ;
      $sentenciaSql = "SELECT * FROM   asistenteevento ".$condicion; 
      $this->conexion->ejecutar($sentenciaSql);
     }
     
     function obtenerCondicion()
    {
       $condicion = '';
        $whereAnd = ' WHERE ';

        if($this->idAsistenteEvento!= '')
        {
            $condicion = $condicion.$whereAnd."idAsistenteEvento = '". $this->idAsistenteEvento."'";
            $whereAnd = ' AND ';
        }
         $idEvento = $this->idEventoFK->getIdEvento();
        if($idEvento != '')
        {
            $condicion = $condicion.$whereAnd."idEventoFK = '". $this->idEventoFK."'";
            $whereAnd = ' AND ';
        }
        if($this->nombre != '')
        {
            $condicion = $condicion.$whereAnd."nombre LIKE  '%". $this->nombre."%'";
            $whereAnd = ' AND ';
        }
         if($this->apaterno != '')
        {
            $condicion = $condicion.$whereAnd."apaterno LIKE = '%". $this->apaterno."%'";
            $whereAnd = ' AND ';
        }
         if($this->amaterno != '')
        {
            $condicion = $condicion.$whereAnd."amaterno LIKE = '%". $this->amaterno."%'";
            $whereAnd = ' AND ';
        }
        if($this->tipoDocumento != '')
        {
            $condicion = $condicion.$whereAnd."tipoDocumento = '". $this->tipoDocumento."'";
            $whereAnd = ' AND ';
        }
         if($this->numeroDocumento != '')
        {
            $condicion = $condicion.$whereAnd."numeroDocumento = '". $this->numeroDocumento."'";
            $whereAnd = ' AND ';
        }
        if($this->email != '')
        {
            $condicion = $condicion.$whereAnd."email = '". $this->email."'";
            $whereAnd = ' AND ';
        }
        if($this->telefono != '')
        {
            $condicion = $condicion.$whereAnd."telefono = '". $this->telefono."'";
            $whereAnd = ' AND ';
        }
    }
}


