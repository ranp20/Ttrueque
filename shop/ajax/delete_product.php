<?php
require_once "../../php/class/connection.php";
class Delete_Product extends Connection
{
  function delete()
  {
    $id = $_POST['id'];
    try {
      $sql = "DELETE FROM producto WHERE id_producto = :id";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id", $id);
      $stm->execute();

      return $stm->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Delete_Product();
echo $cualquiera->delete();