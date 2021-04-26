<?php 
require_once '../../php/class/connection.php';

class getUserData extends Connection{
	
	function __construct(){
		parent::__construct();
	}

	function getData($id){
		try{
			$sql = "SELECT * FROM cliente WHERE id_cliente =:id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $err){
			return $e->getMessage();
		}
	}
}