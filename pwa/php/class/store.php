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

    // function sel_idtienda_by_idcliente($cliente){
    //     try{
    //         $sql = "SELECT id FROM tienda WHERE cliente = :cliente";
    //         $stm = $this->con->prepare($sql);
    //         $stm->bindValue(":cliente", $cliente);
    //         $stm->execute();
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     }catch(PDOException $e){
    //         die($err->getMessage());
    //     }
    // }
}
