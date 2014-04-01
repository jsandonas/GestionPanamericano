<?php 
	/**
	* 
	*/
	class accesoDB
	{
		
		private static $cnPDO=null;

		public static function getConnectionPDO()
		{
			if (self::$cnPDO==null) {

				try {
				
					$param = parse_ini_file("../conf/local.ini");				
					$url = $param['1'];
					$user = $param['2'];
					$pass = $param['3'];
					self::$cnPDO  = new PDO($url,$user,$pass);
					self::$cnPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$cnPDO->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
					self::$cnPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


				} catch (Exception $e) {
					throw $e;
					
				}
			}
			
			return self::$cnPDO;
		}
	}

 ?>

				