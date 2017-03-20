$(document).ready(function(){
	            $('#btnAdicionar').click(function () {
                 var accion = "ADICIONAR";
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

	 $('#btnLimpiar').click(function(){
		    var accion = "ELIMINAR"; 
		    var categoria = $("#idCategoria").val(); 
		    var datos = {"accion":accion,"categoria":categoria}; 
		    $.ajax({
		        url:'../controlador/LogCategoria.php', 
		        type:'POST', 
		        dataType:'json', 
		        data:datos 
		    }).done(function(data){
		        //Respuesta.
		    });		   
		});

	 $('#btnConsultar').click(function (){
		    var accion = "CONSULTAR"; 
		    var categoria = $("#idCategoria").val(); 
		    var datos = {"accion":accion,"categoria":categoria}; 
		    $.ajax({
		        url:'../controlador/LogCategoria.php', 
		        type:'POST', 
		        dataType:'json', 
		        data:datos 
		    }).done(function(data){
		        //Respuesta.
		    });		    
		});

	 $('#btnModificar').click(function (){
		    var accion = "MODIFICAR"; 
		    var categoria = $("#idCategoria").val(); 
		    var datos = {"accion":accion,"categoria":categoria}; 
		    $.ajax({
		        url:'../controlador/LogCategoria.php', 
		        type:'POST', 
		        dataType:'json', 
		        data:datos 
		    }).done(function(data){
		        //Respuesta
		    });		   
		});
});