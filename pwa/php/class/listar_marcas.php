<?php 

require_once 'class/connection.php';

class List_trademarks extends connection{

	function get_trademarks_by_id (){
		try{
			$sql = "SELECT * FROM marcas WHERE id_tienda = {$_POST['id_tienda']}";
			$stm = $this->con->prepare($sql);
			$stm->execute();
			$values = $stm->fetchAll(PDO::FETCH_ASSOC);
			$res = json_encode($values);


			echo $res;

		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}

$listaMarcas = new List_trademarks();
echo $listaMarcas->get_trademarks_by_id();