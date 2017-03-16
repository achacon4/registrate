<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery-ui.js" type="text/javascript"></script>
<script src="../js/FrmCliente.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="../css/FrmCliente.css">
</head>
<body>
<header>
<h1>Clientes</h1>
</header>
<section id="secPrincipal">
<form name="frmPrincipal" id="frmPrincipal" action="" method="POST">
<input name="hidIdCliente" id="hidIdCliente" type="hidden">
<section id="secFormulario">
<div class="table">
<div class="tr">
<div class="tdTexto">Número identificación </div>
<div class="td">
<input name="txtNumeroIdentificacion" type="text" id="txtNumeroIdentificacion" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Cliente</div>
<div class="td"><input name="txtCliente" type="text" id="txtCliente" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Municipio residencia</div>
<div class="td"><select name="selMunicipioResidencia" id="selMunicipioResidencia" class="form-control tamanioTexto">
<option value="">-SELECCIONE--</option>
</select></div>
</div>
<div class="tr">
<div class="tdTexto">Municipio negocio</div>
<div class="td">
<input type="hidden" name="selMunicipioNegocio" id="selMunicipioNegocio">
<input type="text" name="txtMunicipioNegocio" id="txtMunicipioNegocio" class="form-control">
<!--    <select name="selMunicipioNegocio" id="selMunicipioNegocio" class="form-control tamanioTexto">
<option value="">-SELECCIONE--</option>
</select>-->
</div>
</div>
<div class="tr">
<div class="tdTexto">Fecha Nacimiento </div>
<div class="td"><input name="txtFechaNacimiento" type="date" id="txtFechaNacimiento" class="form-control tamanioTexto"></div>
</div>
<div class="tr">
<div class="tdTexto">Estado</div>
<div class="td"><select name="selEstado" id="selEstado" class="form-control tamanioTexto">
<option value="">--SELECCIONE--</option>
<option value="A">ACTIVO</option>
<option value="I">INACTIVO</option>
</select></div>
</div>
</div>
<section id="secTelefonos">
    <div  class="table">
        <div class="tr">
            <div class="td">Tipo</div>
            <div class="td">Número</div>
            <div class="td">+</div>
        </div>
    <div class="tr">
      <div class="td"><label>
        <select name="selTipoTelefono" id="selTipoTelefono">
          <option>--SELECCIONE--</option>
          <option value="CASA">Casa</option>
          <option value="OFICINA">Oficina</option>
          <option value="CELULAR">Celular</option>
        </select>
      </label></div>
      <div class="td"><label>
        <input name="txtNumeroTelefono" type="text" id="txtNumeroTelefono">
      </label></div>
        <div class="td">
        <input name="btnAdicionarTelefono" type="button" id="btnAdicionarTelefono" value="+">      
        </div>
      </div>
        </div><br>
<div id="divListadoTelefonos"><table width="30%" border="1" id="listadoTelefonos">
    <tr>
      <th width="29%" scope="row">Tipo</th>
      <td width="69%">Número</td>
      <td width="2%">-</td>
    </tr>
    <tr>
      <th scope="row"><label></label></th>
      <td><label></label></td>
      <td><label>
        <input name="btnEliminarTelefono" type="button" id="btnEliminarTelefono" value="-">
      </label></td>
    </tr>
  </table></div>
    </section>
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
<td>Número identificación </td>
<td>Cliente</td>
<td>Municipio residencia </td>
<td>Municipio negocio</td>
<td>Fecha de nacimiento</td>
<td>Estado</td>
</tr>
</table>
</section>
</form>
</section>
</body>
</html>
