<?php
	include("db-conn.php");

	function getAll($table)
	{
		global $conn;
		$query = "SELECT * FROM $table";
		return $query_run = mysqli_query($conn, $query);
	}

	function getByID($table, $id)
	{
		global $conn;
		$query = "SELECT * FROM $table where id='$id' ";
		return $query_run = mysqli_query($conn, $query);
	}

	function redirect($url, $message)
	{
		$_SESSION['message'] = $message;
		header('Location: '.$url);
		exit();
	}

	function getCartItems()
	{
		global $conn;
		if(isset($_SESSION['auth']))
		{
			$userId = $_SESSION['auth_user']['user_id'];
		}
		else
		{
			//using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
			$userId = getenv("REMOTE_ADDR") ;                     
		}		
		$query = "SELECT c.id as cid, c.prod_id, c.prod_qty, c.price, c.total_price, p.id as pid, p.name, p.image, p.price  FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
		return $query_run = mysqli_query($conn, $query);	
	}

	function getOrders()
	{
		global $conn;
		if(isset($_SESSION['auth_user']))
		{
			$userId = $_SESSION['auth_user']['user_id'];        
		}
		else
		{
			$userId = getenv("REMOTE_ADDR") ;                     
		}
		$order_query = "SELECT * FROM orders where user_id='$userId' ";		
		return $order_query_run = mysqli_query($conn, $order_query);			
	}

	function getWishlist()
	{
		global $conn;
		if(isset($_SESSION['auth_user']))
		{
			$userId = $_SESSION['auth_user']['user_id'];        
		}
		else
		{
			$userId = getenv("REMOTE_ADDR") ;                     
		}
		$query = "SELECT w.id as wid, w.prod_id, w.price, p.id as pid, p.name, p.image, p.price  FROM wishlist w, products p WHERE w.prod_id=p.id AND w.user_id='$userId' ORDER BY w.id DESC ";		
		return $query_run = mysqli_query($conn, $query);			
	}

	function getWallet()
	{
		global $conn;
		if(isset($_SESSION['auth_user']))
		{
			$userId = $_SESSION['auth_user']['user_id'];        
		}
		else
		{
			$userId = getenv("REMOTE_ADDR") ;                     
		}
		$order_query = "SELECT * FROM wallet_transactions where user_id='$userId' ";		
		return $order_query_run = mysqli_query($conn, $order_query);			
	}

	function getAllActive($table)
	{
		global $conn;
		$query = "SELECT * FROM $table WHERE status ='1' ";
		return $query_run = mysqli_query($conn, $query);
	}

	function checkPaymentId($payment_id)
	{
		global $conn;
		if(isset($_SESSION['auth_user']))
		{
			$userId = $_SESSION['auth_user']['user_id'];        
		}
		else
		{
			$userId = getenv("REMOTE_ADDR") ;                     
		}
		$query = "SELECT * FROM orders WHERE payment_id='$payment_id' AND user_id='$userId'";
		return mysqli_query($conn, $query);
	}
?>