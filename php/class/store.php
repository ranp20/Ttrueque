<?php
require_once("connection.php");
class Store extends Connection
{
    private $table = "tienda";

    function __construct()
    {
        parent::__construct();
    }

    function select_tienda()
    {
        try {
            $sql = "SELECT * FROM tienda WHERE estado = 'ACTIVO'";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
}
