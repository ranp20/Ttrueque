<?php 

require_once 'connection.php';
class PurchasePoints extends Connection
{
	private $table = "purchasepoints";

	function __construct()
	{
		parent ::__construct();
	}

	function get_purchasepoints_by_id($id)
	{
		try{	
			$sql = "SELECT * FROM $this->table WHERE id_cliente = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(':id', $id);
			$stm->execute();
			return $stm->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	//AGREGAR A LA TABLA "VENTAS"...
	function add_purchasepoints($arr_purchase)
	{
		try{	
			$sql = "CALL add_purchasepoints (:id_wallet,:id_client,:pass_trans,:paypal_data,:status,:payment_method)"; 
			$stm = $this->con->prepare($sql);
			foreach($arr_purchase as $key => $value){
				$stm->bindValue($key,$value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	//ACTUALIZAR LA TABLA CON LA NUEVA INFORMACIÓN DE LA TRANSACCIÓN...
	// function update_purchasepoints($arr_update){
	// 	try{
	// 		$sql = "UPDATE purchasepoints SET paypal_data = :paypalDatos, status = 'Aprobado' WHERE id = :id";
	// 		$stm = $this->con->prepare($sql);
	// 		foreach ($arr_update as $key => $value) {
	// 			$stm->bindValue($key, $value);
	// 		}
	// 		$stm->execute();
	// 		return $stm->fetchAll();
	// 	}catch(PDOException $e){
	// 		return $e->getMessage();
	// 	}
	// }
	//VERIFICAR LA ACTUALIZACIÓN DE LA INFORMACIÓN EN LA TABLA...
	function update_purchasepoints_final($pass_trans,$total,$id){
		try{
			$sql = "UPDATE purchasepoints SET status = 'Completado' WHERE pass_trans = :pass_trans AND total = :total AND id = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":pass_trans", $pass_trans);
			$stm->bindValue(":total", $total);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->rowCount() > 0 ? "True" : "False";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

}