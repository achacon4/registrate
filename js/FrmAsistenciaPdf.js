$(function(){
function crearListado(_asistentes){
    var contador = 0;
    asistentes = _asistentes;
    var listado = '<br><table id="listadoAsistentes" class="table table-striped">';
    listado += '<tr>';
    listado += '<th>NOMBRE</th><th>PRIMER APELLIDO</th><th>SEGUNDO APELLIDO</th><th>TIPO DE DOCUMENTO</th><th>NÚMERO DE DOCUMENTO</th><th>TOMAR ASISTENCIA</th>';
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
                             '</td><td>' + asistentes[indice].estado + '</td></tr>'    
                     
    });
    listado = listado + '</table>';
    }
    $("#btnReporte").click(function(){
        if(validarVacios() === false){
            return false;
        }
        window.open('../controlador/AsistenciaEventoPdf.php?idEvento='+$("#selEvento").val());
        
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