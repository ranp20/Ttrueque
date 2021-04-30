<?php
    require_once("connection.php");
    class Admin extends Connection{
        function __construct(){
            parent::__construct();
        }

        function login_admin($user,$pass){
            try{
                $sql = "SELECT * FROM administrativo WHERE username_admin = :user AND password_admin = :pass";
                $stm = $this->con->prepare($sql);
                $stm->bindValue(":user",$user);
                $stm->bindValue(":pass",$pass);
                $stm->execute();

                return count($stm->fetchAll()) == 1 ? "ok" : "fail";
            }catch(PDOException $err){
                return "error";
            }
        }

        function change_password($user,$oldpass,$newpass){
            try{
                $sql = "CALL change_password(:user,:oldpass,:newpass);";
                $stm = $this->con->prepare($sql);
                $stm->bindValue(":user",$user);
                $stm->bindValue(":oldpass",$oldpass);
                $stm->bindValue(":newpass",$newpass);
                $stm->execute();

                return $stm->rowCount() > 0 ? "ok" : "fail";
            }catch(PDOException $err){
                return "error";
            }            
        }

        function get_admin(){
            try{
                $sql = "SELECT * FROM administrativo";
                $stm = $this->con->query($sql);
                $stm->execute();

                return $stm->fetchAll();
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        function get_admin_by_id($id){
            try{    
                $sql = "SELECT * FROM administrativo WHERE id_admin = :id";
                $stm = $this->con->prepare($sql);
                $stm->bindValue(":id",$id);
                $stm->execute();

                return fetchAll();
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        function update_admin($editables){
            try{
                $sql = "UPDATE administrativo SET nombre_admin = :nom,email_admin=:mail,telefono_admin=:tel,direccion_admin=:direc WHERE id_admin = :id";
                $stm = $this->con->prepare($sql);
                foreach ($editables as $key => $value) {
                    $stm->bindValue($key,$value);
                }
                $stm->execute();

                return $stm->fetchAll();                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        function get_idprodadmin(){
            try{
                $sql = "SELECT id_admin FROM product_admin ORDER BY id_admin DESC LIMIT 1;";
                $stm = $this->con->query($sql);
                $stm->execute();

                return $stm->fetchAll();
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }