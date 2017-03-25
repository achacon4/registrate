$(function(){
    $.ajax({
        url:'../controlador/evento.cargar.php'
        , type:'POST'
        , dataType:'json'
        , data:null
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }
            
            $("#txtLugarEvento").autocomplete({
                source: '../controlador/lugar.consultar.ajax.php'
                , select: function(event, ui){
                    $("#selLugarEvento").val(ui.item.id);
                }
            });
            
            $("#txtDatosPersonales").autocomplete({
                source: '../controlador/datosPersonales.consultar.ajax.php'
                , select: function(event, ui){
                    $("#selDatosPersonales").val(ui.item.id);
                }
            });
            
            
            $("#txtCategoriaEvento").autocomplete({
                source: '../controlador/categoria.consultar.ajax.php'
                , select: function(event, ui){
                    $("#selCategoriaEvento").val(ui.item.id);
                }
            });
            
//            var lugarFK = $("#selLugarEvento");
//            var datosPersonalesFK = $("#selDatosPersonales");
//            var categoriaFK = $("#selCategoriaEvento");
            
            //var municipioNegocio = $("#selMunicipioNegocio");
//            lugarFK.empty();
//            datosPersonalesFK.empty();
//            categoriaFK.empty();
            //municipioNegocio.empty();
            
//            lugarFK.append("<option value=''>--SELECCIONE--</option>");
//            datosPersonalesFK.append("<option value=''>--SELECCIONE--</option>");
//            categoriaFK.append("<option value=''>--SELECCIONE--</option>");
            //municipioNegocio.append("<option value=''>--Seleccione--</option>");
            
//            $.each(resultado.data.lugares, function(indice, lugar){
//                lugarFK.append("<option value=" + lugar.idLugar + ">" + lugar.nombre + "</option>");
//                //municipioNegocio.append("<option value=" + municipio.idMunicipio + ">" + municipio.municipio + "</option>");
//            });
            
//            $.each(resultado.data.datosPersonales, function(indice, dato){
//                datosPersonalesFK.append("<option value=" + dato.idDatosPersonales + ">" + dato.nombre + "</option>");
//            });
//            
//            $.each(resultado.data.categorias, function(indice, categoria){
//                categoriaFK.append("<option value=" + categoria.idCategoria + ">" + categoria.nombreCategoria + "</option>");
//            });
            
//            $("#txtMunicipioNegocio").autocomplete({
//                source: '../controlador/municipio.consultar.ajax.php'
//                , select: function(event, ui){
//                    $("#selMunicipioNegocio").val(ui.item.id);
//                }
//            });
        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
    
    $("#btnAdicionar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        
        var dataUrl = $("#frmPrincipalEvento").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/evento.adicionar.php'
            , type:'POST'
            , dataType:'json'
            , data:data
            , success:function (resultado){
                if(resultado.exito === 0){
                    alert(resultado.mensaje);
                    return false;
                }
                
                alert(resultado.mensaje);
            }, error:function(xhr, status, error){
                alert("Error: "+error);
            }
        });
    });
    
    $("#btnModificar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipalEvento").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/evento.modificar.php'
            , type:'POST'
            , dataType:'json'
            , data:data
            , success:function (resultado){
                if(resultado.exito === 0)
                {
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
            }, error:function(xhr, status, error){
                alert("Error: "+error);
            }
        });
    });
    
    $("#dtFechaInicial").datepicker(function(){
        dateFormat: 'yyyy-mm-dd';
    });
    
    $("#dtFechaFinal").datepicker(function(){
        dateFormat: 'yyyy-mm-dd';
    });
    
    $("#tmHoraInicial").timepicker({
        
    });
    
    $("#tmHoraFinal").timepicker({
        
    });
    
    $("#btnConsultar").click(function (){  
        consultar();
    });
    
    $("#btnLimpiar").click(function (){  
         limpiar();
    });
});

function limpiar(){
    $("#hidIdEvento").val('');
    $("#selLugarEvento").val('');
    $("#txtLugarEvento").val('');
    $("#selDatosPersonales").val('');
    $("#txtDatosPersonales").val('');
    $("#selCategoriaEvento").val('');
    $("#txtCategoriaEvento").val('');
    $("#txtNombreEvento").val('');
    $("#dtFechaInicial").val('');
    $("#dtFechaFinal").val('');
    $("#tmHoraInicial").val('');
    $("#tmHoraFinal").val('');
    $("#txtCantidadAsistentes").val('');
    $("#txtDescripcionEvento").val('');
    $("#selEstadoEvento").val('');
}

function crearListado(eventos){

    var numeroRegistros = eventos.length;
    
    if(numeroRegistros === 1)
    {
        $("#hidIdEvento").val(eventos[0].idEvento);
        $("#selLugarEvento").val(eventos[0].idLugarFK);
        $("#txtLugarEvento").val(eventos[0].lugarFK);
        $("#selDatosPersonales").val(eventos[0].idDatosPersonalesFK);
        $("#txtDatosPersonales").val(eventos[0].datosPersonalesFK);
        $("#selCategoriaEvento").val(eventos[0].idCategoriaFK);
        $("#txtCategoriaEvento").val(eventos[0].categoriaFK)
        $("#txtNombreEvento").val(eventos[0].nombreEvento);
        $("#dtFechaInicial").val(eventos[0].fechaInicial);
        $("#dtFechaFinal").val(eventos[0].fechaFinal);
        $("#tmHoraInicial").val(eventos[0].horaInicial);
        $("#tmHoraFinal").val(eventos[0].horaFinal);
        $("#txtCantidadAsistentes").val(eventos[0].cantidadAsistentes);
        $("#txtDescripcionEvento").val(eventos[0].descripcionEvento);
        $("#selEstadoEvento").val(eventos[0].estadoEvento);
    }
    else
    {
        var listado = '<table id="tbListado" class="table table-striped" border="1">';
        listado = listado + '<tr><td>Nombre del evento </td>'
                + '<td>Lugar </td>'
                + '<td>Responsable </td>'
                + '<td>Categoria </td>'
                + '<td>Fecha inicial </td>'
                + '<td>Fecha final </td>'
                + '<td>Hora inicial </td>'
                + '<td>Hora final </td>'
                + '<td>Cantidad de asistentes </td>'
                + '<td>Descripcion de evento </td>'
                + '<td>Estado del evento </td>'
                ;
        
        $.each(eventos, function(indice, evento){
            //alert(cliente.cliente);
            listado = listado + '<tr><td><a href="#" onclick="seleccionarRegistro(' + evento.idEvento + ')">' + evento.nombreEvento +  '</a></td>'
                    + '<td>' + evento.lugarFK + '</td>'
                    + '<td>' + evento.datosPersonalesFK + '</td>'
                    + '<td>' + evento.categoriaFK + '</td>'
                    + '<td>' + evento.fechaInicial + '</td>'
                    + '<td>' + evento.fechaFinal + '</td>'
                    + '<td>' + evento.horaInicial + '</td>'
                    + '<td>' + evento.horaFinal + '</td>'
                    + '<td>' + evento.cantidadAsistentes + '</td>'
                    + '<td>' + evento.descripcionEvento + '</td>'
                    + '<td>' + evento.estadoEvento + '</td>'
                    + '</tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
}

function seleccionarRegistro(idEvento){
    limpiar();
    $("#hidIdEvento").val(idEvento);
    $( "#btnConsultar" ).trigger( "click" );
}

function consultar(){
    var data = $("#frmPrincipalEvento").serialize(); 
//    var dataUrl = $("#frmPrincipalEvento").serialize();
//    var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"').replace(/\s/g, '') + '"}';
//    var data = JSON.parse(dataJsonString);
    
    $.ajax({
        url:'../controlador/evento.consultar.php'
        , type:'POST'
        , dataType:'json'
        , data:data
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }

            crearListado(resultado.data.eventos);

        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
}

//Función validadora de Vacíos en el Formulario
function validarVacios()
{
    var indiceFormulario = document.getElementById("selLugarEvento").selectedIndex;
    
    if(indiceFormulario === null || indiceFormulario === 0)
    {
       alert("Debe Seleccionar un Lugar para el Evento"); 
       document.getElementById("selLugarEvento").focus();
       return false;
    };
    
    if(document.getElementById("txtLugarEvento").value === '')
    {
       alert("Debe Seleccionar un Lugar para el Evento");
        document.getElementById("txtLugarEvento").focus();
        return false;
    };
    
    var indiceFormulario = document.getElementById("selDatosPersonales").selectedIndex;
    
    if(indiceFormulario === null || indiceFormulario === 0)
    {
       alert("Debe Seleccionar los Datos Personales"); 
       document.getElementById("selDatosPersonales").focus();
       return false;
    };
    
    if(document.getElementById("txtDatosPersonales").value === '')
    {
       alert("Debe Seleccionar los Datos Personales");
        document.getElementById("txtDatosPersonales").focus();
        return false;
    };
    
    var indiceFormulario = document.getElementById("selCategoriaEvento").selectedIndex;
    
    if(indiceFormulario === null || indiceFormulario === 0)
    {
       alert("Debe Seleccionar una Categoria para el Evento"); 
       document.getElementById("selCategoriaEvento").focus();
       return false;
    };
    
    if(document.getElementById("txtCategoriaEvento").value === '')
    {
       alert("Debe Seleccionar la Categoria del Evento");
        document.getElementById("txtCategoriaEvento").focus();
        return false;
    };
    
    if(document.getElementById("txtNombreEvento").value === '')
    {
        alert("Debe Digitar el Nombre del Evento");
        document.getElementById("txtNombreEvento").focus();
        return false;
    }
    
    if(document.getElementById("txtCantidadAsistentes").value === '')
    {
        alert("Debe Digigitar la Cantidad de Asistentes al Evento");
        document.getElementById("txtCantidadAsistentes").focus();
        return false;
    }
    
    if(document.getElementById("txtDescripcionEvento").value === '')
    {
        alert("Debe Añadir un Descripción para el Evento");
        document.getElementById("txtDescripcionEvento").focus();
        return false;
    }
    return true;
}