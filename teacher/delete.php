<?php  
	include("conn.php");
	$id = $_GET['id'];
	$sid = $_GET['sid'];
	$query = "DELETE FROM student WHERE id =$id";
	$q = "DELETE FROM result WHERE sid ='$sid'";
	if(mysqli_query($sql, $query))  
	{
	    
	    $e=mysqli_query($sql,$q);
		echo 'Data Deleted';
		header('location:teacher_af_log.php');
	}  
 ?>