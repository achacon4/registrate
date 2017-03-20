$(function(){
    $("#btnConsultar").click(function (){  
        consultar();
    });
    
    $("#btnLimpiar").click(function (){  
         limpiar();
    });
});

function limpiar(){
    $("#hidIdEvento").val('');
    $("#hidIdLugarFK").val('');
    $("#hidIdDatosPersonalesFK").val('');
    $("#hidIdCategoriaFK").val('');
    $("#txtNombreEvento").val('');
    $("#txtFechaInicial").val('');
    $("#txtFechaFinal").val('');
    $("#txtHoraInicial").val('');
    $("#txtHoraFinal").val('');
    $("#txtCantidadAsistentes").val('');
    $("#txtDescripcionEvento").val('');
    $("#selEstadoEvento").html('');
}

function crearListado(eventos){

    var numeroRegistros = eventos.length;
    if(numeroRegistros === 1)
    {
        $("#hidIdEvento").val(eventos[0].idEvento);
        $("#hidIdLugarFK").val(eventos[0].idLugarFK);
        $("#hidIdDatosPersonalesFK").val(eventos[0].idDatosPersonalesFK);
        $("#hidIdCategoriaFK").val(eventos[0].idCategoriaFK);
        $("#txtNombreEvento").val(eventos[0].nombreEvento);
        $("#txtFechaInicial").val(eventos[0].fechaInicial);
        $("#txtFechaFinal").val(eventos[0].fechaFinal);
        $("#txtHoraInicial").val(eventos[0].horaInicial);
        $("#txtHoraFinal").val(eventos[0].horaFinal);
        $("#txtCantidadAsistentes").val(eventos[0].cantidadAsistentes);
        $("#txtDescripcionEvento").val(eventos[0].descripcionEvento);
        $("#selEstadoEvento").val(eventos[0].estadoEvento);

    }
    else
    {
        var listado = '<table id="tblListado" class="table">';
        $.each(clientes, function(indice, cliente){
            //alert(cliente.cliente);
            listado = listado + '<tr><td>' + clientes[indice].numeroIdentificacion +  '</td><td><a href="#" onclick="seleccionarRegistro(' + cliente.idCliente + ')">' + cliente.cliente +  '</a></td></tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
}

function seleccionarRegistro(idEvento){
     limpiar();
    $("#hidIdEvento").val(idEvento);
    $( "#btnConsultar" ).trigger( "click" );
}

function consultar(){
    var data = $("#frmPrincipalEvento").serialize(); 
    $.ajax({
        url:'../Controlador/Evento.Consultar.php'
        , type:'POST'
        , dataType:'json'
        , data:data
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }

            crearListado(resultado.data.eventos);

        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
}