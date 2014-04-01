<?php 
	
	require_once '../dao/usuarioDAO.php';

	try {
		$dao = new usuarioDAO(); 
	
		if ($controller === 1) { //verifique login
			$login = $dao->loginUsuario($user);
		}

	} catch (Exception $e) {
		throw $e;
		
	}

 ?>