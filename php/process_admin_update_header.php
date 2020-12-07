<?php 

	session_start();

	if(isset($_POST['submit'])){
		$id = $_POST['id_title'];
		$titulo = $_POST['name_title'];

		require_once 'class/header_titles.php';
		$h = new Header_Titles();

		$res = $h->update_header_titles($titulo,$id);
		if($res){
			$_SESSION['message'] = "Se actualizó el título";
			header('Location: ../admin/manage-header-titles.php');
		}else{
			$_SESSION['message'] = "Error al actualizar";
			header('Location: ../admin/manage-header-titles.php');
		}
		
	}else{
		$_SESSION['message'] = "Acceso Denegado";
		header('Location: ../admin/manage-header-titles.php');
	}
