<?php
include ("../config/db-conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = {$id}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>User Successfully Deleted</p>";
	header("Location:all-users.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>User Not Deleted. Something went wrong</p>";
	header("Location:all-users.php?msg=$msg");
}
mysqli_close($conn);
?>