<?php 
	require_once '../db/accesoDB.php';

	/**
	* 
	*/
	class SalonDAO
	{
		
		public function crearSalon($iSalon)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'insert into persona (idSalon, nivel, grado, seccion) 
						values ("'.$iSalon['idSalon'].'","'.$iSalon['nivel'].'","'.$iSalon['grado'].'",
								"'.$iSalon['seccion'].'" )';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();	
			} catch (Exception $e) {
					throw $e;
						
			}			

		}
		
		public function actualizarSalon($iData)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'update salon set 	nivel   = "'.$iData['nivel'].  '", 
											seccion = "'.$iData['seccion'].'"  
						where idSalon = 			  "'.$iData['idSalon'].  '" ';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();	
			} catch (Exception $e) {
					throw $e;
						
			}
		}


		public function borrarSalon($idSalon)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'delete from salon 
						where idSalon = 			  "'.$idSalon.  '" ';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();	
			} catch (Exception $e) {
					throw $e;
						
			}
		}


		public function datosSalon($idSalon)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'select *  from salon
						where idSalon ="'.$idSalon.'" ';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();
				$return  = $stmt->fetchAll();
				return $return;	
			} catch (Exception $e) {
					throw $e;
			}

		}

	}
