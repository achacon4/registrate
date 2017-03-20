$(function (){
    $("#btnAdicionar").click(function(){
            
            if(validarVacios() === false){
                   return false;
               }
               
           var data = $("#frmDatosPersonales").serialize();
          
           
        $.ajax ({
            url:'../controlador/DatosPersonales.adicionar.php' 
            , type:'POST'
            , dataType:'json'
            ,data:data
          
            ,success:function (resultado){
             alert(resultado.mensaje);
            }, error:function(xhr,status,error){
                alert("Error: "+error);
            }
        });
    });
        
    
    
});


function validarVacios(){
        if(document.getElementById("txtNombre").value ===''){
            alert("Debe digitar el nombre");
            document.getElementById("txtNombre").focus();
            return false;  
        };
        
        if(document.getElementById("txtApaterno").value ===''){
            alert("Debe digitar el primer apellido");
            document.getElementById("txtApaterno").focus();
            return false;  
        };
        if(document.getElementById("txtAmaterno").value ===''){
            alert("Debe digitar el segundo apellido");
            document.getElementById("txtAmaterno").focus();
            return false;  
        };
       var indiceFormulario = document.getElementById("selTipoDocumento").selectedIndex;
        if(indiceFormulario === null || indiceFormulario === 0){
           alert("Debe seleccionar el tipo de docuemnto"); 
           document.getElementById("selTipoDocumento").focus();
           return false;
        };
        if(document.getElementById("txtNumeroDocumento").value ===''){
            alert("Debe digitar el número de identificación");
            document.getElementById("txtNumeroDocumento").focus();
            return false;  
        };
        if(document.getElementById("txtEmail").value ===''){
            alert("Debe digitar el email");
            document.getElementById("txtEmail").focus();
            return false;  
        };
        if(document.getElementById("txtTelefono").value ===''){
            alert("Debe digitar el telefono");
            document.getElementById("txtTelefono").focus();
            return false;  
        };    
        return true;
    };

