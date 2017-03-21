var asistentes = new Array();
var asistencia = new Array();

$(function (){
    $("#txtEvento").autocomplete({
        source: '../controlador/Evento.consultar.ajax.php',
        select: function(event, ui){
        $("#selEvento").val(ui.item.id);
        }
    });
    
    $("#btnConsultarAsistente").click(function(){
        if(validarVacios() === false){
            return false;
        }
        var data = $("#frmPrincipal").serialize();
        $.ajax({
           url:'../controlador/Evento.consultar.php',
           type:'POST',
           dataType:'json',
           data:data,
           success:function(resultado){
               if(resultado.exito === 0){
                   alert(resultado.mensaje);
                   return false;
               }
               crearListado(resultado.data.asistentes);
           },error:function(xhr, status, error){
               alert("error" + error);
           }
           
        });
    });
    
//    $("#btnGuardarAsistencia").click(function(){
//        
//    });
});

function validarVacios(){
    if(document.getElementById("txtEvento").value === ''){
        alert("Debe digitar el nombre del evento");
        document.getElementById("txtEvento").focus();
        return false;
    }
    return true;
}
function crearListado(asistentes){
    var listado = '<br><table id="listadoAsistentes" class="table table-striped">';
    listado += '<tr>';
    listado += '<th>NOMBRE</th><th>PRIMER APELLIDO</th><th>SEGUNDO APELLIDO</th><th>TIPO DE DOCUMENTO</th><th>NÚMERO DE DOCUMENTO</th><th>TELÉFONO</th><th>TOMAR ASISTENCIA</th>';
    listado += '</tr>';
    $.each(asistentes, function(indice){
        listado = listado +  '<tr><td>'+ asistentes[indice].nombre +
                             '</td><td>' + asistentes[indice].apaterno +
                             '</td><td>' + asistentes[indice].amaterno +
                             '</td><td>' + asistentes[indice].tipoDocumento +
                             '</td><td>' + asistentes[indice].numeroDocumento +
                             '</td><td>' + asistentes[indice].telefono +
                             '</td><td> <input type="checkbox" name="cbAsistencia" id="cbAsistencia' + indice +'"> </td></tr>';
                     
//        $("#cbAsistencia" + indice).on("click", function (){
//            asistencia.push(asistentes[indice]);
//        });     
    });
    listado = listado + '</table>';
    $("#divListadoAsistentes").html(listado);
}
