<?php

require_once("connection.php");
class Product extends Connection
{
    private $table = "producto";
    private $table_admin = "product_admin";

    function __construct()
    {
        parent::__construct();
    }

    function most_popular()
    {
        try {
            $sql = "SELECT * FROM most_popular";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function top_sell($pais)
    {
        

        try {
            $sql = "CALL sp_select_products_idpais(:pais)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':pais', $pais);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function top_sell_admin($pais)
    {
        

        try {
            $sql = "CALL sp_select_products_idpais_admin(:pais)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(':pais', $pais);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_banners()
    {
        try {
            $sql = "SELECT * FROM banners";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function get_banner_p()
    {
        try {
            $sql = "SELECT * FROM banner_p";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }



    function get_data_category($cat, $sub)
    {
        try {
            $sql = "SELECT * FROM products_filter_category WHERE nombre_categoria = :category and nombre_subcategoria = :subcategory";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":category", $cat);
            $stm->bindValue(":subcategory", $sub);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }


    function update_state($id, $type)
    {
        try {
            if ($type == "view") $sql = "SELECT mostrar_home from producto where id_producto = :id";
            else if ($type = "ofert") $sql = "SELECT oferta from producto where id_producto = :id";
            else {
                return false;
            }
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            $data = $stm->fetchAll()[0][0];

            if ($data == "SI") {
                if ($type == "ofert") $sql = "update producto set oferta = 'NO' where id_producto = :id";
                else if ($type == "view") $sql = "update producto set mostrar_home = 'NO' where id_producto = :id";
                else {
                    return false;
                }
            } else if ($data == "NO") {
                if ($type == "ofert") $sql = "update producto set oferta = 'SI' where id_producto = :id";
                else if ($type == "view") $sql = "update producto set mostrar_home = 'SI' where id_producto = :id";
                else {
                    return false;
                }
            }

            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->rowCount() > 0 ? true : false;
        } catch (PDOException $err) {
            die($err);
        }
    }


    ///FUNCIONES PARA EL CLIENTE....
    function get_data($id)
    {
        try {
            $sql = "SELECT * FROM producto where id_producto=:id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function add_product($array_data_product)
    {
        try {
            $sql = "CALL add_product(:user,:name,:desc,:precio,:pais,:stock,:marca,:unidad,:tipo_unidad,:categoria,:subcategoria)";
            $stm = $this->con->prepare($sql);
            foreach ($array_data_product as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $stm->execute();
            return $stm->rowCount() > 0 ? true : false;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    function add_image($path)
    {
        try {
            $sql = "CALL add_images_producto(:path)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":path", $path);
            $stm->execute();
            return $stm->rowCount() > 0 ? 1 : 0;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    function delete_data($id)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id_producto = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_data_by_id($id)
    {
        try {
            $sql =
                "SELECT p.id_producto,c.id_cliente,c.nombre_cliente,p.nombre_producto,p.descripcion_producto,p.precio_producto,pai.id_pais,pai.nombre_pais,p.stock_producto,p.marca_producto,
                p.unidad,tip.id_tipo_unidad,tip.tipo_unidad,cat.id_categoria,cat.nombre_categoria,
                sub.id_subcategoria,sub.nombre_subcategoria,(select ruta_imagen from rutas_imagen_producto where id_producto = p.id_producto limit 0,1) as imagen 
                FROM producto p 
                INNER JOIN cliente c ON p.id_cliente = c.id_cliente
                INNER JOIN pais pai ON p.id_pais = pai.id_pais
                INNER JOIN tipo_unidad tip ON p.id_tipo_unidad = tip.id_tipo_unidad
                INNER JOIN categoria cat ON p.id_categoria = cat.id_categoria
                INNER JOIN subcategoria sub ON p.id_subcategoria = sub.id_subcategoria 
                WHERE id_producto = :id;";

            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_udate_product($array_data)
    {
        try {
            $sql = "UPDATE {$this->table} 
                            SET 
                            id_cliente = :id_cli,
                            nombre_producto = :nom, 
                            descripcion_producto = :desc,
                            precio_producto = :pre,
                            id_pais = :pais,
                            stock_producto = :stock,
                            marca_producto = :marca,         
                            unidad = :uni,
                            id_tipo_unidad = :tipouni,
                            id_categoria=:idcat,
                            id_subcategoria=:idsub
                            WHERE id_producto = :id";


            $stm = $this->con->prepare($sql);
            foreach ($array_data as $key => $val) {
                $stm->bindValue($key, $val);
            }

            $stm->execute();
            // return "correcto";
            return $stm->fetchAll();
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    function update_ruta_image_product($img, $id)
    {
        try {
            $sql = "UPDATE rutas_imagen_producto SET ruta_imagen=:image WHERE id_producto = :id or ruta_imagen=:image";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":image", $img);
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //FUNCIONES PARA EL ADMINISTRADOR...
    function get_data_admin()
    {
        try {
            $sql = "SELECT * FROM view_products_admin";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function add_product_admin($arr_prod_admin)
    {
        try {
            $sql = "CALL add_product_admin(:user,:name,:desc,:precio,:pais,:stock,:marca,:categoria,:image)";
            $stm = $this->con->prepare($sql);
            foreach ($arr_prod_admin as $key => $val) {
                $stm->bindValue($key, $val);
            }
            $stm->execute();
            return $stm->rowCount() > 0 ? true : false;
        } catch (PDOException $e) { 
            return $e->getMessage();
        }
    }

    function add_image_prod_admin($path)
    {
        try {
            $sql = "CALL add_image_prod_admin(:path)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":path", $path);
            $stm->execute();
            return $stm->rowCount() > 0 ? 1 : 0;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    function delete_data_admin($id)
    {
        try {
            $sql = "DELETE FROM {$this->table_admin} WHERE id = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_data_admin_by_id($id)
    {
        try {
            $sql =
                "SELECT pad.id,ad.id_admin,ad.nombre_admin,pad.nombre,pad.descripcion,pad.precio,pai.id_pais,pai.nombre_pais,pad.stock,pad.marca,
                cat.id_categoria,cat.nombre_categoria,(select ruta_imagen from rutas_imagen_product_admin where id_product_admin = pad.id limit 0,1) as imagen 
                FROM product_admin pad 
                INNER JOIN administrativo ad ON pad.id_admin = ad.id_admin
                INNER JOIN pais pai ON pad.id_pais = pai.id_pais
                INNER JOIN categoria cat ON pad.id_categoria = cat.id_categoria
                WHERE id = :id;";

            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_udate_product_admin($array_data)
    {
        try {
            $sql = "UPDATE {$this->table_admin} 
                            SET 
                            id_admin = :id_admin,
                            nombre = :nom, 
                            descripcion = :desc,
                            precio = :pre,
                            id_pais = :pais,
                            stock = :stock,
                            marca = :marca,
                            id_categoria=:idcat
                            WHERE id = :id";


            $stm = $this->con->prepare($sql);
            foreach ($array_data as $key => $val) {
                $stm->bindValue($key, $val);
            }

            $stm->execute();
            // return "correcto";
            return $stm->fetchAll();
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    function update_ruta_image_product_admin($img, $id)
    {
        try {
            $sql = "UPDATE rutas_imagen_product_admin SET ruta_imagen=:image WHERE id_product_admin = :id or ruta_imagen=:image";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":image", $img);
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /*===================================================================
    =            FILTROS PARA LA VISTA DE LOS PRODUCTOS                 =
    ===================================================================*/
    /***************************************************************************************************/
    /*  1. NÚMERO TOTAL DE REGISTROS POR NOMBRE DE LA TIENDA*/
    function get_count_ProdsByNameStore($namestore)
    {
        try {
            $sql = "CALL sp_count_ProdsByNameStore(:namestore)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":namestore", $namestore);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    /*  2. LIMITAR EL NÚMERO DE REGISTROS POR VISTA DE ACUERDO AL NOMBRE DE LA TIENDA */
    function get_limit_ProdsByNameStore($namestore, $offset, $per_page)
    {
        try {
            $sql = "CALL sp_limit_ProdsByNameStore(:namestore, :offset, :per_page)";
            $stm = $this->con->prepare($sql);            
            $stm->bindValue(":namestore", $namestore);
            $stm->bindValue(":offset", $offset);
            $stm->bindValue(":per_page", $per_page);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }


    /***************************************************************************************************/
    /*  2. NÚMERO TOTAL DE REGISTROS POR NOMBRE DE LA TIENDA*/
    function get_count_ProdsByNameCategory($namecategory)
    {
        try {
            $sql = "CALL sp_count_ProdsByNameCategory(:namecategory)";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":namecategory", $namecategory);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
    /*  3. LIMITAR EL NÚMERO DE REGISTROS POR VISTA DE ACUERDO AL NOMBRE DE LA TIENDA */
    function get_limit_ProdsByNameCategory($namecategory, $offset, $per_page)
    {
        try {
            $sql = "CALL sp_limit_ProdsByNameCategory(:namecategory, :offset, :per_page)";
            $stm = $this->con->prepare($sql);            
            $stm->bindValue(":namecategory", $namecategory);
            $stm->bindValue(":offset", $offset);
            $stm->bindValue(":per_page", $per_page);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }
}
