$(function(){
    $('#btnAdicionar').click(function (){
        if(validarVacios() === false){
            return false;
        }
        
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"').replace(/\s/g, '') + '"}';
        var data = JSON.parse(dataJsonString);

        $.ajax({
            url: '../controlador/categoria.adicionar.php',
            type: 'POST',
            dataType: 'json',
            data: data
            , success:function (resultado){
                if (resultado.exito === 0)
                {
                    alert(resultado.mensaje);
                    return false;
                }

                alert(resultado.mensaje);
            }, error:function(xhr, status, error){
                alert("Error: " + error);
            }
        });
    });
    
    $("#btnModificar").click(function (){
        if(validarVacios() === false)
        {
            return false;
        }
        
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        
        $.ajax({
            url:'../controlador/categoria.modificar.php'
            , type:'POST'
            , dataType:'json'
            , data:data
            , success:function (resultado){
                if(resultado.exito === 0)
                {
                    alert(resultado.mensaje);
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
    
    $('#btnLimpiar').click(function(){
        limpiar();
    });
});

function limpiar()
{
    $("#hidIdCategoria").val(''); 
    $("#txtNombreCategoria").val('');
}

function crearListado(categorias){
    var numeroRegistros = categorias.length;
    
    if(numeroRegistros === 1)
    {
        $("#hidIdCategoria").val(categorias[0].idCategoria);
        $("#txtNombreCategoria").val(categorias[0].nombreCategoria);
    }
    else
    {
        var listado = '<table id="tbListado" class="table table-striped" border="1">';
        $.each(categorias, function(indice, categoria){
            //alert(cliente.cliente);
            listado = listado + '<tr><td><a href="#" onclick="seleccionarRegistro(' + categoria.idCategoria + ')">' + categoria.nombreCategoria +  '</a></td></tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
}

function seleccionarRegistro(idCategoria){
    limpiar();
    $("#hidIdCategoria").val(idCategoria);
    $("#btnConsultar").trigger( "click" );
}

function consultar()
{
    var data = $("#frmPrincipal").serialize(); 
    
    $.ajax({
        url:'../controlador/categoria.consultar.php'
        , type:'POST'
        , dataType:'json'
        , data:data
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }

            crearListado(resultado.data.categorias);

        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
}

function validarVacios()
{
    if(document.getElementById("txtNombreCategoria").value === '')
    {
       alert("Debe Digitar un Nombre de Categoria");
        document.getElementById("txtNombreCategoria").focus();
        return false;
    };
    
    return true;
}

//function selecionarRegistro(id){
//    $('#idCategoria').val(id);
//    
//    var accion = "CONSULTARID";
//    var datos = {"accion":accion,"id":id};
//    
//    $.ajax({
//        url:'../controlador/LogCategoria.php', 
//        type:'POST', 
//        dataType:'json', 
//        data:datos 
//    }).done(function(data){
//       // alert(data[0]["idCategoria"]);
//        $("#idCategoria").val(data[0]["idCategoria"]);
//        $("#txtNombreCategoria").val(data[0]["nombreCategoria"]);
//    });                
//}

//    $('#btnEliminar').click(function () {
//        var datos = {"accion": accion, "nombreCategoria": nombre};
//        var accion = "ADICIONAR";
//        var nombre = $("#txtNombreCategoria").val();
//
//        var datos = {"accion": accion, "nombre": nombre};
//        $.ajax({
//            url: '../controlador/categoria.adicionar.php',
//            type: 'POST',
//            dataType: 'json',
//            data: datos
//        }).done(function (data) {
//            $('#resultado').empty();
//            $('#resultado').text(data["resultado"]);
//        });
//    });

//	 $('#btnEliminar').click(function(){
//	 		if(confirm("Desea continuar?")===false){
//	            		return  false;
//	        }
//		    var accion = "ELIMINAR"; 
//		    var categoria = $("#idCategoria").val(); 
//		    var datos = {"accion":accion,"categoria":categoria}; 
//		    $.ajax({
//		        url:'../controlador/categoria.eliminar.php', 
//		        type:'POST', 
//		        dataType:'json', 
//		        data:datos 
//		    }).done(function(data){
//		    	$('#resultado').empty();
//		        $('#resultado').text(data["resultado"]);
//		    });		   
//		});
      
//	 $('#btnModificar').click(function (){
//		    var accion = "MODIFICAR"; 
//		    var categoria = $("#idCategoria").val(); 
//                    var categoriaNombre = $("#txtNombreCategoria").val(); 
//		    var datos = {"accion":accion,"categoria":categoria,"nombre":categoriaNombre}; 
//		    $.ajax({
//		        url:'../controlador/categoria.modificar.php', 
//		        type:'POST', 
//		        dataType:'json', 
//		        data:datos 
//		    }).done(function(data){
//		    	$('#resultado').empty();
//		        $('#resultado').text(data["resultado"]);
//		    });		   
//		});

//$('#btnConsultar').click(function (){
//    var accion = "CONSULTAR"; 	
//    var datos = {"accion":accion};
//
//    $.ajax({
//        url:'../controlador/categoria.consultar.php', 
//        type:'POST', 
//        dataType:'json', 
//        data:datos 
//        }).done(function(data){
//            //Respuesta.
//            var tbl = "";
//            tbl += "<table>";
//            tbl += "<tr>";
//            tbl += "<th>Nombre de categoria</th>";
//            tbl += "</tr>";
//            tbl += "<tr>";
//
//            $.each(data['data']['categorias'], function (indice, nombre){
//                var onclick = 'selecionarRegistro('+nombre.idCategoria+')';
//                tbl += '<td><a href="#"onclick="'+onclick+'">'+nombre.nombreCategoria+'</a></td>';
//                tbl += "</tr>";                                                                        
//            });	
//            tbl += "</table>";                                                                                             
//        $("#resultado").html(tbl);
//    });}
