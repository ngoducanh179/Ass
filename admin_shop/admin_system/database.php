<?php 
	function getDB(){
		$dsn = "mysql:host=localhost;dbname=my_shop";
		$username = "root";
		$password = '';
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		
		try {
			$db = new PDO($dsn, $username, $password,$options);
			return $db;					
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error connecting to database".$error_message; 
		}
	}
 ?>