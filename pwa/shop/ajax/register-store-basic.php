<?php
require_once '../../php/class/connection.php';
class Insert_Store_basic extends Connection
{
  function insertar()
  {
    $add_store = [
      "tipo_cliente" => empty($_POST["tipo_cliente"]) ? "No definido" : $_POST["tipo_cliente"],
      "name" => empty($_POST["name"]) ? "No definido" : $_POST["name"],
      "tipo_documento" => empty($_POST["tipo_documento"]) ? "No definido" : $_POST["tipo_documento"],
      "num_doc" => empty($_POST["numero_documento"]) ? "No definido" : $_POST["numero_documento"],
      "razon_social" => empty($_POST["razon_social"]) ? "No definido" : $_POST["razon_social"],
      "ruc" => empty($_POST["ruc"]) ? "No definido" : $_POST["ruc"],
      "nombre_contacto" => empty($_POST["nombre_contacto"]) ? "No definido" : $_POST["nombre_contacto"],
      "menbresia" => empty($_POST["menbresia"]) ? 0 : $_POST["menbresia"],
      "client" => empty($_POST["client"]) ? 0 : $_POST["client"]
    ];

    try {
      $sql = "CALL add_tienda_basic (:tipo_cliente,:name,:tipo_documento,:num_doc,:razon_social,:ruc,:nombre_contacto,:menbresia,:client)";
      $stm = $this->con->prepare($sql);
      foreach ($add_store as $key => $value) {
        $stm->bindValue($key, $value);
      }

      $stm->execute();
      $var = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($var[0]);
      echo $res;

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}

$cualquiera = new Insert_Store_basic();
echo $cualquiera->insertar();