<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro Asistente</title>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmRegistroAsistente.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    </head>
    <body>
        <br>
        <div class="container ">
            <section id="secPrincipal" class="panel panel-primary">
                <h4 class="text-center" ><b>Registr@-TE</b></h4>
                <form name ="frmPrincipal" id="frmPrincipal"  action="" method="POST" class="form-horizontal" >
                    <section id="secFormulario" class="panel-body">
                        <input name="idAsistenteEvento" id="idAsistenteEvento" type="hidden">
                        <input name="idEventoFK" id="idEventoFK" type="hidden" >
                        <div class="form-group has-success has-feedback">
                            <label for="inputSuccess3"  class="control-label col-sm-2">Nombre:</label>
                            <div class="col-sm-9">
                                <input type="text"  name="txtNombre" id="txtNombre" class="form-control" >
                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                        
                        <div class="form-group has-success has-feedback">
                            <label for="inputSuccess3"  class="control-label col-sm-2">Apellido paterno:</label>
                            <div class="col-sm-9">
                                <input type="text"  name="txtApaterno" id="txtApaterno" class="form-control" aria-describedby="inputSuccess3Status">
                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                        
                        <div class="form-group has-success has-feedback">
                            <label for="inputSuccess3"  class="control-label col-sm-2">Apellido materno:</label>
                            <div class="col-sm-9">
                                <input type="text"  name="txtAmaterno" id="txtAmaterno" class="form-control" aria-describedby="inputSuccess3Status">
                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                        
                        <div class="form-group has-success has-feedback">
                            <label for="inputSuccess3" class="control-label col-sm-2">Tipo de documento:</label>
                            <div class="col-sm-9">
                                <select name="selTipoDocumento" id="selTipoDocumento" class="form-control" aria-describedby="inputSuccess3Status">
                                            <option value="">--SELECCIONE--</option>
                                            <option value="TI">Tarjeta de identidad</option>
                                            <option value="CC">Cédula de ciudadanía</option>
                                            <option value="CE">Cédula extranjera</option>
                                            <option value="PSRTE">Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        
                         <div class="form-group has-success has-feedback">
                            <label for="inputSuccess3"  class="control-label col-sm-2">Número de documento:</label>
                            <div class="col-sm-9">
                                <input type="text"  name="txtNumeroDocumento" id="txtNumeroDocumento" class="form-control" aria-describedby="inputSuccess3Status">
                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                       
                         <div class="form-group has-success has-feedback">
                            <label for="inputGroupSuccess2"  class="control-label col-sm-2">Email:</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text"  name="txtEmail" id="txtEmail" class="form-control" aria-describedby="inputGroupSuccess2Status">
                                </div>
                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputGroupSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                        
                         <div class="form-group has-success has-feedback">
                            <label for="inputSuccess3"  class="control-label col-sm-2">Teléfono:</label>
                            <div class="col-sm-9">
                                <input type="text"  name="txtTelefono" id="txtTelefono" class="form-control" aria-describedby="inputSuccess3Status">
                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>
                            </div>
                        </div>                    
                    </section>
                </form>
                <center>
                    <nav>
                    <br><input type='button' id='btnAdicionar' name='btnAdicionar' value='ADICIONAR' class="btn btn-primary">
                    <input type='button' id='btnConsultar' name='btnConsultar' value='CONSULTAR' class="btn btn-primary">
                    <input type='button' id='btnEliminar' name='btnEliminar' value='ELIMINAR' class="btn btn-primary">
                    </nav>
                </center>
                <br>
                
                <section id="secListadoPersonas">
                    
                </section>
                <br>
            </section>           
        </div>
    </body>
</html>

