$(document).ready(function(){
	            $('#btnAdicionar').click(function () {
                 var accion = "accion";
                 var nombre = $("#txtNombreCategoria").val();
                 var datos = {"accion":accion,"nombre":nombre};
                     $.ajax({
                          url:'../controlador/LogCategoria.php',
                          type:'POST',
                          dataType:'json',
                          data:datos
                     }).done(function(data) {
                     	//Respuesta.
                         $('#resultado').html('Ajax dice: ' + JSON.stringify(data));
            });
        });
});