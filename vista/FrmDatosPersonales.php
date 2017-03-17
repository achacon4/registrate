<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery-ui.js" type="text/javascript"></script>
<script src="../js/FrmDatosPersonales.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="../css/FrmDatosPersonales.css">
</head>
<body>
<header>
<h1>Datos Personales</h1>
</header>
<section id="secPrincipal">
<form name="frmDatosPersonales" id="frmDatosPersonales" action="" method="POST">
<input name="hididDatosPersonales" id="hididDatosPersonales" type="hidden">
<section id="secFormulario">
<div class="table">
<div class="tr">
<div class="tdTexto">Nombre:</div>
<div class="td">
<input name="txtNombre" type="text" id="txtNombre" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Apaterno:</div>
<div class="td"><input name="txtApaterno" type="text" id="txtApaterno" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Amaterno:</div>
<div class="td"><input name="txtAmaterno" type="text" id="txtAmaterno" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">TipoDocumento:</div>
<div class="td"><select name="selTipoDocumento" id="selTipoDocumento" class="form-control tamanioTexto">
<option value="">-SELECCIONE--</option>
</select></div>
</div>
</div>
<div class="tr">
<div class="tdTexto">NumeroDocumento:</div>
<div class="td"><input name="txtNumeroDocumento" type="text" id="txtNumeroDocumento" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">E-Mail:</div>
<div class="td"><input name="txtEmail" type="text" id="txtEmail" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Telefono:</div>
<div class="td"><input name="txtTelefono" type="text" id="txtTelefono" class="form-control tamanioTexto"></div>
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
<table id="tblListado" class="table">
<tr>
<td>Nombre</td>
<td>Apaterno</td>
<td>Amaterno</td>
<td>TipoDocumento</td>
<td>NumeroDocumento</td>
<td>E-Mail</td>
<td>Telefono</td>
<td>Estado</td>
</tr>
</table>
</section>
</form>
</section>
</body>
</html>

