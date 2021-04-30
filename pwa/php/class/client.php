<?php
require_once("connection.php");
class Client extends Connection
{
    private $table = "cliente";

    function __construct()
    {
        parent::__construct();
    }

    function get_data()
    {
        try {
            $sql = " SELECT c.id_cliente,c.email_cliente,c.password_cliente,c.nombre_cliente,c.apellido_cliente,c.direccion_cliente,ps.nombre_pais,c.telefono,c.puntos 
            FROM cliente c 
            INNER JOIN pais ps ON c.id_pais = ps.id_pais";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    function get_mail($mail)
    {
        try {
            $sql = "SELECT email_cliente FROM {$this->table} WHERE email_cliente = :mail";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":mail", $mail);

            $stm->execute();
            return count($stm->fetchAll()) == 0 ? true : false;
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    //CLIENTES SIN TIENDA...
    function get_client()
    {
        try {
            $sql = "SELECT * FROM view_clients";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //CLIENTES CON TIENDA...
    function get_client_store()
    {
        try {
            $sql = "SELECT * FROM view_clients_store";
            $stm = $this->con->query($sql);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    function get_countries_by_idcountry($idpais)
    {
        try {
            $sql = "SELECT * FROM pais WHERE id_pais != :idpais";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":idpais", $idpais);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }       
    }

    function select_points_default($id)
    {
        try {
            $sql = "SELECT puntos FROM cliente WHERE id_cliente = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    function add_client($array_data_client)
    {
        try {
            $sql = "INSERT INTO cliente(email_cliente,password_cliente,nombre_cliente,apellido_cliente,direccion_cliente,id_pais,telefono,id_rubro)VALUES(:mail,:pass,:name,:lastname,:direction,:country,:phone,:id_rubro)";
            $stm = $this->con->prepare($sql);
            foreach ($array_data_client as $key => $value) {
                $stm->bindValue($key, $value);
            }
            $stm->execute();
            return $stm->rowCount() > 0 ? "true" : "false";
        } catch (PDOException $err) {
            return $err;
        }
    }

    function verify_login($array_data_client)
    {
        try {
            $query = "SELECT * FROM  {$this->table}  WHERE email_cliente =:mail";
            $stm = $this->con->prepare($query);

            foreach ($array_data_client as $key => $value) {
                $stm->bindValue($key, $value);
            }

            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }




    function get_data_by_id($id)
    {
        try {
            $sql = "SELECT c.id_cliente,c.email_cliente,c.password_cliente,c.nombre_cliente,c.apellido_cliente,c.direccion_cliente,p.id_pais AS 'pais',p.nombre_pais,c.telefono,c.puntos,t.id AS 'tienda',t.nombre_tienda,t.id_menbresia as 'cantidad',t.logo as 'logo',t.estado AS 'estado' 
            FROM cliente c inner join pais p on p.id_pais=c.id_pais 
            left JOIN  tienda t  ON c.id_cliente=t.cliente
            LEFT JOIN menbresia m ON m.id = t.id
            WHERE c.id_cliente= :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_client($array_update_client)
    {
        try {
            $sql = "UPDATE {$this->table} SET nombre_cliente=:nom,password_cliente=:pass1,direccion_cliente=:address,id_pais=:country,codigo_postal=:cod_pos,telefono=:telephone WHERE id_cliente=:id";
            $stm = $this->con->prepare($sql);
            foreach ($array_update_client as $key => $valor) {
                $stm->bindValue($key, $valor);
            }
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function select_id($email)
    {
        try {
            $sql = "SELECT id_cliente from  {$this->table} WHERE email_cliente=:email";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":email", $email);

            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }





    /*=================== ADD IMAGES CLIENT ===================*/
    function add_image($path)
    {
        try {
            $sql = "CALL add_images_cliente(:path);";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":path", $path);
            $stm->execute();

            return $stm->rowcount() > 0 ? 1 : 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /*=================== UPDATE CLIENT INTO admin-profile.php ===================*/
    function get_data_for_update($id)
    {
        try {
            $sql = "SELECT c.id_cliente,c.email_cliente,c.password_cliente,c.nombre_cliente,c.apellido_cliente,c.direccion_cliente,p.nombre_pais,c.tipo_documento,c.numero_documento,c.razon_social,c.ruc,c.telefono FROM cliente c INNER JOIN pais p ON c.id_cliente = p.id_pais WHERE id_cliente = :id";
            $stm = $this->con->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}