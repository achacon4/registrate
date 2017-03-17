<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmLugar.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="../css/FrmLugar.css">
    </head>
    <body>
        <header>
            <h1>Formulario Lugar</h1>
        </header>
        <section id="secPrincipal">
            <form name="frmPrincipal" id="frmPrincipal" action="" method="POST">
                <input name="hidIdLugar" id="hidIdLugar" type="hidden">
                <section id="secFormulario">
                    <div class="table">
                        <div class="tr">
                            <div class="tdTexto">Nombre del Lugar</div>
                            <div class="td">
                                <input name="txtNombre" type="text" id="txtNombre" class="form-control tamanioTexto"></div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">Disponibilidad</div>
                            <div class="td"><select name="selDisponibilidad" id="selDisponibilidad" class="form-control tamanioTexto">
                                    <option value="">-SELECCIONE--</option>
                                </select></div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">Descripción</div>
                            <div class="td"><input name="txtDescripcion" type="text" id="txtDescripcion" class="form-control tamanioTexto"></div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">Presupuesto</div>
                            <div class="td"><input name="txtPresupuesto" type="text" id="txtPresupuesto" class="form-control tamanioTexto"></div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">Cantidad de Personas</div>
                            <div class="td"><input name="txtCantidadPersonas" type="date" id="txtCantidadPersonas" class="form-control tamanioTexto"></div>
                        </div>                        
                    </div>
                <br>
                <nav>
                    <input name="btnAdicionar" type="button" id="btnAdicionar" value="ADICIONAR" class="btn btn-danger">
                    <input name="btnModificar" type="button" id="btnModificar" value="MODIFICAR" class="btn btn-danger">
                    <input name="btnConsultar" type="button" id="btnConsultar" value="CONSULTAR" class="btn btn-default">
                    <input name="btnEliminar" type="button" id="btnEliminar" value="ELIMINAR" class="btn btn-default">
                    <input name="btnLimpiar" type="button" id="btnLimpiar" value="LIMPIAR" class="btn btn-default">
                </nav>
                <section id="secListado">
                    <table id="tblListado" class="table">
                        <tr>
                            <td>Nombre del Lugar</td>
                            <td>Disponibilidad</td>
                            <td>Descripción</td>
                            <td>Presupuesto</td>
                            <td>Cantidad de Personas</td>
                        </tr>
                    </table>
                </section>
            </form>
        </section>
    </body>
</html>
