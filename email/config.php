<?php


error_reporting(0);
session_start();

/* DATABASE CONFIGURATION */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'disenode_use2020');
define('DB_PASSWORD', 't(l=f,yx0Go(');
define('DB_DATABASE', 'disenode_base2020');
define("BASE_URL", "https://app.disenodelivery.com/app/");
define("SITE_TOKEN", '123456789');


function getDB() 
{
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbConnection->exec("set names utf8");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}
