<?php    
require_once("connection.php");
class Banner extends Connection{
  private $table = "banners";
  
  function __construct(){
      parent::__construct();
  }

  function update_banner($array_data,$image = false){
    try{
        $sql = "";
        if(!$image){  
            $sql = "UPDATE {$this->table} SET link_banner = :image , titulo_banner = :title , descripcion_banner = :desc WHERE id_banner = :id";
        }else{
            $sql = "UPDATE {$this->table} SET titulo_banner = :title , descripcion_banner = :desc WHERE id_banner = :id";
        }

        $stm = $this->con->prepare($sql);
        foreach($array_data as $key => $val){
            $stm->bindValue($key,$val);
        }

        $stm->execute();
        return "correcto";
    }catch(PDOException $err){
        return $err->getMessage();
    }    
  }

  function get_banners(){
    try{
        $sql = "SELECT * FROM {$this->table}";
        $stm = $this->con->query($sql);
        return $stm->fetchAll();
    }catch(PDOException $err){
        die($err->getMessage());
    }
  }

  function get_banner_id($id){
    try{
        $sql = "SELECT * FROM {$this->table} WHERE id_banner = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindValue(":id",$id);
        $stm->execute();

        return $stm->fetchAll();
    }catch(PDOException $err){
        die($err->getMessage());
    }   
  }

  /* BANNER PRINCIPAL */
  function get_banner_p(){
    try{
        $sql = "SELECT * FROM banner_p";
        $stm = $this->con->query($sql);
        return $stm->fetchAll();
    }catch(PDOException $e){
        return $e->getMessage();
    }
  }

  function get_banner_p_by_id($id){
    try{
        $sql = "SELECT * FROM banner_p WHERE id = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindValue(":id",$id);
        $stm->execute();

        return $stm->fetchAll();
    }catch(PDOException $e){
        return $e->getMessage();
    }
  }

  function update_banner_p($array_p){
    try{
        $sql = "UPDATE banner_p SET link_banner_p = :banner_p WHERE id = :id";
        $stm = $this->con->prepare($sql);
        foreach($array_p as $key => $val){
            $stm->bindValue($key,$val);
        }

        $stm->execute();
        return $stm->fetchAll();
    }catch(PDOException $err){
        return $err->getMessage();
    }    
  }
  /* BANNER DE PUBLICIDAD*/
  function get_banner_pub(){
    try{
        $sql = "SELECT * FROM banner_pub";
        $stm = $this->con->query($sql);
        return $stm->fetchAll();
    }catch(PDOException $e){
        return $e->getMessage();
    }
  }

  function get_banner_pub_by_id($id){
    try{
        $sql = "SELECT * FROM banner_pub WHERE id = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindValue(":id",$id);
        $stm->execute();

        return $stm->fetchAll();
    }catch(PDOException $e){
        return $e->getMessage();
    }
  }

  function update_banner_pub($array_pub, $image = false){
    try{
        $sql = "";
        if(!$image){  
            $sql = "UPDATE banner_pub SET link_banner_pub = :image , titulo_banner = :titulo_banner , descripcion_banner = :descripcion_banner WHERE id = :id";
        }else{
            $sql = "UPDATE banner_pub SET titulo_banner = :titulo_banner , descripcion_banner = :descripcion_banner WHERE id = :id";
        }

        $stm = $this->con->prepare($sql);
        foreach($array_pub as $key => $val){
            $stm->bindValue($key,$val);
        }

        $stm->execute();
        return "correcto";
    }catch(PDOException $err){
        return $err->getMessage();
    }    
  }
}