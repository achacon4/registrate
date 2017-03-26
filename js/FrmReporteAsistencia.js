  var total1;
  var total2;
  var total3;
   var suma;
$(function (){
    
     $("#txtEvento").autocomplete({
                  source: '../controlador/Evento.consultar.ajax.php'
                  ,select:function (event, ui){
                      $("#selEvento").val(ui.item.id);
                  }
              });
     $("#btnConsultarAsistente").click(function(){
            
               
           var data = $("#frmReporteAsistencia").serialize();

       $.ajax ({
            url:'../controlador/ReporteAsistenciaConfirmada.php' 
            , type:'POST'
            , dataType:'json'
            , data:data
            ,success:function (resultado){
               if(resultado.exito === 0){
                   alert(resultado.mensaje);
                   return false;
               }   
              crearListadoAsistenciaConfirmada(resultado.data.datos);
          

            }, error:function(xhr,status,error){
                alert("eror"+error);
            }
        });
        //-------------------------------------
        $.ajax({
        url:'../controlador/ReporteAsistenciaNoConfirmada.php',
        type:'POST',
        dataType:'json',
        data:data,
        success:function(resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }
            
            crearListadoAsistenciaNoConfirmada(resultado.data.datos);
            
        }, error:function (xhr, status, error){
                alert("Error: "+error);
            }
    });
    //---------------------------------------------------------
     $.ajax({
        url:'../controlador/ReporteAsistenciaCancelada.php',
        type:'POST',
        dataType:'json',
        data:data,
        success:function(resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }
            
            crearListadoAsistenciaCancelada(resultado.data.datos);
            
        }, error:function (xhr, status, error){
                alert("Error: "+error);
            }
       });
    });  

});

function crearListadoAsistenciaConfirmada(ReporteAsistencia){
    var numeroRegistro = ReporteAsistencia.length;
   total1=numeroRegistro;
    var listado = '<table class="table table-bordered">'+
             '<tr class="active"><td>TIPO DOCUMENTO</td>\n\
              <td>NÚMERO DOCUMENTO</td>\n\
              <td>NOMBRE</td>\n\
              <td>PRIMER APELLIDO</td>\n\
              <td>SEGUNDO APELLIDO</td> \n\
              <td>EMAIL</td> \n\
              <td>TELÉFONO</td> \n\
              <td>ESTADO</td></tr> \n\
             ';
    $.each(ReporteAsistencia, function (indice, datos){
            listado = listado+'<tr><td>'+datos.tipoDocumento+'</a></td><td>'
            +datos.numeroDocumento+'</td><td>'
            +datos.nombre+'</td><td>'
            +datos.apaterno+'</td><td>'
            +datos.amaterno+'</td><td>'
            +datos.email+'</td><td>'
            +datos.telefono+'</td><td>'
            +datos.estado+'</td></tr>';
        });
    listado = listado+'</table><p>Nº ASISTENTES: '+numeroRegistro+'</p>';    
    $('#secListado').html(listado);
    
}

function crearListadoAsistenciaNoConfirmada(ReporteAsistencia){
    var numeroRegistro = ReporteAsistencia.length;
    total2=numeroRegistro;
    var listados = '<table class="table table-bordered">'+
             '<tr class="active"><td>TIPO DOCUMENTO</td>\n\
              <td>NÚMERO DOCUMENTO</td>\n\
              <td>NOMBRE</td>\n\
              <td>PRIMER APELLIDO</td>\n\
              <td>SEGUNDO APELLIDO</td> \n\
              <td>EMAIL</td> \n\
              <td>TELÉFONO</td> \n\
              <td>ESTADO</td></tr> \n\
             ';
    $.each(ReporteAsistencia, function (indice, datos){
            listados = listados+'<tr><td>'+datos.tipoDocumento+'</a></td><td>'
            +datos.numeroDocumento+'</td><td>'
            +datos.nombre+'</td><td>'
            +datos.apaterno+'</td><td>'
            +datos.amaterno+'</td><td>'
            +datos.email+'</td><td>'
            +datos.telefono+'</td><td>'
            +datos.estado+'</td></tr>';
        });
    listados = listados+'</table><p>Nº ASISTENTES: '+numeroRegistro+'</p>';    
    $('#secListado1').html(listados);
    
}

function crearListadoAsistenciaCancelada(ReporteAsistencia){
    var numeroRegistro = ReporteAsistencia.length;
     total3=numeroRegistro;
    
    var listado = '<table class="table table-bordered">'+
              '<tr class="active"><td>TIPO DOCUMENTO</td>\n\
              <td>NÚMERO DOCUMENTO</td>\n\
              <td>NOMBRE</td>\n\
              <td>PRIMER APELLIDO</td>\n\
              <td>SEGUNDO APELLIDO</td> \n\
              <td>EMAIL</td> \n\
              <td>TELÉFONO</td> \n\
              <td>ESTADO</td></tr> \n\
               ';
    $.each(ReporteAsistencia, function (indice, datos){
            listado = listado+'<tr><td>'+datos.tipoDocumento+'</a></td><td>'
            +datos.numeroDocumento+'</td><td>'
            +datos.nombre+'</td><td>'
            +datos.apaterno+'</td><td>'
            +datos.amaterno+'</td><td>'
            +datos.email+'</td><td>'
            +datos.telefono+'</td><td>'
            +datos.estado+'</td></tr>';
        });
         suma = total1+total2+total3;
    listado = listado+'</table><p>Nº ASISTENTES: '+numeroRegistro+'</p><br><p>TOTAL DE ASISTENTES: '+suma+'</p>'; 
  
    $('#secListado2').html(listado);
    
}
