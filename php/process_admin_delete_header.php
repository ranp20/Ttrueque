<?php

session_start();
require_once 'class/header_titles.php';

function error_message($msg, $location)
{
	$msg = $_SESSION['error'];
	header("Location: $location");
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$h = new Header_Titles();
	if ($id) {
		$res = $h->delete_header_titles($id);
	} else {
		error_message("Error al eliminar el registro", "../admin/manage-header-titles.php");
	}
}

header('Location: ../admin/manage-header-titles.php');
