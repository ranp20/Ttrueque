<?php 

session_start();
require_once("class/product.php");
$p = new Product();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $res = $p->delete_data_admin($id);   
}
header("Location: ../admin/manage-items.php");

