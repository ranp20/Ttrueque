<?php
require_once '../php/class/connection.php';
class Insert_Store extends Connection
{
  function insertar($arr_store)
  { 
    try {
      $sql = "CALL add_tienda (:tipo_cliente,:name,:tipo_documento,:num_doc,:razon_social,:ruc,:nombre_contacto,:menbresia,:client,:idtienda)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_store as $key => $value) {
          $stm->bindValue($key, $value);
      }  
      $stm->execute();
      
      return $stm->fetchAll(PDO::FETCH_ASSOC);
      
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}