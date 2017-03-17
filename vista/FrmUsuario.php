<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="../css/FrmCliente.css">
</head>
<body>
<header>
<h1>USUARIO</h1>
</header>
<section id="secPrincipal">
<form name="frmPrincipal" id="frmPrincipal" action="" method="POST">
<section id="secFormulario">
<div class="table">
<div class="tr">
<input name="hidAccion" id="hidAccion" type="hidden">
<input name="hidIdUsuario" id="hidIdUsuario" type="hidden" >
<div class="td">
<div class="tr">
<input name="hidAccion" id="hidAccion" type="hidden">
<input name="hidIdDatosPersonales" id="hidIdDatosPersonales" type="hidden" >
<div class="td">
</div>
<div class="tr">
<div class="tdTexto">Usuario</div>
<div class="td"><input name="txtUsuario" type="text" id="txtUsuario" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Contraseña:</div>
<div class="td"><input name="txtcontraseña" type="text" id="txtcontraseña" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Estado</div>
<div class="td"><select name="selEstado" id="selEstado" class="form-control tamanioTexto">
<option value="">-SELECCIONE--</option>
<option value="">ACTIVO</option>
<option value="">INACTIVO</option>
</select></div>
</div>
<div class="tr">
<div class="tdTexto">Nombre Usuario:</div>
<div class="td"><input name="txtNombreUsuario" type="text" id="txtNombreUsuario" class="form-control tamanioTexto"></div>
</div>
</table></div>
</section>
</section>
<br>
<nav>
    <input name="btnAdicionar" type="button" id="btnAdicionar" value="ADICIONAR" class="btn btn-danger">
    <input name="btnModificar" type="button" id="btnModificar" value="MODIFICAR" class="btn btn-danger">
<input name="btnConsultar" type="button" id="btnConsultar" value="CONSULTAR" class="btn btn btn-danger">
<input name="btnLimpiar" type="button" id="btnLimpiar" value="LIMPIAR" class="btn btn btn-danger">
</nav>
</body>
</html>

    
