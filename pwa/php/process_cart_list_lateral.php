<?php
session_start();
$res = $_SESSION["buy_cart"];

echo json_encode($res);