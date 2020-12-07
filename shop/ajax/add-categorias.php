<?php 
require_once '../../php/class/connection.php';
class Insert_Categorias extends Connection
{
  function insertar()
  {
    $arr = [
      "id_categoria" => $_POST["id_categoria"],
      "id_tienda" => $_POST["id_tienda"]
    ];
    try {
      $sql = "CALL add_categoria_tienda(:id_categoria,:id_tienda)";
      $stm = $this->con->prepare($sql);
      foreach ($arr as $key => $val)  {
          $stm->bindValue($key, $val);
      }
      $stm->execute();
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      // $res = json_encode($var);
      $res = json_encode($var);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}

$cualquiera = new Insert_Categorias();
echo $cualquiera->insertar();