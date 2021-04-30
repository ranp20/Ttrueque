<?php
require_once '../../php/class/connection.php';
class Insert_Marca extends Connection
{
  function insertar()
  {
    $arr = [
      "tienda" => $_POST["tienda"],
      "name" => $_POST["name"]
    ];
    try {
      $sql = "CALL add_marca(:name,:tienda)";
      $stm = $this->con->prepare($sql);
      foreach ($arr as $key => $val) {
          $stm->bindValue($key, $val);
      }

      $stm->execute();
      $var =   $stm->fetchAll(PDO::FETCH_ASSOC);
      // $res = json_encode($var);
      $res = json_encode($var);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}

$cualquiera = new Insert_Marca();
echo $cualquiera->insertar();