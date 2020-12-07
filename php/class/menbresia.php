<?php
require_once("connection.php");
class Menbresia extends Connection
{
    private $table = "menbresia";
    private $table_purs = "purchasemembership";

    function __construct()
    {
        parent::__construct();
    }
    //LISTAR LAS MEMBRESÍAS
    function get_data()
    {
        try {
            $sql = "SELECT * FROM menbresia";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //AGREGAR UNA MEMBRESÍA...
    function add_menbresia($imagen, $tipo, $cantidad, $precio_eeuu, $descrip)
    {
        try {
            $sql = "INSERT INTO menbresia(image,tipo,cantidad,precio_eeuu,descripcion) VALUES(:imagen,:tipo,:cantidad,:precio_eeuu,:descrip)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":imagen", $imagen);
            $stm->bindValue(":tipo", $tipo);
            $stm->bindValue(":cantidad", $cantidad);
            $stm->bindValue(":precio_eeuu", $precio_eeuu);
            $stm->bindValue(":descrip", $descrip);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //ELIMINAR LA MEMBRESÍA...
    function delete_menbresia($id)
    {
        try {
            $sql = "DELETE FROM menbresia WHERE id = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //ACTUALIZAR LA MEMBRESÍA...
    function update_menbresia($image, $tipo, $cantidad, $precio_eeuu, $descrip, $id)
    {
        try {
            $sql = "UPDATE menbresia SET image=:image,tipo=:tipo,cantidad=:cantidad,precio_eeuu=:precio_eeuu,descripcion=:descrip WHERE id = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':image', $image);
            $stm->bindValue(':tipo', $tipo);
            $stm->bindValue(':cantidad', $cantidad);
            $stm->bindValue(":precio_eeuu", $precio_eeuu);
            $stm->bindValue(':descrip', $descrip);
            $stm->bindValue(':id', $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //LISTAR MEMBRESÍAS POR ID...
    function get_menbresia_by_id($id)
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
    //AGREGAR REGISTRO DE COMPRA DE MEMBRESÍAS...
    function add_purchasemembership($arr_purchase_memb)
    {
        try {
            $sql = "CALL add_purchasepoints (:id_wallet,:id_client,:pass_trans,:paypal_data,:status,:payment_method)";
            $stm = $this->con->prepare($sql);
            foreach ($arr_purchase_memb as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $stm->execute();
            return $stm->rowCount() > 0 ? "true" : "false";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
