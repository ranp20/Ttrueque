<?php
require_once "class/connection.php";
class List_SearchByCategories extends Connection{
  function list(){
    $que = (isset($_POST['product']) && $_POST['product'] != "") ? $_POST['product'] : "";
    try{
      $sql = "SELECT nombre_categoria FROM categoria ORDER BY id_categoria DESC LIMIT 6";

      if($que != ""){
          $search = addslashes($que);
          $sql = "SELECT * FROM categoria 
                  WHERE nombre_categoria LIKE '%$search%'
                  ORDER BY id_categoria DESC LIMIT 6";
      }
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var);
      echo $res;
    }catch (PDOException $e){
      return $e->getMessage();
    }
  }
}
$list = new List_SearchByCategories();
echo $list->list();