<?php 

	require_once 'connection.php';
	class Header_Titles extends Connection{
	private $table = "header_titles";

	function __construct(){
		parent::__construct();
	}

	function get_header_titles(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

	function update_header_titles($titulo,$id){
		try{
			$sql = "UPDATE {$this->table} SET texto_header_title = :texto_h WHERE id_header_title = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":texto_h",$titulo);
			$stm->bindValue(":id",$id);
			$stm->execute();

			return $stm->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	function delete_header_titles($id){
		try{
			$sql = "DELETE FROM {$this->table} WHERE id_header_title = :id ";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id",$id);
			$stm->execute();
			$stm->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	function get_header_title_by_id($id){
		try{
			$sql = "SELECT * FROM {$this->table} WHERE id_header_title = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id",$id);
			$stm->execute();

			return $stm->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}