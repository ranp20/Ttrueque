<?php 

session_start();

require_once "../../php/class/client.php";
$client = new Client();

$pass =  password_hash($_POST['pass'], PASSWORD_BCRYPT, array('cost' => 12));

//print_r($_POST);

if (isset($_POST)) {
  $data = [
    "mail" => $_POST["email"],      
  ];

  $data = $client->verify_login($data);

  if($data != []){
    
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
  }else{
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