<?php
require_once "../../php/class/connection.php";
class Delete_Marca extends Connection
{
  function delete()
  {
    $id = $_POST['id'];
    try {
      $sql = "DELETE FROM marcas WHERE id = :id";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id", $id);
      $stm->execute();

      return $stm->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Delete_Marca();
echo $cualquiera->delete();