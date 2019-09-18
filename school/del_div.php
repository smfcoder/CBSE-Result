<?php  
	include("conn.php");
	$id = $_GET['id'];
	$q="SELECT class_div FROM class Where id='$id' ";
	$row=mysqli_num_rows($q);
	$result = mysqli_query($sql, $q);  
    $rows = mysqli_num_rows($result);
    if($rows > 0)  
    {  
        $row = mysqli_fetch_array($result);  
    
            $std=$row['class_div'];
        
    }    
	$qu="SELECT * FROM teacher";
	$ro=mysqli_num_rows($qu);
	$resul = mysqli_query($sql, $qu);  
    $ro = mysqli_num_rows($resul);
    if($ro > 0)  
    {  
        while($rowc = mysqli_fetch_array($resul))  
        {
            if($std==$rowc['class'])
            {
                 $fetch="UPDATE teacher SET class='NA' Where id='".$rowc['id']."' ";
                 $ew=mysqli_query($sql,$fetch);
            }
        }
    }    
	
	$query = "DELETE FROM class WHERE id =$id";  
	if(mysqli_query($sql, $query))  
	{  
		header('location:add_division.php');
	}  
 ?>
