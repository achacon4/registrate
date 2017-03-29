$(function () {
/*    $.ajax({
        url: '../controlador/Menu.Cargar.php'
        , type: 'POST'
        , dataType: 'json'
        , data: null
        , success: function (resultado) {
            if (resultado.exito === 0) {
                alert(resultado.mensaje);
                return false;
            }
            var municipioResidencia = $("#selEstado");
            municipioResidencia.empty();
            
            municipioResidencia.append("<option value=''>--Seleccione--</option>");
            
            $.each(resultado.data.menus, function (indice, menu) {
                municipioResidencia.append("<option value=" + menu.idMenu + ">" + menu.menu + "</option>");
            });        
        }, error: function (error) {
            alert("Error: " + error);
        }
    }); 
  */  
    $("#btnAdicionar").click(function () {
        var dataUrl = $("#frmMenu").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);

        $.ajax({
            url: '../controlador/Menu.Adicionar.php'
            , type: 'POST'
            , dataType: 'json'
            , data: data
            , success: function (resultado) {
                if (resultado.exito === 0) {
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
            }, error: function (error) {
                alert("Error: " + error);
            }
        });
    }); 
    
$("#btnEliminar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmMenu").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/Menu.Eliminar.php'
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




        $("#btnConsultar").click(function () {
        consultar();
    }); 
    
    $("#btnModificar").click(function () {
        if (document.getElementById("hidIdMenu").value === '') {
            alert("Por favor seleccione un Menu");
            return false;
        }
        
        var dataUrl = $("#frmMenu").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);

        $.ajax({
            url: '../controlador/Menu.Modificar.php'
            , type: 'POST'
            , dataType: 'json'
            , data: data
            , success: function (resultado) {
                if (resultado.exito === 0) {
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
                consultar();
            }, error: function (error) {
                alert("Error: " + error);
            }
        });
    }); 
    
    $("#btnLimpiar").click(function () {
        limpiar();
    });
}); 

function consultar() {
    var data = $("#frmMenu").serialize();
    $.ajax({
        url: '../controlador/Menu.Consultar.php'
        , type: 'POST'
        , dataType: 'json'
        , data: data
        , success: function (resultado) {
            if (resultado.exito === 0) {
                alert(resultado.mensaje);
                return false;
            }
            crearListado(resultado.data.menu);
        }, error: function (error) {
            alert("Error: " + error);
        }
    });
} 
function crearListado(Menu) {
    var numeroRegistros = Menu.length;
    if (numeroRegistros === 1) {
        $("#hidIdMenu").val(Menu[0].idMenu);
        $("#txtMenu").val(Menu[0].menu); 
        $("#selEstado").val(Menu[0].estado);  
    } else {
        var listado = '<table>'
                      +      '<tr>'
                      +          '<th>N°</th>'
                      +          '<th>Menu</th>' 
                      +          '<th>Estado</th>'
                      +      '</tr>';
        $.each(Menu, function (indice, Menu) {
            listado = listado + '<tr><td><a href="#" onclick="seleccionarRegistros(' + Menu.idMenu + ')">' + indice + '</a></td>'
                    + '<td>' + Menu.menu + '</td>'
                    + '<td>' + Menu.estado + '</td>'
                    + '</tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
} 

function seleccionarRegistros(idMenu) {
    limpiar();
    $("#hidIdMenu").val(idMenu);
    $("#btnConsultar").trigger("click");
} 

function limpiar(){
    $('#hidIdMenu').val('');
    $('#txtMenu').val('');
    $('#selEstado').val('');
} 

function validarVacios(){
    if (document.getElementById("txtMenu").value === '') {
        alert("Por favor digite Menu");
        document.getElementById("txtMenu").focus();
        return false;
    } 
    if (document.getElementById("selEstado").value === '') {
        alert("Por favor seleccione un estado");
        document.getElementById("selEstado").focus();
        return false;
    }
}


