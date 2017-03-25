<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuario</title>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmUsuario.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
    </head>
    <body>
        <header>
            <h1>Usuario</h1>
        </header> 

        <form name="frmUsuario" id="frmUsuario" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hidIdDatosPersonales" id="hidIdDatosPersonales">
            <input type="hidden" name="hidIdUsuario" id="hidIdUsuario">
            <div>
                <div>
                    <label for="txtDatosPersonales">* Persona: </label><br>
                    <input type="text" id="txtDatosPersonales" name="txtDatosPersonales">
                </div>

                <div>
                    <label for="txtUsuario">* Usuario: </label><br>
                    <input type="text" id="txtUsuario" name="txtUsuario">
                </div>
            </div>

            <div>
                <div>
                    <label for="txtContrasenia">* Contraseña: </label><br>
                    <input type="password" id="txtContrasenia" name="txtContrasenia">
                </div>

                <div>
                    <label for="txtVerificarContrasenia">* Verificar Contraseña: </label><br>
                    <input type="password" id="txtVerificarContrasenia" name="txtVerificarContrasenia">
                </div>
            </div><br>
            <div>
                <div>
                    <label for="selEstado">* Estado: </label><br>
                    <select name="selEstado" id="selEstado">
                        <option value="">--Seleccione--</option>
                        <option value="A">ACTIVO</option>
                        <option value="I">INACTIVO</option>
                    </select>
                </div>
            </div><br>
            <nav>
                <input type="button" id="btnAdicionar" name="btnAdicionar" value="ADICIONAR">
                <input type="button" id="btnEliminar" name="btnEliminar" value="ELIMINAR"> 
                <input type="button" id="btnModificar" name="btnModificar" value="MODIFICAR">
                <input type="button" id="btnModificarContrasenia" name="btnModificarContrasenia" value="MODIFICAR CONTRASEÑA">
                <input type="button" id="btnConsultar" name="btnConsultar" value="CONSULTAR">
                <input type="button" id="btnLimpiar" name="btnLimpiar" value="LIMPIAR"> 
            </nav><br>

            <section id="secListado">
                <table>
                    <tr>
                        <th>Usuario</th> 
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>           
                </table>
            </section>
        </form>
    </body>
</html>