<?php    
    include ("db-conn.php");

    function getAllOrders()
    {
        global $conn;
        $query = "SELECT * FROM orders ";
        return $query_run = mysqli_query($conn, $query);
    }

    function checkPaymentId($payment_id)
	{
		global $conn;		
		$query = "SELECT * FROM orders WHERE payment_id='$payment_id'";
		return mysqli_query($conn, $query); 
	}

    function checkOrderID($orderID)
	{
		global $conn;		
		$query = "SELECT * FROM orders WHERE id='$orderID'";
		return mysqli_query($conn, $query); 
	}
 ?>