<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Eventos</title>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery-ui-1.8.13.custom.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery-ui-timepicker-addon.js"></script>
        <script src="../js/FrmEvento.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="../css/FrmEvento.css">
    </head>
	
    <body>
        <header>
            <h1>
                <center>Eventos</center>
            </h1>
        </header>

        <section id="secPrincipalEvento">
            <form name="frmPrincipalEvento" id="frmPrincipalEvento" action="" method="POST">
                <input name="hidIdEvento" id="hidIdEvento" type="hidden">
<!--                <input name="hidIdLugarFK" id="hidIdLugarFK" type="hidden">
                <input name="hidIdDatosPersonalesFK" id="hidIdDatosPersonalesFK" type="hidden">
                <input name="hidIdCategoriaFK" id="hidIdCategoriaFK" type="hidden">-->
                    <section id="secFormularioEvento">
                        <div class="table">
                            
                            <div class="tr">
                                <div class="tdTexto">
                                    *Lugar Evento
                                </div>
                                
                                <div class="td">
                                    <input type="hidden" name="selLugarEvento" id="selLugarEvento">
                                    <input type="text" name="txtLugarEvento" id="txtLugarEvento" class="form-control">
                                    
<!--                                    <select name="selLugarEvento" id="selLugarEvento" class="form-control tamanioTexto">
                                        <option value="">-SELECCIONE--</option>
                                    </select>-->
                                </div>
                            </div>
                            
                            <div class="tr">
                                <div class="tdTexto">
                                    *Datos Personales
                                </div>
                                
                                <div class="td">
                                    <input type="hidden" name="selDatosPersonales" id="selDatosPersonales">
                                    <input type="text" name="txtDatosPersonales" id="txtDatosPersonales" class="form-control">
                                    
<!--                                    <select name="selDatosPersonales" id="selDatosPersonales" class="form-control tamanioTexto">
                                        <option value="">-SELECCIONE--</option>
                                    </select>-->
                                </div>
                            </div>
                            
                            <div class="tr">
                                <div class="tdTexto">
                                    *Categoria Evento
                                </div>
                                
                                <div class="td">
                                    <input type="hidden" name="selCategoriaEvento" id="selCategoriaEvento">
                                    <input type="text" name="txtCategoriaEvento" id="txtCategoriaEvento" class="form-control">
                                    
<!--                                    <select name="selCategoriaEvento" id="selCategoriaEvento" class="form-control tamanioTexto">
                                        <option value="">-SELECCIONE--</option>
                                    </select>-->
                                </div>
                            </div>

                            <div class="tr">	
                                <div class="tdTexto">*Nombre Evento </div>
                                <div class="td">
                                    <input name="txtNombreEvento" type="text" id="txtNombreEvento" class="form-control tamanioTexto">
                                </div>
                            </div>

                            <div class="tr">
                                <div class="tdTexto">*Fecha Inicial </div>
                                    <div class="td">
                                        <input name="dtFechaInicial" type="date" id="dtFechaInicial" class="form-control tamanioTexto">
                                    </div>
                            </div>

                            <div class="tr">
                                <div class="tdTexto">*Fecha Final </div>
                                    <div class="td">
                                        <input name="dtFechaFinal" type="date" id="dtFechaFinal" class="form-control tamanioTexto">
                                    </div>
                            </div>

                            <div class="tr">
                                <div class="tdTexto">*Hora Inicial</div>
                                    <div class="td">
                                        <input name="tmHoraInicial" type="text" id="tmHoraInicial" class="form-control tamanioTexto">
                                    </div>
                            </div>

                            <div class="tr">
                                <div class="tdTexto">*Hora Final </div>
                                    <div class="td">
                                        <input name="tmHoraFinal" type="time" id="tmHoraFinal" class="form-control tamanioTexto">
                                    </div>
                            </div>

                            <div class="tr">
                                <div class="tdTexto">*Cantidad Asistentes </div>
                                    <div class="td">
                                        <input name="txtCantidadAsistentes" type="text" id="txtCantidadAsistentes" class="form-control tamanioTexto">
                                    </div>
                            </div>

                            <div class="tr">
                                <div class="tdTexto">*Descripción Evento </div>
                                    <div class="td">
                                        <textarea name="txtDescripcionEvento" type="text" id="txtDescripcionEvento" class="form-control tamanioTexto"></textarea>
                                    </div>
                            </div>

                            <div class="tr">
                                <div class="tdTexto">Estado Evento </div>
                                    <div class="td">
                                        <select name="selEstadoEvento" id="selEstadoEvento" class="form-control tamanioTexto">
                                            <option value="">--SELECCIONE--</option>
                                            <option value="A">ACTIVO</option>
                                            <option value="I">INACTIVO</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </section>
                    <br>

                <nav>
                    <input name="btnAdicionar" type="button" id="btnAdicionar" value="ADICIONAR" class="btn btn-danger">
                    <input name="btnModificar" type="button" id="btnModificar" value="MODIFICAR" class="btn btn-danger">
                    <input name="btnConsultar" type="button" id="btnConsultar" value="CONSULTAR" class="btn btn-default">
                    <input name="btnLimpiar" type="button" id="btnLimpiar" value="LIMPIAR" class="btn btn-default">
                </nav>

                <section id="secListado">
                    <table id="tbListado" class="table">
                        <tr>
                            <td>Lugar </td>
                            <td>Datos Personales </td>
                            <td>Categoria </td>
                            <td>Nombre del Evento </td>
                            <td>Fecha Inicial </td>
                            <td>Fecha Final </td>
                            <td>Hora Inicial </td>
                            <td>Hora Final </td>
                            <td>Cantidad Asistentes </td>
                            <td>Descripción Evento </td>
                            <td>Estado Evento </td>
                        </tr>
                    </table>
                </section>
            </form>
        </section>
    </body>
</html>