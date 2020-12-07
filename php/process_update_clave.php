<?php
require_once "class/connection.php";

class UpdateClaveclass extends Connection
{
    function updateclave()
    {

        $arr_op = [
            "id" => $_POST['id'],
            "pass" => $_POST['pass'],
        
        ];

        try {
            $sql = "CALL update_password_admin(:pass,:id)";
            $stm = $this->con->prepare($sql);
            foreach ($arr_op as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $var = $stm->execute();
            $res = json_encode($var);
            echo $res;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
$cualquiera = new UpdateClaveclass();
echo $cualquiera->updateclave();