var telefonos = new Array();
var telefonosEliminados = new Array();

$(function(){ 
    
    
    
    $.ajax({
        url:'../controlador/cliente.cargar.php'
        , type:'POST'
        , dataType:'json'
        , data:null
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }
            var municipioResidencia = $("#selMunicipioResidencia");
            //var municipioNegocio = $("#selMunicipioNegocio");
            municipioResidencia.empty();
            //municipioNegocio.empty();
            
            municipioResidencia.append("<option value=''>--Seleccione--</option>");
            //municipioNegocio.append("<option value=''>--Seleccione--</option>");
            
            $.each(resultado.data.municipios, function(indice, municipio){
                municipioResidencia.append("<option value=" + municipio.idMunicipio + ">" + municipio.municipio + "</option>");
                //municipioNegocio.append("<option value=" + municipio.idMunicipio + ">" + municipio.municipio + "</option>");
            });
            
            $("#txtMunicipioNegocio").autocomplete({
                source: '../controlador/municipio.consultar.ajax.php'
                , select: function(event, ui){
                    $("#selMunicipioNegocio").val(ui.item.id);
                }
            });
            
        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
    
    $("#btnAdicionar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        data.telefonos = telefonos;
        
        $.ajax({
            url:'../controlador/cliente.adicionar.php'
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
    
    $("#btnModificar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        data.telefonos = telefonos;
        data.telefonosEliminados = telefonosEliminados;
        
        $.ajax({
            url:'../controlador/cliente.modificar.php'
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
    
    $("#btnConsultar").click(function (){  
        consultar();
    });
    $("#btnLimpiar").click(function (){  
         limpiar();
    });
    
    $("#btnAdicionarTelefono").click(function (){
        var telefono = new Object();
        telefono.tipo = $("#selTipoTelefono").val();
        telefono.numero = $("#txtNumeroTelefono").val();
        telefonos.push(telefono);
        crearListadoTelefono();
        $("#selTipoTelefono").val("");
        $("#txtNumeroTelefono").val("");
    });
});

function crearListadoTelefono(){
    $("#listadoTelefonos").remove();
    var tabla = '<table border="1" id="listadoTelefonos" width="30%">';
    tabla += '<tr>';
    tabla += '<td>Tipo</td><td>Número</td><td>-</td>';
    tabla += '</tr>';
    tabla += '</table>';
    $("#divListadoTelefonos").append(tabla);
    $.each(telefonos, function (indice, telefono){
        var tr = '<tr>';
        tr += '<td>' + telefono.tipo + '</td><td>' + telefono.numero + '</td>';
        tr += '<td><input type="button" name="btnEliminarTelefono" id="btnEliminarTelefono' + indice + '" value="-"></td>';
        tr += '</tr>';

        $("#listadoTelefonos").append(tr);

        $("#btnEliminarTelefono" + indice).on("click", function (){
            if(telefonos[indice].id != undefined ){
                telefonosEliminados.push(telefonos[indice]);
            }            
            telefonos.splice(indice, 1);
            crearListadoTelefono();
        });

    });
}

function limpiar(){
    $("#hidIdCliente").val('');
    $("#txtNumeroIdentificacion").val('');
    $("#txtCliente").val('');
    $("#selMunicipioResidencia").val('');
    $("#txtFechaNacimiento").val('');
    $("#selEstado").val('');
    $("#selMunicipioNegocio").val('');
    $("#txtMunicipioNegocio").val('');
    $("#secListado").html('');
    $("#listadoTelefonos").remove();
}
function crearListado(clientes, _telefonos){

    var numeroRegistros = clientes.length;
    if(numeroRegistros === 1){
        $("#hidIdCliente").val(clientes[0].idCliente);
        $("#txtNumeroIdentificacion").val(clientes[0].numeroIdentificacion);
        $("#txtCliente").val(clientes[0].cliente);
        $("#selMunicipioResidencia").val(clientes[0].idMunicipioResidencia);
        $("#txtFechaNacimiento").val(clientes[0].fechaNacimiento);
        $("#selEstado").val(clientes[0].estado);
        $("#selMunicipioNegocio").val(clientes[0].idMunicipioNegocio);
        $("#txtMunicipioNegocio").val(clientes[0].departamentoNegocio + '-' + clientes[0].municipioNegocio);
        
        
        telefonos = _telefonos;
        crearListadoTelefono();
    }else{
        var listado = '<table id="tblListado" class="table">';
        $.each(clientes, function(indice, cliente){
            //alert(cliente.cliente);
            listado = listado + '<tr><td>' + clientes[indice].numeroIdentificacion +  '</td><td><a href="#" onclick="seleccionarRegistro(' + cliente.idCliente + ')">' + cliente.cliente +  '</a></td></tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
}
function seleccionarRegistro(idCliente){
     limpiar();
    $("#hidIdCliente").val(idCliente);
    $( "#btnConsultar" ).trigger( "click" );
}
function consultar(){
    var data = $("#frmPrincipal").serialize(); 
    $.ajax({
        url:'../controlador/cliente.consultar.php'
        , type:'POST'
        , dataType:'json'
        , data:data
        , success:function (resultado){
            if(resultado.exito === 0){
                alert(resultado.mensaje);
                return false;
            }

            crearListado(resultado.data.clientes, resultado.data.telefonos);

        }, error:function(xhr, status, error){
            alert("Error: "+error);
        }
    });
}
//
//
////window.onload = function (){//funciones anónimas
//    document.getElementById("btnAdicionar").onclick = function (){
//        if(validarVacios() === false){
//            return false;
//        }
//        document.getElementById("hidAccion").value = "ADICIONAR";
//        document.frmPrincipal.submit();
//    };
//    document.getElementById("btnConsultar").onclick = function (){
//        
//        document.getElementById("hidAccion").value = "CONSULTAR";
//        document.frmPrincipal.submit();
//    };
//};

//function selecccionarRegistro(id){
//    document.getElementById("hidIdCliente").value = id;
//    document.getElementById("hidAccion").value = 'CONSULTAR';
//    document.frmPrincipal.submit();
//}


function validarVacios(){
    if(document.getElementById("txtNumeroIdentificacion").value === ''){
        alert("Debe digitar el número de identificación");
        document.getElementById("txtNumeroIdentificacion").focus();
        return false;
    }
    if(document.getElementById("txtCliente").value === ''){
        alert("Debe digitar el nombre del cliente");
        document.getElementById("txtCliente").focus();
        return false;
    }
    return true;
}