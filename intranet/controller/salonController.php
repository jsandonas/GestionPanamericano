<?php 
	
	require_once '../dao/salonDAO.php';

	try {
		$dao = new salonDAO(); 
	
		if ($controller === 1) { //datos de usuario
			$datos = $dao->datosSalon($idSalon);
		}

	} catch (Exception $e) {
		throw $e;
		
	}

 ?>