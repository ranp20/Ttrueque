<?php

session_start();

if(isset($_GET['id'])){
	require_once 'class/tipo_unidad.php';

	$id = $_GET['id'];

	$tp = new Tipo_unidad();
	$res = $tp->delete_tipo_unidad($id);
}

header('Location: ../admin/manage-tipe-unit.php');