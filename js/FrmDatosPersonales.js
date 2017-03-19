$(function(){
    $("#btnAdicionar").click(function (){
        if(validarVacios() === false){
            return false;
        }
        var dataUrl = $("#frmPrincipal").serialize();
        var dataJsonString = '{"' + decodeURI(dataUrl).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"').replace(/\s/g,'') + '"}';
        var data = JSON.parse(dataJsonString);
        data.telefonos = telefonos;
        
        $.ajax({
            url:'../controlador/DatosPersonales.adicionar.php'
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
    
    
});