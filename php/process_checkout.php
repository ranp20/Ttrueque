<?php
session_start();
if(isset($_POST["check-arr"])){
    $_SESSION["checkout_store"] = json_decode($_POST["check-arr"]);
    header('location:"./checkout"');
}else{
    echo json_encode($_SESSION["checkout_store"]);
}