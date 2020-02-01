$(document).ready(function(){

	$("#loginForm").bind("submit",function(){

		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),

			beforeSend:function(){

				$("#loginForm button[type=submit]").html("enviando...");
				$("#loginForm button[type=submit]").attr("disabled","disabled");


			},
			success: function(response){

				
				
				if(response.status == "true"){
				
					

				$("body").overhang({
					type: "success",
	  					message: "Usuario Encontrado, te estamos redirigiendo...",
	  					callback: function(){
	  						window.location.href = "view/logged_in.php";
	  					}
	  				});
				 
				}else {
					$("body").overhang({
						type: "error",
						 message: "Usuario o Password incorrecto! | Usuario deshabilitado!",
						 callback: function(){
	  						window.location.href = "index.php";
	  					}
						 //closeConfirm: true
					});
				  }//else

				$("#loginForm button[type=submit]").html("Ingresar");
				$("#loginForm button[type=submit]").removeAttr("disabled");



			},
			error: function(){
				$("body").overhang({
					  type: "error",
					  message: "Usuario o Password incorrecto!"
					});

				$("#loginForm button[type=submit]").html("Ingresar");
				$("#loginForm button[type=submit]").removeAttr("disabled");
				
			}
		});
		return false;
	});
});