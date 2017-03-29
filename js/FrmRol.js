$(function(){   
	//Adicionar ya esta programado
    $("#btnAdicionar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipalRol").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/Rol.adiciona.php'
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
        var dataUrl = $("#frmPrincipalRol").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/Rol.Modificar.php'
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
        var dataUrl = $("#frmPrincipalRol").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/Rol.Eliminar.php'
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
    $("#idRol").val('');
    $("#txtNombreRol").val('');
    $("#selEstado").val('');
}

function crearListado(rol){

    var numeroRegistros = rol.length;
    
    if(numeroRegistros === 1)
    {
        $("#idRol").val(rol[0].idRol);
        $("#txtNombreRol").val(rol[0].rol);
        $("#selEstado").val(rol[0].estado);        
    }
    else
    {
        var listado = '<table id="tblListado" class="table">';
        $.each(rol, function(indice, rol){
            //alert(cliente.cliente);
            listado = listado + '<tr><td><a href="#" onclick="seleccionarRegistro(' + rol.idRol + ')">' + rol.rol +  '</a></td></tr>';
            listado = listado + '<tr><td>'+rol.estado+'</td></tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
}

function seleccionarRegistro(idRol){
     limpiar();
    $("#idRol").val(idRol);
    $( "#btnConsultar" ).trigger( "click" );
}

function consultar(){
    var data = $("#frmPrincipalRol").serialize(); 
    console.log(data);
    $.ajax({
        url:'../controlador/Rol.consultar.php'
        , type:'POST'
        , dataType:'json'
        , data:data
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }


         crearListado(resultado.data.rol);

        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
}

//Función validadora de Vacíos en el Formulario
function validarVacios()
{
    var indice = document.getElementById("selEstado").selectedIndex;
    var nombreRol = document.getElementById("txtNombreRol");
    
    if(indice == "")
    {
       alert("Debe Seleccionar Estado"); 
       document.getElementById("selEstado").focus();
       return false;
    };


    if(nombreRol == "")
    {
       alert("Debe escribir un nombre"); 
       document.getElementById("txtNombreRol").focus();
       return false;
    };
    
    return true;
}