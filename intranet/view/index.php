<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>..::Login::..</title>
	<link rel="stylesheet" href="../css/main.css">
	<script type="text/javascript" src='../js/jQuery.js'></script>
</head>
<body>
	<form role="form" id="loginForm" name="loginForm" method="post">
		<h1>Login</h1>
		
		<h2 id="lbluser">Usuario</h2>
			<input type="text" id='user' name="user"/>
		
		<h2 id="lblpass">Contraseña</h2>
			<input type="password" id='p' name="p"/>

		<a href="#">¿Olvido su contraseña?</a> </br></br>

		<input id="enviar" value = "Ingresar" type ="submit">
	</form>


	<div id="respuesta"></div>

	<script type="text/javascript">




		$(function(){

			$("#loginForm").submit(function(e){
				e.preventDefault();
				var datos  = $('#loginForm').serialize();
				console.log(datos);
				var curl  = "../view/index_validate.php";
				$.ajax({
					url:curl,
					data:datos,
					method : "post",
					cache:false,
					success: function(data){
						alert(data);
						if (data == "usuario") {
							$("#respuesta").html("No existe el Usuario");
						}else if (data == "clave") {
							$("#respuesta").html("La Clave es Incorrecta");
						}else{
							$(location).attr('href','../view/home.php'); 
						};


						return false;
					}	
				});

				return false;
			});
		});



	</script>


</body>
</html>