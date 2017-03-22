$(function(){
    
    
    //Autocomplete del input Evento
    $("#txtEvento").autocomplete({
        source: '../controlador/Evento.consultar.ajax.php'
        ,select: function(event, ui){
        $("#selEvento").val(ui.item.id);
        }
    });

    
        $("#btnAdicionar").click(function (){
            if(validarVacios() === false){
                return false;
            }
            var data= $("#frmPrincipal").serialize();
              $.ajax({
                url:'../controlador/AsistenteEvento.adicionar.php'
                , type:'POST'
                , dataType:'json'
                , data:data
                , success:function (resultado){
                    if(resultado.exito === 0){
                        alert(resultado.mensaje);
                        limpiar();
                        return false;
                    }
                    alert(resultado.mensaje);
                }, error:function(xhr, status, error){
                    alert("Error: "+error);
                }
            });
        });

      $("#btnConsultar").click(function (){  
        consultar();
    });
});
function consultar(){
    var data = $("#frmPrincipal").serialize();
        $.ajax({
           url:'../controlador/AsistenteEvento.consultar.php',
           type:'POST',
           dataType:'json',
           data:data,
           success:function(resultado){
               if(resultado.exito === 0){
                   alert(resultado.mensaje);
                   return false;
               }
               crearListado(resultado.data.AsistenteEvento);
           },error:function(xhr, status, error){
               alert("error" + error);
           }
           
        });
}
 function crearListado(AsistenteEvento){
    var numeroRegistro = AsistenteEvento.length;
    
    if(numeroRegistro === 1){
    $("#idAsistenteEvento").val(AsistenteEvento[0].idAsistenteEvento);
    $("#txtEvento").val(AsistenteEvento[0].idEventoFK);
    $("#txtNombre").val(AsistenteEvento[0].nombre);
    $("#txtApaterno").val(AsistenteEvento[0].apaterno);
    $("#txtAmaterno").val(AsistenteEvento[0].amaterno);
    $("#selTipoDocumento").val(AsistenteEvento[0].tipoDocumento);
    $("#txtNumeroDocumento").val(AsistenteEvento[0].numeroDocumento);
    $("#txtEmail").val(AsistenteEvento[0].email);
    $("#txtTelefono").val(AsistenteEvento[0].telefono);
    $("#selEstado").val(AsistenteEvento[0].estado);
        
    }else{
              var listado = '<table class="table table-hover" id="tbListado">'+
                       '<tr><td><b>Nombre</b></td>\n\
                        <td><b>Apellido Paterno</b></td>\n\
                        <td><b>Apellido Materno</b></td>\n\
                        <td><b>Tipo de Documento</b></td>\n\
                        <td><b>Número de Documento</b></td> \n\
                        <td><b>Email</b></td> \n\
                        <td><b>Teléfono</b></tr>';
         
    $.each(AsistenteEvento, function (indice, asistente){
                  listado = listado+'<tr><td>'+asistente.nombre+'</td><td><a onclick="seleccionarRegistro('+asistente.idAsistenteEvento+')">'+asistente.apaterno+'</a></td><td>'
                                              +asistente.amaterno+'</td><td>'
                                              +asistente.tipoDocumento+'</td><td>'
                                              +asistente.numeroDocumento+'</td><td>'
                                              +asistente.email+'</td><td>'
                                              +asistente.telefono+'</td><tr>'
                                                +asistente.estado+'</td><tr>';;
              });
               listado = listado +'</table>';    
               $('#secListadoPersonas').html(listado);
           }
    
}



function limpiar()
{
    $("#selEvento").val('');
    $("#txtEvento").val('');
    $("#txtNombre").val('');
    $("#txtAmaterno").val('');
    $("#txtApaterno").val('');
    $("#selTipoDocumento").val('');
    $("#txtNumeroDocumento").val('');
    $("#txtEmail").val('');
    $("#txtTelefono").val('');
    
    
    
}
function validarVacios(){
        if(document.getElementById("txtNombre").value ===''){
            alert("Debe ingresar su nombre.");
            document.getElementById("txtNombre").focus();
            return false;  
        };
         if(document.getElementById("txtApaterno").value ===''){
            alert("Debe ingresar su apellido paterno.");
            document.getElementById("txtApaterno").focus();
            return false;  
        };
        
        if(document.getElementById("txtAmaterno").value ===''){
            alert("Debe ingresar su apellido materno.");
            document.getElementById("txtAmaterno").focus();
            return false;  
        };
        
         var indiceFormulario = document.getElementById("selTipoDocumento").selectedIndex;
        if(indiceFormulario === null || indiceFormulario === 0){
           alert("Debe seleccionar el tipo de documento."); 
           document.getElementById("selFormulario").focus();
           return false;
        };
        
         
         if(document.getElementById("txtNumeroDocumento").value ===''){
            alert("Debe ingresar su número de identificación.");
            document.getElementById("txtNumeroDocumento").focus();
            return false;  
        };
         
         if(document.getElementById("txtEmail").value ===''){
            alert("Debe ingresar su Email.");
            document.getElementById("txtEmail").focus();
            return false;  
        };
        
        if(document.getElementById("txtTelefono").value ===''){
            alert("Debe ingresar su número de teléfono");
            document.getElementById("txtTelefono").focus();
            return false;  
        };
        
        return true;
    };
