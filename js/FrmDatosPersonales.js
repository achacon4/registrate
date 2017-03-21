  

$(function (){
    $("#btnAdicionar").click(function(){
            
            if(validarVacios() === false){
                   return false;
               }
               
           var data = $("#frmDatosPersonales").serialize();

        $.ajax ({
            url:'../controlador/DatosPersonales.adicionar.php' 
            , type:'POST'
            , dataType:'json'
            ,data:data
          
            ,success:function (resultado){
             alert(resultado.mensaje);
            }, error:function(xhr,status,error){
                alert("Error: "+error);
            }
        });
    });  
    
    $("#btnConsultar").click(function(){
        consultar();
    });
    
    
    function validarVacios(){
        if(document.getElementById("txtNombre").value ===''){
            alert("Debe digitar el nom");
            document.getElementById("txtNombre").focus();
            return false;  
        };
        return true;
    };
    
    function consultar(){
    var data = $("#frmDatosPersonales").serialize();
        
    $.ajax({
        url:'../controlador/DatosPersonales.consultar.php',
        type:'POST',
        dataType:'json',
        data:data,
        success:function(resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }
            crearListado(resultado.data.datos);
            
        }, error:function (xhr, status, error){
                alert("Error: "+error);
            }
    });
}

function limpiar(){
    $("#hididDatosPersonales").val('');
    $("#txtNombre").val('');
    $("#txtApaterno").val('');
    $("#txtAmaterno").val('');
    $("#selTipoDocumento").val('');
    $("#txtNumeroDocumento").val('');
    $("#txtEmail").val('');
    $("#txtTelefono").val('');
}

function eliminar(){
      
           var data = "hidIdDatosPersonales="+$("#hidIdDatosPersonales").val();
                       
        $.ajax ({
            url:'../controlador/DatosPersonales.eliminar.php' 
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
}

$("#btnModificar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmDatosPersonales").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/DatosPersonales.modificar.php'
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
          eliminar();
    });

function crearListado(DatosPersonales){
    var numeroRegistro = DatosPersonales.length;
    
    if(numeroRegistro === 1){
    $("#hidIdDatosPersonales").val(DatosPersonales[0].idDatosPersonales);
    $("#txtNombre").val(DatosPersonales[0].nombre);
    $("#txtApaterno").val(DatosPersonales[0].apaterno);
    $("#txtAmaterno").val(DatosPersonales[0].amaterno);
    $("#selTipoDocumento").val(DatosPersonales[0].tipoDocumento);
    $("#txtNumeroDocumento").val(DatosPersonales[0].numeroDocumento);
    $("#txtEmail").val(DatosPersonales[0].email);
    $("#txtTelefono").val(DatosPersonales[0].telefono);
         
    }else{
        var listado = '<table class="table" id="tblListado">'+
                 '<tr><td>Nombre</td>\n\
                  <td>Apaterno</td>\n\
                  <td>Amaterno</td>\n\
                  <td>Tipo de documento</td>\n\
                  <td>Numero de documento</td> \n\
                  <td>Email</td> \n\
                  <td>Telefono</td> \n\
                 ';
    $.each(DatosPersonales, function (indice, datos){
                  listado = listado+'<tr></td><td><a href="#" onclick="seleccionarRegistro('+datos.idDatosPersonales+')">'+datos.nombre+'</a></td><td>'
                                              +datos.apaterno+'</td><td>'
                                              +datos.amaterno+'</td><td>'
                                              +datos.tipoDocumento+'</td><td>'
                                              +datos.numeroDocumento+'</td><td>'
                                              +datos.email+'</td><td>'
                                              +datos.telefono+'</td></tr>';
              });
               listado = listado+'</table>';    
               $('#secListado').html(listado);
           }
}

function seleccionarRegistro(idDatosPersonales){
    limpiar();
    $("#hidIdDatosPersonales").val(idDatosPersonales);
    $("#btnConsultar").trigger( "click" );
}
});
    
  



