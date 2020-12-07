<?php
require_once "../../php/class/connection.php";
class Update_Sales_Report extends Connection
{
  function update()
  {
    $arr_sales = [
      "year" => $_POST["year"],
      "mes" => $_POST["mes"],
      "idtienda" => $_POST["idtienda"]
    ];

    try {
      $sql = "CALL sp_update_sales_report(:year,:mes,:idtienda)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_sales as $key => $value) {
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      print_r($var);
      $res = json_encode($var);

      echo $res;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
$cualquiera = new Update_Sales_Report();
echo $cualquiera->update();