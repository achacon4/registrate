$(function(){ 

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
            }, error:function(xhr, status, error){
                alert("Error: "+error);
            }
        });
    });
     
        $("#btnEliminar").click(function(){
            
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
              consultar();
            }, error:function(xhr,status,error){
                alert("Error: "+error);
            }
        });
    });
    $("#btnConsultar").click(function(){
       consultar();
    }); 
    $("#btnLimpiar").click(function(){
       limpiar();
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
    
function crearListado(Lugares){
    var numeroRegistro = Lugares.length;
    
    if(numeroRegistro === 1){
    $("#hidIdLugar").val(Lugares[0].idLugar);
    $("#txtNombre").val(Lugares[0].nombre);
    $("#selDisponibilidad").val(Lugares[0].disponibilidad);
    $("#txtDescripcion").val(Lugares[0].descripcion);
    $("#txtPresupuesto").val(Lugares[0].presupuesto);
    $("#txtCantidadPersonas").val(Lugares[0].idMunicipioResidencia);
   
  
        
    }else{
              var listado = '<table class="table" id="tbListado">'+
                       '<tr><td>Nombre</td>\n\
                        <td>Disponibilidad</td>\n\
                        <td>Descripcion</td>\n\
                        <td>Presupuesto</td>\n\
                        <td>Cantidad Personas</td> \n\
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
function seleccionarRegistro(nombre){
    limpiar();
    $("#txtNombre").val(nombre);
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
            alert("Debe llenar la Descripcion");
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

     
     