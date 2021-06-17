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
    /************************** NUEVAS FUNCIONES PARA LAS TIENDAS **************************/
    function list_storeinfo_byName($name)
    {
        try {
            $sql = "SELECT c.email_cliente, c.direccion_cliente, p.nombre_pais, c.telefono, c.id_rubro, t.logo FROM cliente c INNER JOIN tienda t ON c.id_cliente = t.cliente INNER JOIN pais p ON c.id_pais = p.id_pais WHERE t.nombre_tienda = :name";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":name", $name);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
}
