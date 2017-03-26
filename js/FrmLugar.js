$(function(){ 

    $("#txtNombre").autocomplete({
        source: '../controlador/lugar.consultar.ajax.php',
        select: function(event, ui){
            $("#hidIdLugar").val(ui.item.id);
        }
    });
    
  $("#btnAdicionar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/Lugar.adicionar.php'
            , type:'POST'
            , dataType:'json'
            , data:data
            , success:function (resultado){
                if(resultado.exito === 0){
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
                limpiarListado();
            }, error:function(xhr, status, error){
                alert("Error: "+error);
            }
        });
    });  
     $("#btnModificar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/Lugar.modificar.php'
            , type:'POST'
            , dataType:'json'
            , data:data
            , success:function (resultado){
                if(resultado.exito === 0){
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
                limpiarListado();
            }, error:function(xhr, status, error){
                alert("Error: "+error);
            }
        });
    });
     
        $("#btnEliminar").click(function(){
           var confirmar = confirm("Desea eliminar el registro.");
           var texto;
           if(confirmar == true){
              
           var data = "hidIdLugar="+$("#hidIdLugar").val();
                       
        $.ajax ({
            url:'../controlador/Lugar.eliminar.php' 
            , type:'POST'
            , dataType:'json'
            ,data:data
          
            ,success:function (resultado){
             if(resultado.exito === 0){
                    alert(resultado.mensaje);
                    return false;
             }
             alert(resultado.mensaje);
             limpiar();
             limpiarListado();
             consultar();
            }, error:function(xhr,status,error){
                alert("Error: "+error);
            }
        });
        texto="Se eliminó correctamente";
    }
    else{
         alert("Su petición fue cancelada");
    }
    });
    $("#btnConsultar").click(function(){
       consultar();
    }); 
    $("#btnLimpiar").click(function(){
       limpiar();
        limpiarListado();
    });
});
function limpiar(){
    
    $("#hidIdLugar").val('');
    $("#txtNombre").val('');
    $("#selDisponibilidad").val('');
    $("#txtDescripcion").val('');
    $("#txtPresupuesto").val('');
    $("#txtCantidadPersonas").val('');
    
}
function limpiarListado(){
    $("#secListado").html('');
}
function crearListado(Lugares){
    var numeroRegistro = Lugares.length;
    
    if(numeroRegistro === 1){
    $("#hidIdLugar").val(Lugares[0].idLugar);
    $("#txtNombre").val(Lugares[0].nombre);
    $("#selDisponibilidad").val(Lugares[0].disponibilidad);
    $("#txtDescripcion").val(Lugares[0].descripcion);
    $("#txtPresupuesto").val(Lugares[0].presupuesto);
    $("#txtCantidadPersonas").val(Lugares[0].cantidadPersonas);
   
  
        
    }else{
              var listado = '<table class="table" id="tblListado">'+
                       '<tr class="success"><td>Nombre</td>\n\
                        <td>Estado</td>\n\
                        <td>Descripción</td>\n\
                        <td>Presupuesto</td>\n\
                        <td>Capacidad maxima de personas</td> \n\
                       ';
    $.each(Lugares, function (indice, lugar){
                  listado = listado+'<tr></td><td><a href="#" onclick="seleccionarRegistro('+lugar.idLugar+')">'+lugar.nombre+'</a></td><td>'
                                              +lugar.disponibilidad+'</td><td>'
                                              +lugar.descripcion+'</td><td>'
                                              +lugar.presupuesto+'</td><td>'
                                              +lugar.cantidadPersonas+'</td></tr>';
              });
               listado = listado+'</table>';    
               $('#secListado').html(listado);
           }
    
}
function seleccionarRegistro(idLugar){
    limpiar();
    $("#hidIdLugar").val(idLugar);
    $("#btnConsultar").trigger( "click" );
    
}
function consultar(){
    var data = $("#frmPrincipal").serialize();
    
            $.ajax ({
            url:'../controlador/Lugar.consultar.php' 
            , type:'POST'
            , dataType:'json'
            ,data:data
          
            ,success:function (resultado){
             if(resultado.exito === 0){
                    alert(resultado.mensaje);
                    return false;
             }
              crearListado(resultado.data.lugares);
            }, error:function(xhr,status,error){
                alert("Error: "+error);
            }
        });
}
function validarVacios(){
        if(document.getElementById("txtNombre").value ===''){
            alert("Debe digitar el Nombre");
            document.getElementById("txtNombre").focus();
            return false;  
        };
          var indiceFormulario = document.getElementById("selDisponibilidad").selectedIndex;
        if(indiceFormulario === null || indiceFormulario === 0){
           alert("Debe seleccionar la Disponibilidad"); 
           document.getElementById("selDisponibilidad").focus();
           return false;
        };
        
        if(document.getElementById("txtDescripcion").value ===''){
            alert("Debe llenar la Descripción");
            document.getElementById("txtDescripcion").focus();
            return false;  
        };
        
        if(document.getElementById("txtPresupuesto").value ===''){
            alert("Debe digitar el Presupuesto");
            document.getElementById("txtPresupuesto").focus();
            return false;  
        };
        
        if(document.getElementById("txtCantidadPersonas").value ===''){
            alert("Debe digitar la cantidad de las personas");
            document.getElementById("txtCantidadPersonas").focus();
            return false;  
        };
        return true;
    };

     
     