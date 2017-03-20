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
                         $('#resultado').html('Ajax dice: ' + data);
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
		        $('#resultado').text(data["respuesta"]);
		    });		   
		});

	
                $('#btnConsultar').click(function (){
		    var accion = "CONSULTAR"; 	
		    var datos = {"accion":accion}; 
		    $.ajax({
		        url:'../controlador/LogCategoria.php', 
		        type:'POST', 
		        dataType:'json', 
		        data:datos 
		    }).done(function(data){
		        //Respuesta.                       
                        var tbl = "";
                        tbl += "<table>";
                        tbl += "<tr>";
                        tbl += "<th>Nombre de categoria</th>";
                        tbl += "</tr>";
                        tbl += "<tr>";
                       $.each(data, function (indice, nombre){
                            var onclick = 'selecionarRegistro('+nombre.idCategoria+')';
                            tbl += '<td><a href="#"onclick="'+onclick+'">'+nombre.nombreCategoria+'</a></td>';                                                                           
		    });	
                        tbl += "</tr>";
                        tbl += "</table>";                                                                                             
                        $("#resultado").html(tbl);
		});
             });

	 $('#btnModificar').click(function (){
		    var accion = "MODIFICAR"; 
		    var categoria = $("#idCategoria").val(); 
                    var categoriaNombre = $("#txtNombreCategoria").val(); 
		    var datos = {"accion":accion,"categoria":categoria,"nombre":categoriaNombre}; 
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

function selecionarRegistro(id){
                    $('#idCategoria').val(id);                  
                    var accion = "CONSULTARID";
		    var datos = {"accion":accion,"id":id}; 
		    $.ajax({
		        url:'../controlador/LogCategoria.php', 
		        type:'POST', 
		        dataType:'json', 
		        data:datos 
		    }).done(function(data){
                       // alert(data[0]["idCategoria"]);
		        $("#idCategoria").val(data[0]["idCategoria"]);
                        $("#txtNombreCategoria").val(data[0]["nombreCategoria"]);
		    });		    
                    
}