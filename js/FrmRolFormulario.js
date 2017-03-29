$(function(){   
	//Adicionar ya esta programado
     $.ajax({
        url: '../controlador/Formulario.Consultar.php'
        , type: 'POST'
        , dataType: 'json'
        , data: null
        , success: function (resultado) {
            if (resultado.exito === 0) {
                alert(resultado.mensaje);
                return false;
            }
            var municipioResidencia = $("#selIdFormulario");
            municipioResidencia.empty();
            
            municipioResidencia.append("<option value=''>--Seleccione--</option>");
            
            $.each(resultado.data.formularios, function (indice, formulario) {
                municipioResidencia.append("<option value=" + formulario.idFormulario + ">" + formulario.formulario + "</option>");
            });        
        }, error: function (error) {
            alert("Error: " + error);
        }
    });


     $.ajax({
        url: '../controlador/Rol.consultar.php'
        , type: 'POST'
        , dataType: 'json'
        , data: null
        , success: function (resultado) {
            if (resultado.exito === 0) {
                alert(resultado.mensaje);
                return false;
            }
            var municipioResidencia = $("#selIdRol");
            municipioResidencia.empty();
            
            municipioResidencia.append("<option value=''>--Seleccione--</option>");
            
            $.each(resultado.data.rol, function (indice, rol) {
                municipioResidencia.append("<option value=" + rol.idRol + ">" + rol.rol + "</option>");
            });        
        }, error: function (error) {
            alert("Error: " + error);
        }
    });


    $("#btnAdicionar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipalRolFormulario").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/RolFormulario.adicionar.php'
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
        var dataUrl = $("#frmPrincipalRolFormulario").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/RolFormulario.Modificar.php'
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
    


    $("#btnEliminar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipalRolFormulario").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/RolFormulario.Eliminar.php'
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


    //El consultar ya esta programado
    $("#btnConsultar").click(function (){  
        consultar();
    });
    
    $("#btnLimpiar").click(function (){  
         limpiar();
    });
});

function limpiar(){
    $("#idRolFormulario").val('');
    $("#selIdFormulario").val('');
    $("#selIdRol").val('');
    $("#selEstado").val('');
}

function crearListado(rol){

    var numeroRegistros = rol.length;
    
    if(numeroRegistros === 1)
    {
        $("#idRolFormulario").val(rol[0].idRolFormulario);
        $("#selIdFormulario").val(rol[0].idFormulario);
        $("#selIdRol").val(rol[0].idRol);
        $("#selEstado").val(rol[0].estado);        
    }
    else
    {
        var listado = '<table id="tblListado" class="table">';
        $.each(rol, function(indice, rol){
            //alert(cliente.cliente);
            listado = listado + '<tr><td><a href="#" onclick="seleccionarRegistro(' + rol.idRolFormulario + ')">' + rol.idRolFormulario +  '</a></td></tr>';
            listado = listado + '<tr><td>'+rol.idFormulario+'</td></tr>';
            listado = listado + '<tr><td>'+rol.idRol+'</td></tr>';
            listado = listado + '<tr><td>'+rol.estado+'</td></tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
}

function seleccionarRegistro(idRol){
     limpiar();
    $("#idRolFormulario").val(idRol);
    $( "#btnConsultar" ).trigger( "click" );
}

function consultar(){
    var data = $("#frmPrincipalRolFormulario").serialize(); 
    console.log(data);
    $.ajax({
        url:'../controlador/RolFormulario.Consultar.php'
        , type:'POST'
        , dataType:'json'
        , data:data
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }


         crearListado(resultado.data.rolFormulario);

        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
}

//Función validadora de Vacíos en el Formulario
function validarVacios()
{
    var indice1 = document.getElementById("selIdFormulario").selectedIndex;
    var indice2 = document.getElementById("selIdRol").selectedIndex;
    var indice3 = document.getElementById("selEstado").selectedIndex;
    
    
    if(indice1 == "")
    {
       alert("Debe Seleccionar un formulario"); 
       document.getElementById("selIdFormulario").focus();
       return false;
    };

    if(indice2 == "")
    {
       alert("Debe Seleccionar un rol"); 
       document.getElementById("selIdRol").focus();
       return false;
    };

    if(indice3 == "")
    {
       alert("Debe Seleccionar Estado"); 
       document.getElementById("selEstado").focus();
       return false;
    };

    return true;
}