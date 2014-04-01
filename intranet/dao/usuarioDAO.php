<?php 
	require_once '../db/accesoDB.php';

	/**
	* 
	*/
	class usuarioDAO
	{
		
		public function loginUsuario($user)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'select *  from usuario
						where  user="'.$user.'" ';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();
				$response  = $stmt->fetchAll();
				return $response;	
			} catch (Exception $e) {
					throw $e;
			}

		}

	}
