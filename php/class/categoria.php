<?php
require_once("connection.php");
class Categoria extends Connection
{
    private $table = "categoria";

    function __construct()
    {
        parent::__construct();
    }

    function get_categoria_name($nombre, $sub)
    {
        try {
            $sql = "SELECT 
                    c.id_categoria,c.nombre_categoria,c.imagen_categoria,s.nombre_subcategoria 
                    FROM categoria c 
                    JOIN subcategoria s ON c.id_categoria = s.id_categoria 
                    WHERE c.nombre_categoria = :nombre AND s.nombre_subcategoria = :sub";

            $stm = $this->con->prepare($sql);
            $stm->bindValue(":nombre", $nombre);
            $stm->bindValue(":sub", $sub);
            $stm->execute();

            $d = $stm->fetchAll();

            return count($d) > 0 ? [true, $d] : [false, []];
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    //-----------------------//
    function get_data_tienda($id)
    {
        try {
            $sql = "SELECT * FROM tienda where cliente=:id";

            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            $d = $stm->fetchAll();

            return count($d) > 0 ? [true, $d] : [false, []];
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    //-----------------------//
    function get_categoria()
    {
        try {
            $sql = "SELECT id_categoria,nombre_categoria,imagen_categoria FROM categoria";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    function get_categoria_limit()
    {
        try {
            $sql = "SELECT * FROM categoria LIMIT 10;";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    //-----------------------//
    function get_data()
    {
        try {
            $sql = "SELECT * FROM view_categories";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //-----------------------//
    function add_category($nombre, $imagen)
    {
        try {
            $sql = "INSERT INTO categoria(nombre_categoria,imagen_categoria) VALUES(:nombre,:imagen)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":nombre", $nombre);
            $stm->bindValue(":imagen", $imagen);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function add_subcategory($id_categoria, $nombre)
    {
        try {
            $sql = "INSERT INTO subcategoria(id_categoria,nombre_subcategoria) VALUES(:id_categoria,:nombre)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id_categoria", $id_categoria);
            $stm->bindValue(":nombre", $nombre);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function add_image($path)
    {
        try {
            $sql = "CALL add_images_categoria(:path);";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":path", $path);
            $stm->execute();

            return $stm->rowcount() > 0 ? 1 : 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function get_subcategory($id)
    {
        try {
            $sql = "SELECT s.id_subcategoria,c.nombre_categoria,s.nombre_subcategoria FROM subcategoria s INNER JOIN categoria c ON s.id_categoria = c.id_categoria WHERE id_subcategoria = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function delete_category($id)
    {
        try {
            $sql = "DELETE FROM categoria WHERE id_categoria = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function delete_subcategory($id)
    {
        try {
            $sql = "DELETE FROM subcategoria WHERE id_subcategoria = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function update_category($nombre, $imagen, $id)
    {
        try {
            $sql = "UPDATE categoria SET nombre_categoria=:name,imagen_categoria=:image WHERE id_categoria = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':name', $nombre);
            $stm->bindValue(':image', $imagen);
            $stm->bindValue(':id', $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function update_ruta_image_category($img, $id)
    {
        try {
            $sql = "UPDATE rutas_imagen_categoria SET ruta_imagen = :image WHERE id_categoria = :id or ruta_imagen=:image";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":image", $img);
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function update_subcategory($nombre, $id)
    {
        try {
            $sql = "UPDATE subcategoria SET nombre_subcategoria = :nombre WHERE id_subcategoria = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":nombre", $nombre);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //-----------------------//
    function get_category_by_id($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id_categoria = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
