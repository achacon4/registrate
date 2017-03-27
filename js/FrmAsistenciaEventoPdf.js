$(function(){
    $("#btnReporte").click(function(){
        window.open('../controlador/AsistenciaEventoPdf.php?idEvento='+$("#selEvento").val());
    });
});



