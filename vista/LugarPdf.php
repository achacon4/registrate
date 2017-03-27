<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LUGAR</title>
    <link type="text/css" rel="stylesheet" href="../css/FrmLugar.css">
  </head>
  <body>
        <?php
            require_once '../modelo/Lugar.php';
//            require_once '../modelo/AsistenciaEvento.php';
            
//            $idLugar = $_REQUEST['idLugar'];
            
            $lugarE = new \entidad\Lugar();
            $lugarM = new \modelo\Lugar($lugarE, null);

            $lugarM->obtenerLugar();   
        ?>
      <br><br>
      <div align="center">
          <img src="../img/LogoRegistrate.png">
      </div>
      <br><br><br><h1 align="center">Lugar</h1>
      <br><br>
      <table align="center">
        <tr>
            <th id="encabezados">NOMBRE</th>
            <th id="encabezados">ESTADO</th>
            <th id="encabezados">DESCRIPCION</th>
            <th id="encabezados">PRESUPUESTO</th>
            <th id="encabezados">CANTIDAD MAXIMA
                              <br>DE PERSONAS </th>
        </tr> 
            <?php
                $contador = 0;
                while($fila = $lugarM->conexion->obtenerObjeto()){
            ?>
        <tr>
            <th id="centrado"><?php echo $fila->nombre; ?></th>
            <th id="centrado"><?php echo $fila->disponibilidad; ?></th>
            <th id="centrado"><?php echo $fila->descripcion; ?></th>
            <th id="centrado"><?php echo $fila->presupuesto; ?></th>
            <th id="centrado"><?php echo $fila->cantidadPersonas; ?></th>
        </tr>
            <?php
                $contador++;
                }
            ?>
    </table>
      <br><br><br>
      <table id="pie" align="center">
          <tr>
            <th>
                <h3 align="center">Proyecto Formativo <span id="registrate">Registr@-TE</span></h3><br>
                <h4 align="center">Tecnólogo en Análisis y Desarrollo de Sistemas de Información</h4><br>
                <h4 align="center">FICHA: 1116897</h4>
            </th>
          </tr>
      </table>
  </body>
</html>

