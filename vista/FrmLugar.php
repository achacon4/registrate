<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmLugar.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="../css/FrmLugar.css">
    </head>
    <body>
    <center>
        <header>
            <h1> Lugares </h1>
        </header>
        <br>
        <section id="secPrincipal">
            <form name="frmPrincipal" id="frmPrincipal" action="" method="POST">
                <input name="hidIdLugar" id="hidIdLugar" type="hidden">
                <section id="secFormulario">
                    <div class="table">
                        <div class="tr">
                            <div class="tdTexto">*Nombre:</div>
                            <div class="td">
                                <input name="txtNombre" type="text" id="txtNombre" class="form-control">
                            </div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">*Estado</div>
                            <div class="td">
                                <select name="selDisponibilidad" id="selDisponibilidad" class="form-control" aria-describedby="inputSuccess3Status">
                                    <option value="">--SELECCIONE--</option>
                                    <option value="DISPONIBLE">Disponible</option>
                                    <option value="OCUPADO">Ocupado</option>
                                    <option value="INACTIVO">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">*Descripción</div>
                            <div class="td"><input name="txtDescripcion" type="text" id="txtDescripcion" class="form-control"></div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">*Presupuesto</div>
                            <div class="td"><input name="txtPresupuesto" type="text" id="txtPresupuesto" class="form-control"></div>
                        </div>
                        <div class="tr">
                            <div class="tdTexto">*Capacidad maxima de personas</div>
                            <div class="td"><input name="txtCantidadPersonas" type="text" id="txtCantidadPersonas" class="form-control"></div>
                        </div>                        
                    </div>
                    <nav>
                        <input name="btnAdicionar" type="button" id="btnAdicionar" value="ADICIONAR" class="btn btn-success">
                        <input name="btnModificar" type="button" id="btnModificar" value="MODIFICAR" class="btn btn-success">
                        <input name="btnConsultar" type="button" id="btnConsultar" value="CONSULTAR" class="btn btn-success">
                        <input name="btnEliminar" type="button" id="btnEliminar" value="ELIMINAR" class="btn btn-success">
                        <input name="btnLimpiar" type="button" id="btnLimpiar" value="LIMPIAR" class="btn btn-success">
                    </nav>
                </section>
             <br>
                <header>
                    <h1> Listado </h1>
                </header>
              <br>
                    <section id="secListado">
                        <br>
                        <table id="tblListado">
                        </table>
                    </section>
                </form>
            </section>
        </center> 
    </body>
</html>
