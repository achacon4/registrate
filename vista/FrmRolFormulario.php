<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery-ui.js" type="text/javascript"></script>
</head>
<body>
<header>
<h1>Rol Formulario</h1>
</header>
<section id="secPrincipal">
    <form name="frmPrincipalRolFormulario" id="frmPrincipalRolFormulario" action="" method="POST">  
    <input name="hidAccion" id="hidAccion" type="hidden">
    <input name="idRolFormulario" id="idRolFormulario" type="hidden">
    <section id="secFormulario">
        <div class="row">
                <div>
                    <label>Formulario:</label>
                    <select name="selIdFormulario" id="selIdFormulario">
                    </select>
                </div>
                 <div>
                    <label>Rol:</label>
                    <select name="selIdRol" id="selIdRol">
                    </select>
                </div>
                <div>
                    <label>Estado:</label>
                    <select name="selEstado" id="selEstado">
                        <option value = "">--Seleccione uno--</option>
                        <option value = "A">A</option>
                        <option value = "I">I</option>
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
       <input name="btnEliminar" type="button" id="btnEliminar" value="ELIMINAR" class="btn btn-default">
         <input name="btnLimpiar" type="button" id="btnLimpiar" value="LIMPIAR" class="btn btn-default">
    </nav>
    </form>
    <section id="secListado">
                    
   </section>
</section>
<script src="../js/FrmRolFormulario.js" type="text/javascript"></script>
</body>
</html>
