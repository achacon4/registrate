<?php
class Conexion{
    private $conn;
    private $recordSet;
    
    function __construct(){
        //$this->conn = new PDO("mysql:host=localhostooo;port=3306;dbname=clientes;charset=utf8", "root", "123");

        //$this->conn = new mysqli('localhost','root','1234', 'registrate');
        $this->conn = new mysqli('localhost','root','', 'registrate1');

        //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function ejecutar($sentenciaSql) {
        $this->recordSet = $this->conn->query($sentenciaSql);
        if($this->recordSet == FALSE){
            throw new Exception("Error al ejecutar la sentencia".$sentenciaSql);
        }
    }
    public function obtenerObjeto(){
        return $this->recordSet->fetch_object(); 
    }
    public function obtenerNumeroRegistros(){
        return $this->recordSet->num_rows;
    }
    public function iniciarTransaccion() {
        $this->conn->query("START TRANSACTION");
    }
    public function confirmarTransaccion() {
        $this->conn->query("COMMIT");
    }
    public function cancelarTransaccion() {
        $this->conn->query("ROLLBACK");
    }
    

    public function runQuery($query){
        $result = $this->conn->query($query);
        return $result;
                
    }
    public function clearText($text){
        $text = trim($text);
        return $this->mysqli->real_scape_string($text);
    }
    public function obtenerEvento(){
        //Obtener los datos de la tabla.
        $sentenciaSql = "SELECT nombreEvento,fechaInicial,horaInicial,horaFinal FROM evento WHERE idEvento = 1";
        $result = $this->runQuery($sentenciaSql);
        //Arreglo que contendrá los datos.
        $valores = array();
        if($result->num_rows == 0){
            //Podemos comprobar si el arreglo está vacío y mostrar un PDF en blanco.
            return $valores;
        } 
        //Si se reciben datos se agrega un arreglo con los datos de la consulta.
        else {

            while ($row = $result->fetch_assoc()){
                //Se agrega cada valor en el arreglo.
                array_push($valores, $row);
            }
        }
        return $valores;
    }
    public function obtenerAsistentes(){
        //Obtener los datos de la tabla.
        $sentenciaSql = "SELECT nombre,apaterno,amaterno,tipoDocumento,numeroDocumento,estado FROM asistenteEvento WHERE idEventoFK = 1";
        $result = $this->runQuery($sentenciaSql);
        //Arreglo que contendrá los datos.
        $valores = array();
        if($result->num_rows == 0){
            //Podemos comprobar si el arreglo está vacío y mostrar un PDF en blanco.
            return $valores;
        } 
        //Si se reciben datos se agrega un arreglo con los datos de la consulta.
        else {
            while ($row = $result->fetch_assoc()){
                //Se agrega cada valor en el arreglo.
                array_push($valores, $row);
            }
        }
        return $valores;
    } 
}
//$objConexion = new Conexion();
//$conexion = $objConexion->getConn();
//$sentenciaSql = "SELECT * FROM municipio WHERE estado = 'A'";
//$rsMun = $conexion->query($sentenciaSql);
//while($fila = $rsMun->fetch_object()){
//    echo "<br>Municipio: ".$fila->municipio;
//}

//$objConexion = new Conexion();
//$sentenciaSql = "SELECT * FROM municipio WHERE estado = 'A'";
//$objConexion->ejecutar($sentenciaSql);
//while($fila = $objConexion->recordSet->fetch_object()){
//    echo "<br>Municipio: ".$fila->municipio;
//}

//$objConexion = new Conexion();
//$sentenciaSql = "SELECT * FROM municipio WHERE estado = 'A'";
//$objConexion->ejecutar($sentenciaSql);
//while($fila = $objConexion->obtenerObjeto()){
//    echo "<br>Municipio: ".$fila->municipio;
//}

//require_once '../modelo/Cliente.php';
//
//$clienteE = new \entidad\Cliente();
//
////$clienteE->setIdCliente(1);
//$clienteE->setNumeroIdentificacion(987654673);
//$clienteE->setCliente("ALEX");
//$municipioResidenciaE = new \entidad\Municipio();
//$municipioResidenciaE->setIdMunicipio(1);
//$municipioResidenciaE->setMunicipio("NEIVA");
//$clienteE->setMunicipioResidencia($municipioResidenciaE);
//
//$municipioNegocio = new \entidad\Municipio();
//$municipioNegocio->setIdMunicipio(2);
//$municipioNegocio->setMunicipio("IBAGU�");
//$clienteE->setMunicipioNegocio($municipioNegocio);
//
//$clienteE->setFechaNacimiento('2000-01-01');
//$clienteE->setEstado('A');
//
//$clienteM = new \modelo\Cliente($clienteE);
//$clienteM->adicionar();

//echo $clienteE->getCliente();
//echo $clienteE->getMunicipioNegocio()->getMunicipio();
