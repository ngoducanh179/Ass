<?php 
	function get_categories(){
		$db = getDB();// Connect to database
		$query ="SELECT * FROM categories ORDER BY categoryid";
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

	function add_category($categoryname, $description,$by_user){
		$db = getDB();// Connect to database
		$query ="INSERT INTO categories(categoryname, description, by_user)
				VALUES (?,?,?)";
		try {
			$statement = $db->prepare($query);
			$statement->bindParam(1,$categoryname);
			$statement->bindParam(2,$description);
			$statement->bindParam(3,$by_user);
			$statement->execute();
			$statement->closeCursor();			
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function get_category_by_id($categoryid){
		$db = getDB();// Connect to database
		$query ="SELECT * FROM categories 
				WHERE categoryid=? 
				ORDER BY categoryid";
		try {
			$statement = $db->prepare($query);
			$statement->bindParam(1,$categoryid);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function delete_category_by_id($categoryid){
		$db = getDB();// Connect to database
		$query ="DELETE  FROM categories 
				WHERE categoryid=?";
		try {
			$statement = $db->prepare($query);
			$statement->bindParam(1,$categoryid);
			$statement->execute();			
			$statement->closeCursor();		
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function update_category($categoryid,$categoryname,$description,$by_user){
		$db = getDB();// Connect to database
		$query ="UPDATE categories
				SET  categoryname =?,
					 description=?,
					 by_user=?					 
				WHERE categoryid=?";
		try {
			$statement = $db->prepare($query);			
			$statement->bindParam(1,$categoryname);
			$statement->bindParam(2,$description);	
			$statement->bindParam(3,$by_user);			
			$statement->bindParam(4,$categoryid);
			$statement->execute();			
			$statement->closeCursor();		
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}
 ?>