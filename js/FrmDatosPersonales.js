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
            alert("Debe digitar el nom");
            document.getElementById("txtNombre").focus();
            return false;  
        };
         
        return true;
    };

