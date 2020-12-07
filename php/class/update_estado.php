<?php

require_once "../../php/class/connection.php";

class UpdateEstado extends Connection
{

    function update()
    {
      
        $arr = [

            "estado" => $_POST["estado"],
            "id" => $_POST["id"],
        ];
        try {
            $sql = "CALL update_estado(:estado,:id)";
            $stm = $this->con->prepare($sql);
            foreach ($arr as $key => $val) {
                $stm->bindValue($key, $val);
            }

            $stm->execute();
            echo  $stm = "updated";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new UpdateEstado();
echo $cualquiera->update();
