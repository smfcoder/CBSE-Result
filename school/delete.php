<?php  
	include("conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM teacher WHERE id =$id";  
	if(mysqli_query($sql, $query))  
	{  
		
		header('location:school_af_log.php');
	}  
 ?>