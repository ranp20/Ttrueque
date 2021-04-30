<?php 

	session_start();
	if(isset($_POST["adm_up"])){
		require_once 'class/admin.php';
		$adm = new Admin();

		$edit = [
			"nom" => $_POST['name_adm'],
			"mail" => $_POST['email_adm'],
			"tel" => $_POST['tel_adm'],
			"dire" => $_POST['dir_adm'],
			"id" => $_POST['id_adm']
		];
		
		$res = $adm->update_admin($edit);

	}else{
		$_SESSION['error'] = "Error al actualizar la información";
		header('Location: ../admin/manage-admin.php');
	}