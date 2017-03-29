<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/FrmMenu.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<!--        <link type="text/css" rel="stylesheet" href="../css/FrmCliente.css">-->
    </head> 
    <body>
        <header>
            <h1>Menu</h1>
        </header> 

        <form name="frmMenu" id="frmMenu" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hidIdMenu" id="hidIdMenu">
            <div>
                <div>
                    <label for="txtMenu">Menu :</label><br>
                    <input type="text" id="txtMenu" name="txtMenu">
                </div>
            </div>

            <div>
                <div>
                    <label for="selEstado">Estado: </label><br>
                    <select name="selEstado" id="selEstado">
                        <option value="">--Seleccione--</option>
                        <option value="A">ACTIVO</option>
                        <option value="I">INACTIVO</option>
                    </select>
                </div>
            </div><br>
            <nav>
                <input type="button" id="btnAdicionar" name="btnAdicionar" value="ADICIONAR">
                <input type="button" id="btnModificar" name="btnModificar" value="MODIFICAR">
                <input type="button" id="btnConsultar" name="btnConsultar" value="CONSULTAR">
                <input type="button" id="btnLimpiar" name="btnLimpiar" value="LIMPIAR"> 
            </nav><br>

            <section id="secListado">
               
            </section>
        </form>
    </body>
</html>

