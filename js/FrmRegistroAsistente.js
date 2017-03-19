$(function(){
    $("#btnAdicionar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/RegistroAsistente.adicionar.php'
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
    
//    $("#btnConsultar").click(function (){  
//        consultar();
//    });
});
// function crearListado(RegistroAsistente){
//    var numeroRegistro = RegistroAsistente.length;
//    
//    if(numeroRegistro === 1){
//    $("#idAsistenteEvento").val(RegistroAsistente[0].idAsistenteEvento);
//    $("#txtNombre").val(RegistroAsistente[0].nombre);
//    $("#txtApaterno").val(RegistroAsistente[0].apaterno);
//    $("#txtAmaterno").val(RegistroAsistente[0].amaterno);
//    $("#selTipoDocumento").val(RegistroAsistente[0].tipoDocumento);
//    $("#txtNumeroDocumento").val(RegistroAsistente[0].numeroDocumento);
//    $("#txtEmail").val(RegistroAsistente[0].email);
//    $("#txtTelefono").val(RegistroAsistente[0].telefono);
//    
//        
//    }else{
//              var listado = '<table class="table table-hover" id="tbListado">'+
//                       '<tr><td><b>Nombre</b></td>\n\
//                        <td><b>Apellido Paterno</b></td>\n\
//                        <td><b>Apellido Materno</b></td>\n\
//                        <td><b>Tipo de Documento</b></td>\n\
//                        <td><b>Número de Documento</b></td> \n\
//                        <td><b>Email</b></td> \n\
//                        <td><b>Teléfono</b></tr>';
//         
//    $.each(RegistroAsistente, function (indice, asistente){
//                  listado = listado+'<tr><td>'+asistente.nombre+'</td><td><a onclick="seleccionarRegistro('+asistente.idAsistenteEvento+')">'+asistente.apaterno+'</a></td><td>'
//                                              +asistente.amaterno+'</td><td>'
//                                              +asistente.tipoDocumento+'</td><td>'
//                                              +asistente.numeroDocumento+'</td><td>'
//                                              +asistente.email+'</td><td>'
//                                              +asistente.telefono+'</td><tr>';
//              });
//               listado = listado+'</table>';    
//               $('#secListadoPersonas').html(listado);
//           }
//    
//}

//function consultar(){
//    var data = $("#frmPrincipal").serialize();
//    
//            $.ajax ({
//            url:'../controlador/RegistroAsistente.consultar.php' 
//            , type:'POST'
//            , dataType:'json'
//            ,data:data
//          
//            ,success:function (resultado){
//             if(resultado.exito === 0){
//                    alert(resultado.mensaje);
//                    return false;
//             }
//              crearListado(resultado.data.RegistroAsistente);
//            }, error:function(xhr,status,error){
//                alert("Error: "+error);
//            }
//        });
//}
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
