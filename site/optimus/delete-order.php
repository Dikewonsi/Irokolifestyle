<?php
	include ("../config/db-conn.php");
	include("myfunctions.php");

	$payID = $_GET['payID'];
	
	$order_id_query = "SELECT * FROM orders WHERE payment_id = '$payID' ";
	$order_id_query_run = mysqli_query($conn, $order_id_query);	
    $order_data = mysqli_fetch_array($order_id_query_run);
	
    $order_id = $order_data['id'];

	$delete_query = "DELETE FROM orders WHERE payment_id = '$payID' ";
	$delete_query_run = mysqli_query($conn, $delete_query);

	if ($delete_query_run)
	{
		$delete_order_items_query = "DELETE FROM order_items WHERE order_id = '$order_id' ";
	    $delete_order_items_query_run = mysqli_query($conn, $delete_order_items_query);

        if($delete_order_items_query_run)
        {
            redirect("order-list.php", "Order Has Been Deleted");		
        }
	}
	else
	{
		redirect("order-list.php", "Something went wrong");
	}
?>