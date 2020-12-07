<?php
require_once("connection.php");
class Credentials extends Connection
{

  private $table = "credentials";

  function __construct()
  {
    parent::__construct();
  }

  function get_credentials(){
    try{
      $sql = "SELECT * FROM {$this->table}";
      $stm = $this->con->query($sql);
      $stm->execute();

      return $stm->fetchAll();
    }catch(PDOException $e){
      return $e->getMessage();
    }   
  }

  function get_credentials_by_id($id)
  {
    try {
      $sql = "SELECT * FROM {$this->table} WHERE id = :id";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id", $id);
      $stm->execute();
      
      return $stm->fetchAll();
    } catch (PDOException $err) {
      die($err->getMessage());
    }
  }

  function update_credentials($arr_credentials)
  {
    try {
      $sql = "UPDATE {$this->table} SET key_public = :key_public, key_secret = :key_secret WHERE id = :id";
      $stm = $this->con->prepare($sql);
      foreach ($arr_credentials as $key => $value) {
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      
      return "actualizado";
    } catch (PDOException $err) {
      die($err->getMessage());
    }
  }
}