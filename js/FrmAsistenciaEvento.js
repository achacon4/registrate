$(function (){
    $("#txtEvento").autocomplete({
        source: '../controlador/Evento.consultar.ajax.php',
        select: function(event, ui){
        $("#selEvento").val(ui.item.id);
        }
    });
    $("#btnConsultarAsistente").click(function(){
        if(validarVacios() === false){
            return false;
        }
    });
});

function validarVacios(){
    if(document.getElementById("txtEvento").value === ''){
        alert("Debe digitar el nombre del evento");
        document.getElementById("txtEvento").focus();
        return false;
    }
    return true;
}