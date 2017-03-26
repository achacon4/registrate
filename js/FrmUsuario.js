$(function () {
    $("#txtDatosPersonales").autocomplete({
        source: '../controlador/Usuario.Cargar.php'
        , select: function(event, ui){
            $("#hidIdDatosPersonales").val(ui.item.id);
        }
    });
    
    $("#btnAdicionar").click(function () {
        if (validarVacios() === false) {
            return false;
        }
        
        if( $("#txtContrasenia").val() !==  $("#txtVerificarContrasenia").val()){
            alert("Las contraseñas no coinciden");
            return false;
        }
        
        var dataUrl = $("#frmUsuario").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);

        $.ajax({
            url: '../controlador/Usuario.Adicionar.php'
            , type: 'POST'
            , dataType: 'json'
            , data: data
            , success: function (resultado) {
                if (resultado.exito === 0) {
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
            }, error: function (error) {
                alert("Error: " + error);
            }
        });
    });
    
    $("#btnEliminar").click(function () {
        if (document.getElementById("hidIdUsuario").value === '') {
            alert("Por favor seleccione un usuario");
            return false;
        }
        var data = "hidIdUsuario=" + $("#hidIdUsuario").val();
        $.ajax({
            url: '../controlador/Usuario.Eliminar.php'
            , type: 'POST'
            , dataType: 'json'
            , data: data
            , success: function (resultado) {
                if (resultado.exito === 0) {
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
                consultar();
            }, error: function (error) {
                alert("Error: " + error);
            }
        });
    });
    
    $("#btnConsultar").click(function () {
        consultar();
    });
    
    $("#btnModificar").click(function () {
        if (document.getElementById("hidIdUsuario").value === '') {
            alert("Por favor seleccione un usuario");
            return false;
        }
        
        if($("#txtContrasenia").val().length > 0 || $("#txtVerificarContrasenia").val().length > 0){
            alert("Para podificar la contraseña debera presionar click en el boton modifcar contraseña");
            return false;
        }
        
        var dataUrl = $("#frmUsuario").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);

        $.ajax({
            url: '../controlador/Usuario.Modificar.php'
            , type: 'POST'
            , dataType: 'json'
            , data: data
            , success: function (resultado) {
                if (resultado.exito === 0) {
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
                consultar();
            }, error: function (error) {
                alert("Error: " + error);
            }
        });
    });
    
    $("#btnModificarContrasenia").click(function () {
        if (document.getElementById("hidIdUsuario").value === '') {
            alert("Por favor seleccione un usuario");
            return false;
        }
       
        if( $("#txtContrasenia").val() !==  $("#txtVerificarContrasenia").val()){
            alert("Las contraseñas no coinciden");
            return false;
        }
        
        var dataUrl = $("#frmUsuario").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);

        $.ajax({
            url: '../controlador/Usuario.ModificarContrasenia.php'
            , type: 'POST'
            , dataType: 'json'
            , data: data
            , success: function (resultado) {
                if (resultado.exito === 0) {
                    alert(resultado.mensaje);
                    return false;
                }
                alert(resultado.mensaje);
                limpiar();
                consultar();
            }, error: function (error) {
                alert("Error: " + error);
            }
        });
    });
    
    $("#btnLimpiar").click(function () {
        limpiar();
    });
});

function consultar() {
    var data = $("#frmUsuario").serialize();
    $.ajax({
        url: '../controlador/Usuario.Consultar.php'
        , type: 'POST'
        , dataType: 'json'
        , data: data
        , success: function (resultado) {
            if (resultado.exito === 0) {
                alert(resultado.mensaje);
                return false;
            }
            crearListado(resultado.data.usuarios);
        }, error: function (error) {
            alert("Error: " + error);
        }
    });
}

function crearListado(usuarios) {
    var numeroRegistros = usuarios.length;
    if (numeroRegistros === 1) {
        $("#hidIdDatosPersonales").val(usuarios[0].idDatosPersonalesFK);
         $("#hidIdUsuario").val(usuarios[0].idUsuario);
        $("#txtDatosPersonales").val(usuarios[0].nombre + ' ' + usuarios[0].apaterno + ' ' + usuarios[0].amaterno);
        $("#txtUsuario").val(usuarios[0].usuario);
        $("#selEstado").val(usuarios[0].estado);  
    } else {
        var listado = '<table>'
                      +      '<tr>'
                      +          '<th>Usuario</th>' 
                      +          '<th>Estado</th>'
                      +          '<th>Nombres</th>'
                      +          '<th>Apellido</th>'
                      +      '</tr>';
        $.each(usuarios, function (indice, usuario) {
            listado = listado + '<tr><td><a href="#" onclick="seleccionarRegistros(' + usuario.idUsuario + ')">' + usuario.usuario + '</a></td>'
                    + '<td>' + usuario.estado + '</td>'
                    + '<td>' + usuario.nombre + '</td>'
                    + '<td>' + usuario.apaterno + " " + usuario.amaterno + '</td>'
                    + '</tr>';
        });
        listado = listado + '</table>';
        $("#secListado").html(listado);
    }
}

function seleccionarRegistros(idUsuario) {
    limpiar();
    $("#hidIdUsuario").val(idUsuario);
    $("#btnConsultar").trigger("click");
}

function limpiar(){
    $('#hidIdUsuario').val('');
    $('#hidIdDatosPersonales').val('');
    $('#txtUsuario').val('');
    $('#txtContrasenia').val('');
    $('#txtVerificarContrasenia').val('');
    $('#selEstado').val('');
    $('#txtDatosPersonales').val('');
}

function validarVacios(){
    if (document.getElementById("hidIdDatosPersonales").value === '') {
        alert("Por favor selecione su nombre");
        document.getElementById("hidIdDatosPersonales").focus();
        return false;
    }
    if (document.getElementById("txtDatosPersonales").value === '') {
        alert("Por favor selecione su nombre");
        document.getElementById("txtDatosPersonales").focus();
        return false;
    }
    if (document.getElementById("txtUsuario").value === '') {
        alert("Debe digitar un usuario");
        document.getElementById("txtUsuario").focus();
        return false;
    }
    if (document.getElementById("txtContrasenia").value === '') {
        alert("Debe ingresar una contraseña");
        document.getElementById("txtContrasenia").focus();
        return false;
    }
    if (document.getElementById("selEstado").value === '') {
        alert("Debe seleccionar un estado");
        document.getElementById("selEstado").focus();
        return false;
    }
}