<?php
	include ("../config/db-conn.php");
	include("myfunctions.php");

	$id = $_GET['id'];
	
	$category_query = "SELECT * FROM category WHERE id = '$id' ";
	$category_query_run = mysqli_query($conn, $category_query);
	$category_data = mysqli_fetch_array($category_query_run);
	$image = $category_data['image'];

	$delete_query = "DELETE FROM category WHERE id = '$id' ";
	$delete_query_run = mysqli_query($conn, $delete_query);

	if ($delete_query)
	{
		if (file_exists("../uploads/".$image))
		{
			unlink("../uploads/".$image);
		}

		redirect("category.php", "Category Has Been Deleted");		
	}
	else
	{
		redirect("category.php", "Something went wrong");
	}
?>