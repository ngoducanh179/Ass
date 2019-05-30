<?php 
	function get_users(){
		$db = getDB();// Connect to database
		$query ="SELECT * FROM users ORDER BY user_id";
		try {
			$statement = $db->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}
	function check_user($username,$password){
		//Get all user in database
		$list_user = get_users();
		$found = false;
		foreach ($list_user as $key => $value) {
			if($value['username']==$username && $value['password']==$password){
				$found = true;
				break;
			}
		}
		return $found;
	}

	 ?>