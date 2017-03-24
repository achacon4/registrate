var asistentes = new Array();
//
//var asistencia = new Array();

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
           url:'../controlador/AsistenteEvento.consultarAsistentes.php',
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
    
    $("#btnGuardarAsistencia").click(function(){
        var data = $("#frmPrincipal").serialize();
        $.ajax({
           url:'../controlador/AsistenteEvento.actualizarEstadoAsistentes.php',
           type:'POST',
           dataType:'json',
           data:data,
           success:function(resultado){
               if(resultado.exito === 0){
                   alert(resultado.mensaje);
                   return false;
               }
               alert(resultado.mensaje);
               crearListado(resultado.data.asistentes);
               limpiar();
           },error:function(xhr, status, error){
               alert("error" + error);
           }
           
        });
    });
});

function validarVacios(){
    if(document.getElementById("txtEvento").value === ''){
        alert("Debe digitar el nombre del evento");
        document.getElementById("txtEvento").focus();
        return false;
    }
    return true;
}

function limpiar(){
    $("#txtEvento").val('');
    $("#listadoAsistentes").remove();
}

function crearListado(_asistentes){
    var contador = 0;
    asistentes = _asistentes;
    var listado = '<br><table id="listadoAsistentes" class="table table-striped">';
    listado += '<tr>';
    listado += '<th>NOMBRE</th><th>PRIMER APELLIDO</th><th>SEGUNDO APELLIDO</th><th>TIPO DE DOCUMENTO</th><th>NÚMERO DE DOCUMENTO</th><th>TELÉFONO</th><th>TOMAR ASISTENCIA</th>';
    listado += '</tr>';
    $.each(asistentes, function(indice){
        var confirmado = '';
        contador++;
        if(asistentes[indice].estado == 'CONFIRMADO'){
            confirmado = 'checked'
        }
        listado = listado +  '<tr><td>'+ asistentes[indice].nombre +
                             '</td><td>' + asistentes[indice].apaterno +
                             '</td><td>' + asistentes[indice].amaterno +
                             '</td><td>' + asistentes[indice].tipoDocumento +
                             '</td><td>' + asistentes[indice].numeroDocumento +
                             '</td><td>' + asistentes[indice].telefono +
                             '</td><td> <input type="checkbox" name="cbAsistencia' + indice +'" id="cbAsistencia' + indice +'" ' + confirmado + ' value="' + asistentes[indice].idAsistenteEvento + '">' +
                             '<input type="hidden" name="hidAsistencia' + indice +'" id="hidAsistencia' + indice +'" value="' + asistentes[indice].idAsistenteEvento + '"></td></tr>';
                     
//        $("#cbAsistencia" + indice).on("click", function (){
//            asistencia.push(asistentes[indice]);
//        });     
    });
    listado = listado + '</table><input type="hidden" value="' + contador + '" name="hidCantidad" id="hidCantidad">';
    $("#divListadoAsistentes").html(listado);
}
