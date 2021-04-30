<?php
require_once("connection.php");
class Puntuacion extends Connection
{
    private $table = "puntuacion";

    function __construct()
    {
        parent::__construct();
    }

    function get_comments($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id_producto = :id LIMIT 0,4";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function delete_pointers($id)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id_puntuacion = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function add_pointers($array_pointers)
    {
        try {
            $sql = "CALL add_pointer(:id_cli,:id_prod,:stars,:title,:desc,:fecha)";
            $stm = $this->con->prepare($sql);
            foreach ($array_pointers as $key => $val) {
                $stm->bindValue($key, $val);
            }
            $stm->execute();
            return $stm->rowcount() > 0 ? true : false;
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
}
