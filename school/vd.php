<?php
    
    include("conn.php");
    $class_id=$_GET['class'];
    
        $status=1;
        $qq="SELECT * FROM class ;";
        $eqq=mysqli_query($sql,$qq);
        $upd="Update class SET dd = '$status' Where class_div='$class_id' ;";
        $qqqq=mysqli_query($sql,$upd);
        header('location:del_expo_class.php');
      

?>