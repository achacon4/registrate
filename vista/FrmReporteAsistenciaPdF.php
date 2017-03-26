<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ASISTENCIA DE EVENTO</title>
    <link type="text/css" rel="stylesheet" href="../css/FrmAsistenciaEventoPdf.css">
  </head>
  <body>
        <?php
            require_once '../modelo/Evento.php';
            
            $idEvento = $_REQUEST['idEvento'];
            
            $eventoE = new \entidad\Evento();
            $eventoM = new \modelo\Evento($eventoE);
            $eventoM->obtenerEvento($idEvento);
            
            $eventoConfirmado = new \modelo\Evento($eventoE);
            $eventoConfirmado->consultarAsistenciaConfirmada($idEvento);
            
            $eventoSinConfirmar = new \modelo\Evento($eventoE);
            $eventoSinConfirmar->consultarAsistenciaNoConfirmada($idEvento);
            
            $eventoCancelado = new \modelo\Evento($eventoE);
            $eventoCancelado->consultarAsistenciaCancelada($idEvento);
              
        ?>
      <div align="center">
          <img src="../img/LogoRegistrate.png">
      </div>
    <br><br><h1 align="center">ASISTENCIA DE EVENTO</h1>
      <table align="center">
        <tr>
            <th id="encabezados">NOMBRE DEL EVENTO</th>
            <th id="encabezados">FECHA</th>
            <th id="encabezados">HORA INICIAL</th>
            <th id="encabezados">HORA FINAL</th>
        </tr> 
        <tr>
            <?php
                $contador = 0;
                if($fila = $eventoM->conexion->obtenerObjeto()){
            ?>
            <th id="izquierda"><?php echo $fila->nombreEvento; ?></th>
            <th id="derecha"><?php echo $fila->fechaInicial; ?></th>
            <th id="derecha"><?php echo $fila->horaInicial; ?></th>
            <th id="derecha"><?php echo $fila->horaFinal; ?></th>
        </tr> 
        <?php
            $contador++;
                }
        ?>
    </table>
      <br><br><h5 align="center">ASISTENCIA CONFIRMADA</h5>
    <table align="center">
        <tr>
            <th id="encabezados">TIPO DOCUMENTO</th>
            <th id="encabezados">NÚMERO DOCUMENTO</th>
            <th id="encabezados">NOMBRE</th>
            <th id="encabezados">APELLIDOS</th>
            <th id="encabezados">EMAIL</th>
            <th id="encabezados">TELÉFONO</th>
            <th id="encabezados">ASISTENCIA</th>
        </tr> 
        
            <?php
                $contador1 = 0;
                while($fila = $eventoConfirmado->conexion->obtenerObjeto()){
            ?>
        <tr>
            <th id="centrado"><?php echo $fila->tipoDocumento; ?></th>
            <th id="derecha"><?php echo $fila->numeroDocumento; ?></th>
            <th id="izquierda"><?php echo $fila->nombre; ?></th>
            <th id="izquierda"><?php echo $fila->apaterno . ' '.$fila->amaterno; ?></th>
            <th id="derecha"><?php echo $fila->email; ?></th>
             <th id="derecha"><?php echo $fila->telefono; ?></th>
            <th id="centrado"><?php echo $fila->estado; ?></th>
        </tr>
            <?php
                $contador1++;
                }
            ?>
    </table>
      <br><br><h5 align="center">ASISTENCIA SIN CONFIRMAR</h5>
    <table align="center">
       <tr>
            <th id="encabezados">TIPO DOCUMENTO</th>
            <th id="encabezados">NÚMERO DOCUMENTO</th>
            <th id="encabezados">NOMBRE</th>
            <th id="encabezados">APELLIDOS</th>
            <th id="encabezados">EMAIL</th>
            <th id="encabezados">TELÉFONO</th>
            <th id="encabezados">ASISTENCIA</th>
        </tr>  
        
            <?php
                $contador1 = 0;
                while($fila = $eventoSinConfirmar->conexion->obtenerObjeto()){
            ?>
        <tr>
            <th id="centrado"><?php echo $fila->tipoDocumento; ?></th>
            <th id="derecha"><?php echo $fila->numeroDocumento; ?></th>
            <th id="izquierda"><?php echo $fila->nombre; ?></th>
            <th id="izquierda"><?php echo $fila->apaterno . ' '.$fila->amaterno; ?></th>
            <th id="derecha"><?php echo $fila->email; ?></th>
             <th id="derecha"><?php echo $fila->telefono; ?></th>
            <th id="centrado"><?php echo $fila->estado; ?></th>
        </tr>
            <?php
                $contador1++;
                }
            ?>
    </table>
         <br><br><h5 align="center">ASISTENCIA CANCELADAS</h5>
    <table align="center">
       <tr>
            <th id="encabezados">TIPO DOCUMENTO</th>
            <th id="encabezados">NÚMERO DOCUMENTO</th>
            <th id="encabezados">NOMBRE</th>
            <th id="encabezados">APELLIDOS</th>
            <th id="encabezados">EMAIL</th>
            <th id="encabezados">TELÉFONO</th>
            <th id="encabezados">ASISTENCIA</th>
        </tr>   
        
            <?php
                $contador1 = 0;
                while($fila = $eventoCancelado->conexion->obtenerObjeto()){
            ?>
        <tr>
            <th id="centrado"><?php echo $fila->tipoDocumento; ?></th>
            <th id="derecha"><?php echo $fila->numeroDocumento; ?></th>
            <th id="izquierda"><?php echo $fila->nombre; ?></th>
            <th id="izquierda"><?php echo $fila->apaterno . ' '.$fila->amaterno; ?></th>
            <th id="derecha"><?php echo $fila->email; ?></th>
             <th id="derecha"><?php echo $fila->telefono; ?></th>
            <th id="centrado"><?php echo $fila->estado; ?></th>
        </tr>
            <?php
                $contador1++;
                }
            ?>
    </table>
     
   <br><br>
      <table id="pie" align="center">
          <tr>
            <th>
                <h3 align="center">Proyecto Formativo <span id="registrate">Registr@-TE</span></h3><br>
                <h4 align="center">Tecnólogo en Análisis y Desarrollo de Sistemas de Información</h4><br>
                <h4 align="center">FICHA: 1116897</h4></th>
          </tr>
      </table>
  </body>
</html>
