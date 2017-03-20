<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery-ui.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="../jquery/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="../css/FrmCliente.css">
</head>
<body>
<header>
<h1>Categoria</h1>
</header>
<section id="secPrincipal">
    <form name="frmPrincipal" id="frmPrincipal" action="" method="POST">
    <input name="hidIdCategoria" id="hidIdCategoria" type="hidden">
    <input name="hidAccion" id="hidAccion" type="hidden">
    <section id="secFormulario">
        <input type="hidden" name="idCategoria" id="idCategoria">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-6">Nombre de Categoria</label>            
                    <div class="col-lg-12">
                    <input name="txtNombreCategoria" type="" id="txtNombreCategoria" class="form-control tamanioTexto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <nav>
       <input name="btnAdicionar" type="button" id="btnAdicionar" value="ADICIONAR" class="btn btn-danger">
       <input name="btnModificar" type="button" id="btnModificar" value="MODIFICAR" class="btn btn-danger">
       <input name="btnConsultar" type="button" id="btnConsultar" value="CONSULTAR" class="btn btn-default">
       <input name="btnLimpiar" type="button" id="btnLimpiar" value="ELIMINAR" class="btn btn-default">
    </nav>

    </form>
    <div name="resultado" id="resultado"></div>
</section>
<script src="../js/categoria.js" type="text/javascript"></script>
</body>
</html>
