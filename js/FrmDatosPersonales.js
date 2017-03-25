  

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
             limpiar();
            }, error:function(xhr,status,error){
                alert("Error: "+error);
            }
        });
    });  
    
    $("#btnConsultar").click(function(){
        consultar();
    });
 

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
                limpiar();
                consultar();
                desabilitarEstado()
            }, error:function(xhr, status, error){
                alert("Error: "+error);
            }
        });
    });
    
     $("#btnEliminar").click(function(){
          eliminar();
          desabilitarEstado()
    });
     $("#btnLimpiar").click(function(){
          limpiar();
          desabilitarEstado()
    });


});

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
    $("#selEstado").val(DatosPersonales[0].estado);
         
    }else{
        var listado = '<table class="table"  id="tblListado">'+
                 '<tr class="active"><td>Nombre</td>\n\
                  <td>Primer Apellido</td>\n\
                  <td>Segundo Apellido</td>\n\
                  <td>Tipo Documento</td>\n\
                  <td>Número Documento</td> \n\
                  <td>Email</td> \n\
                  <td>Teléfono</td> \n\
                  <td>Estado</td> \n\
                 ';
    $.each(DatosPersonales, function (indice, datos){
                  listado = listado+'<tr></td><td><a href="#" onclick="seleccionarRegistro('+datos.idDatosPersonales+')">'+datos.nombre+'</a></td><td>'
                                              +datos.apaterno+'</td><td>'
                                              +datos.amaterno+'</td><td>'
                                              +datos.tipoDocumento+'</td><td>'
                                              +datos.numeroDocumento+'</td><td>'
                                              +datos.email+'</td><td>'
                                              +datos.telefono+'</td><td>'
                                              +datos.estado+'</td></tr>';
              });
               listado = listado+'</table>';    
               $('#secListado').html(listado);

               
           }
}
function habilitarEstado(){
    var estado= '<select name="selEstado" id="selEstado" class="form-control tamanioTexto">'
                    +' <option value="">---SELECCIONE---</option>'
                    +' <option>A</option>'
                    +' <option>I</option>';
     estado=estado +'</select>';
     $('#selEstado').html(estado);
}
function desabilitarEstado(){
    var estado= '<select name="selEstado" id="selEstado" class="form-control tamanioTexto">'
                    +' <option value="">---SELECCIONE---</option>'
                    +' <option>A</option>'
                    +' <option disabled="">I</option>';
     estado=estado +'</select>';
     $('#selEstado').html(estado);
}
function seleccionarRegistro(idDatosPersonales){
    limpiar();
    habilitarEstado()
    $("#hidIdDatosPersonales").val(idDatosPersonales);
    $("#btnConsultar").trigger( "click" );
  
}
function limpiar(){
    $("#hidIdDatosPersonales").val('');
    $("#txtNombre").val('');
    $("#txtApaterno").val('');
    $("#txtAmaterno").val('');
    $("#selTipoDocumento").val('');
    $("#txtNumeroDocumento").val('');
    $("#txtEmail").val('');
    $("#txtTelefono").val('');
    $("#selEstado").val('');
}
 function validarVacios(){
        if(document.getElementById("txtNombre").value ===''){
            alert("Debe digitar el nombre");
            document.getElementById("txtNombre").focus();
            return false;  
        };
        if(document.getElementById("txtApaterno").value ===''){
            alert("Debe digitar el primer apellido");
            document.getElementById("txtApaterno").focus();
            return false;  
        };
        if(document.getElementById("txtAmaterno").value ===''){
            alert("Debe digitar el segundo apellido");
            document.getElementById("txtAmaterno").focus();
            return false;  
        };
         var indiceFormulario = document.getElementById("selTipoDocumento").selectedIndex;
        if(indiceFormulario === null || indiceFormulario === 0){
           alert("Debe seleccionar el tipo de documento"); 
           document.getElementById("selTipoDocumento").focus();
           return false;
        };
        if(document.getElementById("txtNumeroDocumento").value ===''){
            alert("Debe digitar el número de identificación");
            document.getElementById("txtNumeroDocumento").focus();
            return false;  
        };
        if(document.getElementById("txtEmail").value ===''){
            alert("Debe digitar el email");
            document.getElementById("txtEmail").focus();
            return false;  
        };
        if(document.getElementById("txtTelefono").value ===''){
            alert("Debe digitar el teléfono");
            document.getElementById("txtTelefono").focus();
            return false;  
        };
        return true;
    };
