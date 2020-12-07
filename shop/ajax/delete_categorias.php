<?php
require_once "../../php/class/connection.php";
class Delete_Categorias extends Connection
{
  function delete()
  {
    $id = $_POST['id'];
    try {
      $sql = "DELETE FROM categorias_cli WHERE id = :id";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id", $id);
      $stm->execute();

      return $stm->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Delete_Categorias();
echo $cualquiera->delete();