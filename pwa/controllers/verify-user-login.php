<?php 
require_once '../../php/class/connection.php';

class VerifyLoginUser extends Connection{
	
	function __construct(){
		parent::__construct();
	}

	function verifyUser($arr_verify){
		try{
			$sql = "SELECT * FROM cliente WHERE email_cliente =:email";
			$stm = $this->con->prepare($sql);
			foreach ($arr_verify as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->fetchAll();

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}