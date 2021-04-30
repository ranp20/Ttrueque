<?php

require_once "../php/class/connection.php";

class Select_cliente extends Connection
{
    function listar_cliente()
    {
        $arr = [
            "cliente" => $_POST['cliente']
        ];

        try {
            $sql = "CALL sp_select_client_id(:cliente)";
            $stm = $this->con->prepare($sql);
            foreach ($arr as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $stm->execute();
            $var = $stm->fetchAll(PDO::FETCH_ASSOC);
            $res = json_encode($var);
            echo $res;
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new Select_cliente();
echo $cualquiera->listar_cliente();