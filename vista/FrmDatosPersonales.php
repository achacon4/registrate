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
<input name="hidIdDatosPersonales" id="hidIdDatosPersonales" type="hidden">
<section id="secFormulario">
<div class="table">
<div class="tr">
<div class="tdTexto">Nombre:</div>
<div class="td">
<input name="txtNombre" type="text" id="txtNombre" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Primer Apellido:</div>
<div class="td"><input name="txtApaterno" type="text" id="txtApaterno" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Segundo Apellido:</div>
<div class="td"><input name="txtAmaterno" type="text" id="txtAmaterno" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Tipo Documento:</div>
<div class="td"><select name="selTipoDocumento" id="selTipoDocumento" class="form-control tamanioTexto">
<option value="">-SELECCIONE--</option>
<option>T.I</option>
</select></div>
</div>
</div>
<div class="tr">
<div class="tdTexto">Número Documento:</div>
<div class="td"><input name="txtNumeroDocumento" type="text" id="txtNumeroDocumento" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">E-Mail:</div>
<div class="td"><input name="txtEmail" type="text" id="txtEmail" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Teléfono:</div>
<div class="td"><input name="txtTelefono" type="text" id="txtTelefono" class="form-control tamanioTexto"></div>
</div>
 
<br>
<nav>
<input name="btnAdicionar" type="button" id="btnAdicionar" value="ADICIONAR" class="btn btn-danger">
<input name="btnConsultar" type="button" id="btnConsultar" value="CONSULTAR" class="btn btn-default">
<input name="btnModificar" type="button" id="btnModificar" value="MODIFICAR" class="btn btn-danger">
<input name="btnEliminar" type="button" id="btnEliminar" value="ELIMINAR" class="btn btn-default">
<input name="btnLimpiar" type="button" id="btnLimpiar" value="LIMPIAR" class="btn btn-default">
</nav>
<section id="secListado">
<table id="tblListado" class="table">
<tr>
<td>Nombre</td>
<td>Primer Apellido</td>
<td>Segundo Apellido</td>
<td>Tipo Documento</td>
<td>Número Documento</td>
<td>E-Mail</td>
<td>Teléfono</td>
<td>Estado</td>
</tr>
</table>
</section>
</form>
</section>
</body>
</html>
