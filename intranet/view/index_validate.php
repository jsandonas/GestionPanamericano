<?php 
	$user =$_REQUEST['user'];
	$pass=$_REQUEST['p'];

	$controller = 1;

	require_once '../controller/usuarioController.php';

	if (count($login)>0) {
		if ($pass == $login[0]['pass'] ) {
			echo "Login correcto";
		}else{
			echo "clave incorrecta";
		}
	}else{
		echo "usuario incorrecto";
	}


 ?>