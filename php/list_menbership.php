<?php 
require_once 'class/connection.php';
class ListMenbershipHome extends Connection{
	function listmenbership(){
		try{
			$sql = "SELECT * FROM menbresia";
			$stm = $this->con->query($sql);
			$stm->execute();
			$var = $stm->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($var);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$list = new ListMenbershipHome();
echo $list->listmenbership();