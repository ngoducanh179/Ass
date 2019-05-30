<?php 
	include_once('database.php');
	include_once('function_category.php');
	include_once('function_user.php');
	include_once('function_product.php');
	
	$action = filter_input(INPUT_POST, 'action');
	if(empty($action)){
		$action = filter_input(INPUT_GET, 'action');
		if(empty($action)){
			// $action = 'login_system';
			$action = 'login_system';
		}
	}
	switch ($action) {
		case 'login_system':
			include_once('login.php');
			break;
		case 'list_categories':
			include_once('list_categories.php');
		case 'check_login_system':
			$username =filter_input(INPUT_POST, 'username');
			$password = filter_input(INPUT_POST, 'password');
			if(check_user($username,$password)){
				include_once('list_categories.php');
			}
			break;
		case 'add_new_category':
			include_once('add_category.php');
			break;
		case 'save_new_category':
			$categoryname = filter_input(INPUT_POST, 'categoryname');
			$description = filter_input(INPUT_POST, 'description');
			$by_user =filter_input(INPUT_POST, 'by_user');
			add_category($categoryname, $description,$by_user);
			include_once('list_categories.php');
			break;
		case 'edit_category':
			$categoryid = filter_input(INPUT_GET, 'categoryid');
			$category=get_category_by_id($categoryid);
			include_once('edit_category.php');
			break;
		case 'update_category':
			$categoryid = filter_input(INPUT_GET, 'categoryid');
			$categoryname = filter_input(INPUT_POST, 'categoryname');
			$description = filter_input(INPUT_POST, 'description');
			$by_user =filter_input(INPUT_POST, 'by_user');
			update_category($categoryid,$categoryname, $description,$by_user);
			include_once('list_categories.php');
		case 'delete_category':
			$categoryid = filter_input(INPUT_GET, 'categoryid');
			delete_category_by_id($categoryid);
			include_once('list_categories.php');
			break;
		default:
			# code...
			break;
	}
	
	//Controller for product
	switch ($action) {
		case 'add_new_product':
			include_once('add_product.php');
			break;
		case 'save_new_product':
			if($_FILES){
				//Get file name
				$name = $_FILES['file_image']['name'];
				$name = "images/products/".$name;
				//Move file
				move_uploaded_file($_FILES['file_image']['tmp_name'], $name);
				//Get file name
				$image = $_FILES['file_image']['name'];				
			}
			else{
				$image='';
			}
			$productname = filter_input(INPUT_POST, 'productname');
			$categoryid = filter_input(INPUT_POST, 'categoryid');
			$price = filter_input(INPUT_POST, 'price');
			$description =filter_input(INPUT_POST, 'description');
			$by_user  =filter_input(INPUT_POST, 'by_user');
			add_product($productname, $categoryid, $price, $description, $image,$by_user);
			
			$products = get_products();
			include_once('list_products.php');

			break;
		case 'list_products':
			$products = get_products();
			include_once('list_products.php');
			break;
		case 'edit_product':
			$productid=filter_input(INPUT_GET, 'productid');
			$product = get_product_by_id($productid);
			include_once('edit_product.php');
			break;
		case 'update_product':
			if($_FILES){
				//Get file name
				$name = $_FILES['file_image']['name'];
				$name = "images/products/".$name;
				//Move file
				move_uploaded_file($_FILES['file_image']['tmp_name'], $name);
				//Get file name
				$image = $_FILES['file_image']['name'];				
			}
			else{
				$image='';
			}
			$productid = filter_input(INPUT_POST, 'productid');
			$productname = filter_input(INPUT_POST, 'productname');
			$categoryid = filter_input(INPUT_POST, 'categoryid');
			$price = filter_input(INPUT_POST, 'price');
			$description =filter_input(INPUT_POST, 'description');
			$by_user  =filter_input(INPUT_POST, 'by_user');
			update_product($productid,$productname, $categoryid, $price, $description, $image,$by_user);
			
			$products = get_products();
			include_once('list_products.php');

			break;
		case 'delete_product':
			$productid = filter_input(INPUT_GET, 'productid');
			delete_product_by_id($productid);
			$products = get_products();
			include_once('list_products.php');
			break;

		default:
			# code...
			break;
	}

 ?>