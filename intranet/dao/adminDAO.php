<?php 
	require_once '../db/accesoDB.php';

	/**
	* 
	*/
	class adminDAO
	{
		
		public function crearPersona($iPersona)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'insert into persona (idPersona, nombre, apellido, fecha_nac,sexo) 
						values ("'.$iPersona['idPersona'].'","'.$iPersona['nombre'].'","'.$iPersona['apellido'].'",
								"'.$iPersona['fecha_nac'].'","'.$iPersona['sexo'].'" )';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();	
			} catch (Exception $e) {
					throw $e;
						
			}			

		}
		
		public function crearTrabajador($iTrabajador)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'insert into trabajador (idTrabajador, password, Persona_idPersona, tipoTrabajador) 
						values ("'.$iTrabajador['idTrabajador'].'","'.$iTrabajador['password'].'","'.$iTrabajador['Persona_idPersona'].'",
								"'.$iTrabajador['tipoTrabajador'].'" )';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();	
			} catch (Exception $e) {
					throw $e;
						
			}						
		}

		public function crearUsuario($iUsuario){
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'insert into usuario (idUsuario, pass, fech_creacion,usuario_crea, tipoUsuario, activo, Persona_idPersona, user) 
						values ("'.$iUsuario['idUsuario'].'"			,"'.$iUsuario['pass'].'"	,
								"'.$iUsuario['fech_creacion'].'"		,"'.$iUsuario['usuario_crea'].'",
								"'.$iUsuario['tipoUsuario'].'"			,"'.$iUsuario['activo'].'"	,
								"'.$iUsuario['Persona_idPersona'].'"	,"'.$iUsuario['user'].'" )';
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


		public function datosUsuario($idUsuario)
		{
			try {
				$pdo = accesoDB::getConnectionPDO();
				$sql = 'select *  from usuario
						where idUsuario ="'.$idUsuario.'" ';
				$stmt= $pdo->prepare($sql);
				$stmt->execute();
				$return  = $stmt->fetchAll();
				return $return;	
			} catch (Exception $e) {
					throw $e;
			}

		}

	}


	$dao = new adminDAO();
/*idPersona, nombre, apellido, fecha_nac,sexo
	$iPersona['idPersona'] = 'PER002';
	$iPersona['nombre'] = 'Luisa';
	$iPersona['apellido'] = 'Guerra';
	$iPersona['fecha_nac'] = 'now()';
	$iPersona['sexo'] = 'F';

	$dao->crearPersona($iPersona);
/*idTrabajador, password, Persona_idPersona, tipoTrabajador
	$iTrabajador['idTrabajador'] ='TRA002';
	$iTrabajador['password'] ='654321';
	$iTrabajador['Persona_idPersona'] ='PER002';
	$iTrabajador['tipoTrabajador'] ='Secretaria';
	$dao->crearTrabajador($iTrabajador);
/*idUsuario, pass, fech_creacion,usuario_crea, tipoUsuario, activo, Persona_idPersona, user
	$iUsuario['idUsuario'] ='USE002';
	$iUsuario['pass'] ='654321';
	$iUsuario['fech_creacion'] ='now()';
	$iUsuario['usuario_crea'] ='USE001';
	$iUsuario['tipoUsuario'] ='2';
	$iUsuario['activo'] ='SI';
	$iUsuario['Persona_idPersona'] ='PER002';
	$iUsuario['user'] ='secretaria';
	$dao->crearUsuario($iUsuario);
*/

	$idUsuario = 'USE001';
	$rs = $dao->datosUsuario($idUsuario);

	for ($i=0; $i < count($rs) ; $i++) { 
		echo $rs[$i]['idusuario'].'<br>';	
		echo $rs[$i]['user'].'<br>';	
	}







 ?>