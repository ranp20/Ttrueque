<?php
require_once("connection.php");
class All extends Connection
{
    function __construct()
    {
        parent::__construct();
    }

    function get_name_country()
    {
        try {
            $sql = "SELECT * FROM pais ORDER BY nombre_pais ASC";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function get_countries()
    {
        try {
            $sql = "SELECT * FROM pais";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function get_name_rubros()
    {
        try {
            $sql = "SELECT * FROM rubros";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function get_categorias()
    {
        try {
            $sql = "SELECT * FROM categoria ORDER BY nombre_categoria ASC";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    function get_categorias_tienda($id)
    {
        try {

            $sql = "Call select_categoria_idtienda(:id)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    /* LISTAR CATEGORÍA POR ID DE PRODUCTO */
    function get_cat_idtienda_update($idproduct){
        
        try{
            $sql = "SELECT categ.id_categoria,categ.nombre_categoria,prod.id_producto FROM producto prod
                    INNER JOIN categoria categ ON categ.id_categoria = prod.id_categoria
                    WHERE prod.id_producto  = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id",$idproduct);
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $err){
            die($err->getMessage());
        }
    }
    /* LISTAR TODAS LAS CATEGORÍAS MENOS EL ACTUAL */
    function get_categs_without_currentcateg($idcategoria){
        
        try{
            $sql = "SELECT id_categoria, nombre_categoria FROM categoria WHERE id_categoria != :idcategoria ORDER BY nombre_categoria ASC";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":idcategoria",$idcategoria);
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $err){
            die($err->getMessage());
        }
    }
    

    function get_marcas_tienda($id)
    {
        try {

            $sql = "Call select_marca_idtienda(:id)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }


    function get_subcategorias()
    {
        try {
            $sql = "SELECT s.id_subcategoria,s.id_categoria,s.nombre_subcategoria,c.nombre_categoria FROM subcategoria s JOIN categoria c ON s.id_categoria = c.id_categoria ORDER BY s.id_subcategoria ASC";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function list_subcategorias()
    {
        try {
            $sql = "SELECT * FROM subcategoria ORDER BY nombre_subcategoria ASC";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function get_clients()
    {
        try {
            $sql = "SELECT * FROM cliente";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function get_admin()
    {
        try {
            $sql = "SELECT * FROM administrativo";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function get_tienda()
    {
        try {
            $sql = "SELECT * FROM tienda";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    function get_orders()
    {
        try {
            $sql = "SELECT * FROM pedidos";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }


    function get_pointers()
    {
        try {
            $sql = "SELECT pu.id_puntuacion,c.nombre_cliente,p.nombre_producto,pu.estrellas,pu.titulo_puntuacion,pu.descripcion_puntuacion,pu.fecha_creacion FROM puntuacion AS pu 
                INNER JOIN cliente AS c ON pu.id_puntuacion = c.id_cliente
                INNER JOIN producto AS p ON pu.id_producto = p.id_producto ORDER BY pu.id_puntuacion DESC";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    function get_header_titles()
    {
        try {
            $sql = "SELECT * FROM header_titles";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_feedback()
    {
        try {
            $sql = "SELECT f.id, c.nombre_cliente, f.fmsg FROM feedback f INNER JOIN cliente c ON f.id = c.id_cliente ORDER BY id DESC";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }


    function select_subcategory($id)
    {
        try {
            $sql = "SELECT s_id_categoria,su.id_subcategoria,sub_nombre_subcategoria FROM subcategoria sub JOIN categoria ca ON sub.id_categoria = ca.id_categoria WHERE id_categoria = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_wallet()
    {
        try {
            $sql = "SELECT * FROM wallet_client";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_mantenience(){
        try {
            $sql = "SELECT * FROM mantenimiento";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }   
    }

    function get_mantenimiento_by_id($id){
        try {
            $sql = "SELECT * from mantenimiento WHERE id = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_mantenience($arr_mantenience){
        try {
            $sql = "UPDATE mantenimiento SET state_mantenience = :state_mantenience WHERE id = :id";
            $stm = $this->con->prepare($sql);

            foreach ($arr_mantenience as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $stm->execute();

            return "actualizado";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /************************** NUEVAS FUNCIONES **************************/
    function generate_uniqid($recover_pass){
        
        try {
            $sql = "UPDATE cliente SET token = :token WHERE email_cliente = :email";
            $stm = $this->con->prepare($sql);

            foreach ($recover_pass as $key => $value) {
                $stm->bindValue($key, $value);
            }

            $stm->execute();
            return $stm->rowCount() > 0 ? "Se acaba de generar el token" : "No se ha generado el token";
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    function get_client_by_email($email){
        
        try {
            $sql = "SELECT * FROM cliente WHERE email_cliente = :email";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":email", $email);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}