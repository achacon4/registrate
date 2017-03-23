<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Asistente Evento</title>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmAsistenteEvento.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="../css/FrmAsistenteEvento.css">
    </head>
    <body>
        <br>
        <div class="container ">
            <section id="secPrincipal" >
                <h4 class="text-center" ><b>Registr@-TE</b></h4>
                <form name ="frmPrincipal" id="frmPrincipal"  action="" method="POST" class="form-horizontal" >
                    <section id="secFormulario" class="panel-body">
                        <input name="idAsistenteEvento" id="idAsistenteEvento" type="hidden">
                        <input name="idEventoFK" id="idEventoFK" type="hidden" >
                        
                         <div class="tr">
                            <label  class=" tdTexto">Evento:</label>
                            <div class="td">
                                <input type="hidden" name="selEvento" id="selEvento">
                                <input type="text"  name="txtEvento" id="txtEvento" class="form-control tamanioTexto" >
<!--                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
                            </div>
                        </div>
                        <div class="tr">
                            <label   class="tdTexto">Nombre:</label>
                            <div class="td">
                                <input type="text"  name="txtNombre" id="txtNombre" class="form-control tamanioTexto" >
<!--                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
                            </div>
                        </div>
                        
                        <div class="tr">
                            <label  class=" tdTexto">Apellido paterno:</label>
                            <div class=" td">
                                <input type="text"  name="txtApaterno" id="txtApaterno" class="form-control tamanioTexto">
<!--                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
                            </div>
                        </div>
                        
                        <div class="tr">
                            <label  class="tdTexto">Apellido materno:</label>
                            <div class="td">
                                <input type="text"  name="txtAmaterno" id="txtAmaterno" class="form-control tamanioTexto" >
<!--                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
                            </div>
                        </div>
                        
                        <div class="tr">
                            <label class="tdTexto">Tipo de documento:</label>
                            <div class="td">
                                <select name="selTipoDocumento" id="selTipoDocumento" class="form-control tamanioTexto">
                                            <option value="">--SELECCIONE--</option>
                                            <option value="T.I">Tarjeta de identidad</option>
                                            <option value="C.C">Cédula de ciudadanía</option>
                                            <option value="C.E">Cédula extranjera</option>
                                            <option value="PSRTE">Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        
                         <div class="tr">
                            <label  class="tdTexto">Número de documento:</label>
                            <div class="td">
                                <input type="text"  name="txtNumeroDocumento" id="txtNumeroDocumento" class="form-control tamanioTexto">
<!--                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
                            </div>
                        </div>
                       
                         <div class="tr">
                            <label class="tdTexto">Email:</label>
                            <div class="td">
                                    <input type="text"  name="txtEmail" id="txtEmail" class="form-control tamanioTexto" >
<!--                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputGroupSuccess2Status" class="sr-only">(success)</span>-->
                            </div>
                        </div>
                        
                         <div class="tr">
                            <label  class="tdTexto">Teléfono:</label>
                            <div class="td">
                                <input type="text"  name="txtTelefono" id="txtTelefono" class="form-control tamanioTexto" >
<!--                                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
                            </div>
                        </div>    
                          <div class="tr">
                            <label class="tdTexto">Estado:</label>
                            <div class="td">
                                <select id="selEstado"  class="form-control tamanioTexto" name="selEstado">
                                    <option value="CONFIRMADO">Confirmado</option>
                                    <option value="SINCONFIRMAR">Sin Confirmar</option>
                                    <option value="CANCELADO">Cancelado</option>
                                </select>
                                 
                            </div>
                        </div>  
                    </section>
                </form>
                
                    <nav>
                    <br><input type='button' id='btnAdicionar' name='btnAdicionar' value='ADICIONAR' class="btn btn-danger">
                    <input type='button' id='btnConsultar' name='btnConsultar' value='CONSULTAR' class="btn btn-default">
                    <input type='button' id='btnModificar' name='btnModificar' value='MODIFICAR' class="btn btn-danger">
                    </nav>
                
                <br>
                
                <section id="secListadoPersonas">
                    
                </section>
                <br>
            </section>           
        </div>
    </body>
</html>

