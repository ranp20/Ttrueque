<?php
require_once 'connection.php';

class Tipo_unidad extends Connection
{
	private $table = "tipo_unidad";
	function __construct()
	{
		parent::__construct();
	}

	function get_data()
	{
		try {
			$sql = "SELECT * FROM {$this->table}";
			$stm = $this->con->query($sql);
			return $stm->fetchAll();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	function get_data_by_id($id)
	{
		try {
			$sql = "SELECT * FROM {$this->table} WHERE id_tipo_unidad = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();

			return $stm->fetchAll();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	function add_tipo_unidad($tipo_unidad)
	{
		try {
			$sql = "INSERT INTO tipo_unidad (tipo_unidad) VALUES (:tip_uni)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":tip_uni", $tipo_unidad);
			$stm->execute();

			return $stm->fetchAll();
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	function update_tipo_unidad($array_data)
	{
		try {
			$sql = "UPDATE {$this->table} SET tipo_unidad = :tipo WHERE id_tipo_unidad = :id";
			$stm = $this->con->prepare($sql);
			foreach ($array_data as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();

			return $stm->fetchAll();
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	function delete_tipo_unidad($id)
	{
		try {
			$sql = "DELETE FROM {$this->table} WHERE id_tipo_unidad = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();

			return $stm->fetchAll();
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
}
