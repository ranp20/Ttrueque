<?php
require_once '../../php/class/connection.php';
class Insert_Product extends Connection{
  function insertar(){
    
    if(isset($_FILES) && $_FILES != "" && isset($_FILES['imagen']) && isset($_POST) && $_POST != ""){
      $arr = [
        "tienda" => $_POST["tienda"],
        "name" => $_POST["name"],
        "precio" => $_POST["precio"],
        "pais" => $_POST["pais"],
        "stock" => $_POST["stock"],
        "marca" => $_POST["marca"],
        "categoria" => $_POST["categoria"],
        "imagen" => str_replace(' ', '-', $_FILES['imagen']['name']),
        "desc" => $_POST["desc"]
      ];
      try{
        $file1 = $_FILES['imagen']['name'];
        $file_loc = $_FILES['imagen']['tmp_name'];
        $folder = "../folder/";
        $new_file_name = strtolower($file1);
        $final_file = str_replace(' ', '-', $new_file_name);
        
        if(move_uploaded_file($file_loc, $folder . $final_file)){
          $itemimg = $final_file;
          $sql = "CALL add_product(:name,:desc,:precio,:pais,:stock,:marca,:categoria,:imagen,:tienda)";
          $stm = $this->con->prepare($sql);
          foreach ($arr as $key => $val) {
              $stm->bindValue($key, $val);
          }
          $stm->execute();
          $var =   $stm->fetchAll(PDO::FETCH_ASSOC);
          $res = json_encode($var[0]);
          echo $res;
        }
      }catch(PDOException $e){
        return $e->getMessage();
      }
    }else{
      $r = array(
        'res' => 'aprod_false'
      );
    }
  }
}
$cualquiera = new Insert_Product();
echo $cualquiera->insertar();