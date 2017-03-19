<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Asistencia Evento</title>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmAsistenciaEvento.js" type="text/javascript"></script>
        
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    </head>
    <body>
        <header>
            <h1>
                <center>
                    Asistencia de Evento
                </center>
            </h1>
        </header>
        <section id="secPrincipal">
            <form name="frmPrincipal" id="frmPrincipal" method="POST">
                <table class="table table-striped">
                    <tr>
                        <td>
                               
                                <input type="hidden" name="selEvento" id="selEvento">
                                 Nombre del Evento:<input type="text" name="txtEvento" id="txtEvento" class="form-control" placeholder="Nombre del Evento">
                        </td>
                        <td>
                          
                                <button type="button" name="btnConsultarAsistente" id="btnConsultarAsistente" class="btn btn-default btn-lg active">CONSULTAR ASITENTES</button>
                   
                        </td>
                    </tr>
                </table>
                <div id="divListadoAsistentes">
                    <table id="listadoAsistentes" class="table table-striped">
                        <tr>
                            <td>
                                Nombre 
                            </td>
                            <td>
                                Primer Apellido
                            </td>
                            <td>
                                Segundo Apellido
                            </td>
                            <td>
                                Tipo de Documento
                            </td>
                            <td>
                                Número de Documento
                            </td>
                            <td>
                                Telefono
                            </td>
                        </tr>
                    </table>
                </div>
                
            </form>
        </section>
    </body>
</html>
