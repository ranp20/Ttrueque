<?php 
require_once '../../php/class/connection.php';
class List_byUsernameAdmin extends Connection{
	function list($u_username){
		try{
			$sql = "SELECT * FROM administrativo WHERE email_admin = :u_username LIMIT 1";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":u_username", $u_username);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}