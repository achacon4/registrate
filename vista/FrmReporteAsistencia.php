<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Asistencias eventos</title>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmReporteAsistencia.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="../css/FrmReporteAsistencia.css">
    </head>
    <body>
        <center>
            <header>
                <h2>Asistencias de los eventos</h2>
            </header>
            <br>
            
            <section id="secPrincipal">
                <form name="frmReporteAsistencia" id="frmReporteAsistencia" action="" method="POST">
                    <section id="secPrincipal">
                        <table class="table table-striped">
                            <tr>
                                <td>
                                    <input type="hidden" name="selEvento" id="selEvento">
                                    Nombre del Evento:<input type="text" name="txtEvento" id="txtEvento" class="form-control" placeholder="Nombre del Evento">
                                </td>
                                <td>
                                    <button type="button" name="btnConsultarAsistente" id="btnConsultarAsistente" class="btn btn-default btn-lg active">CONSULTAR</button>
                                </td>
                            </tr>
                        </table>
                    </section>
                    <br>
                    <label>ASISTENCIA CONFIRMADAS</label>
                    <section id="secListado">
                        <table class="table table-bordered" >
                            <tr class="active">
                                <td>TIPO DE DOCUMENTO</td>
                                <td>NUMERO DE DOCUMENTO</td>
                                <td>NOMBRE</td>
                                <td>PRIMER APELLIDO</td>
                                <td>SEGUNDO APELLIDO</td>
                                <td>EMAIL</td>
                                <td>TELEFONO</td>
                                <td>ESTADO</td>
                                <td>Nº ASISTENTES</td>
                            </tr>
                        </table>
                    </section>
                    
                    <label>ASISTENCIA SIN CONFIRMAR</label>
                    <section id="secListado1">
                        <table class="table table-bordered" >
                            <tr class="active">
                                <td>TIPO DE DOCUMENTO</td>
                                <td>NUMERO DE DOCUMENTO</td>
                                <td>NOMBRE</td>
                                <td>PRIMER APELLIDO</td>
                                <td>SEGUNDO APELLIDO</td>
                                <td>EMAIL</td>
                                <td>TELEFONO</td>
                                <td>ESTADO</td>
                                <td>Nº ASISTENTES</td>
                            </tr>
                        </table>
                    </section>
                    
                    <label>ASISTENCIA CANCELADAS</label>
                    
                    
                     <section id="secListado2">
                        <table class="table table-bordered" >
                            <tr class="active">
                                <td>TIPO DE DOCUMENTO</td>
                                <td>NUMERO DE DOCUMENTO</td>
                                <td>NOMBRE</td>
                                <td>PRIMER APELLIDO</td>
                                <td>SEGUNDO APELLIDO</td>
                                <td>EMAIL</td>
                                <td>TELEFONO</td>
                                <td>ESTADO</td>
                                <td>Nº ASISTENTES</td>
                            </tr>
                        </table>
                    </section>
                    
                    
                    
                </form>
            </section>
        </center>
    </body>
</html>

