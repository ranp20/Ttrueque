<?php 

// $password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));

// if(isset($_POST)){
// 	require_once '../controllers/verify-user-login.php';
// 	$loginUser = new VerifyLoginUser();

// 	$arr_verify = [
// 		"email" => $_POST['email'],
// 	];
	
// 	$verify = $loginUser->verifyUser($arr_verify);

// 	if($verify != []){

// 		if(password_verify($_POST['password'], $verify[0]["password_cliente"]) && password_verify('enabled', $verify[0]["estado"])){
			
// 			require_once '../controllers/get_user-by-id.php';
			
// 			$id = $verify[0]['id_cliente'];
// 			$getUser = new getUserData();
// 			$getID = $getUser->getData($id);

// 			if($getID > 0){
// 				session_start();
				
// 				//$_SESSION['user'] = $_SESSION['user'];
// 				$_SESSION['user'] = $getID;
				
// 				$response = [
// 					'response' => 'true'
// 				];
// 			}else{
// 				echo "Error al validar los datos del usuario";
// 			}

// 		}else{
// 			$response = [
// 				'response' => 'false'
// 			];
// 		}
// 	}else{
// 		$response = [
// 			'response' => 'false'
// 		];
// 	}
// }

// die(json_encode($response));

session_start();

require_once "../../php/class/client.php";
$client = new Client();

$pass =  password_hash($_POST['pass'], PASSWORD_BCRYPT, array(
    'cost' => 12
));

//print_r($_POST);

if (isset($_POST)) {
  $data = [
    "mail" => $_POST["email"],      
  ];

  $data = $client->verify_login($data);
  if (password_verify($_POST['pass'], $data[0]["password_cliente"]) && password_verify('enabled', $data[0]["estado"])) {
    $_SESSION["user"] = $data[0]["id_cliente"];
    
    $response = [
			'response' => 'true'
		];
      
  } else {
    $response = [
			'response' => 'false'
		];
  }
} else {
  $response = [
		'response' => 'false'
	];
}

die(json_encode($response));