<?php
require_once("connection.php");
class Wallet_client extends Connection
{
    private $table = "wallet_client";

    function __construct()
    {
        parent::__construct();
    }
    //LISTAR LAS RECARGAS...
    function get_data()
    {
        try {
            $sql = "SELECT * FROM wallet_client";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //AGREGAR RECARGA...
    function add_wallet_client($imagen, $tipo, $cap_carga, $precio)
    {
        try {
            $sql = "INSERT INTO wallet_client(image,tipo,cap_carga,precio) VALUES(:imagen,:tipo,:cap_carga,:precio)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":imagen", $imagen);
            $stm->bindValue(":tipo", $tipo);
            $stm->bindValue(":cap_carga", $cap_carga);
            $stm->bindValue(":precio", $precio);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //ELIMINAR RECARGA...
    function delete_wallet_client($id)
    {
        try {
            $sql = "DELETE FROM wallet_client WHERE id = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //ACTUALIZAR RECARGA...
    function update_wallet_client($image, $tipo, $cap_carga, $precio, $id)
    {
        try {
            $sql = "UPDATE wallet_client SET image=:image,tipo=:tipo,cap_carga=:cap_carga,precio=:precio WHERE id = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':image', $image);
            $stm->bindValue(':tipo', $tipo);
            $stm->bindValue(':cap_carga', $cap_carga);
            $stm->bindValue(':precio', $precio);
            $stm->bindValue(':id', $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //LISTAR RECARGA POR ID...
    function get_wallet_client_by_id($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}