$(function(){

	$('#send_request').click(function(){
			var user,pass,json;
		    user = $('#user').val();
			pass = $('#pass').val();
			json = {"usuario":user,"password":pass};	
			$.ajax({
                    url:'../controlador/Login.acceso.php',
                    type:'POST',
                    dataType:'json',
                    data:json
            }).done(function(data) {
	             location.href=data;
            });
	  });
});