<?php 
require_once '../php/class/connection.php';

class getNameStore extends Connection{
	
	function __construct(){
		parent::__construct();
	}

	function getnamestore($id){
		try{
			$sql = "SELECT * FROM tienda WHERE cliente =:id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $err){
			return $e->getMessage();
		}
	}
}