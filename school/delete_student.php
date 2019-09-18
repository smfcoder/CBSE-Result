<?php  
	include("conn.php");
	$id = $_GET['id'];
	$sid = $_GET['sid'];
	$q_s="SELECT * FROM student Where id='$id'";
	$e_q_s=mysqli_query($sql,$q_s);
	$row=mysqli_fetch_array($e_q_s);
	$c=$row['class'];
	$query = "DELETE FROM student WHERE id =$id";
	$q = "DELETE FROM result WHERE sid ='$sid'";
	if(mysqli_query($sql, $query))  
	{
	    
	    $e=mysqli_query($sql,$q);
		echo 'Data Deleted';
		header("location:view_student.php?class=$c");
	}  
 ?>