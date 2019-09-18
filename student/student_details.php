<?php

session_start();
 $sname=$_SESSION['userId'];
if(!isset($_SESSION['userId']))
{
    header('location:../student_log.php');
    exit();
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  
  
</head>
<body style="background-color: #f7faff;">
   
<?php
    include("conn.php");
    include("header.php");
?>
<div class="container mt-3">
 <center><h2 style="padding: 10px;"><u>Student Detail Search</u></h2> </center>
  
  <form>
      
      <?php
                include("conn.php");
                $query="SELECT * FROM student WHERE username='$sname'";
                $result = mysqli_query($sql, $query);
                $menu = '';
                while($row = mysqli_fetch_array($result)){
                    if($sname==$row["username"]){ ?>
                <?php    echo'
                
                
                
                
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Student First Name:</label>
            <div class="col-sm-10">          
      <input type="text" class="form-control" placeholder="First Name" disabled="" style="background-color: white;border-color: black;" value='.$row["sfname"].' >
            </div>
    </div>
      
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Student Middle Name:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" placeholder="Middle Name" disabled="" style="background-color: white;border-color: black;" value= '.$row["smname"].' >
               </div>
    </div>
      
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Student Last Name:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" placeholder="Last Name" disabled="" style="background-color: white;border-color: black;" value= '.$row["slname"].'  > 
        </div>
        </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Roll Number:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" disabled="" style="background-color: white;border-color: black;" value='.$row["rollno"].'>
    </div>
    </div>
    

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Class:</label>
            <div class="col-sm-10">  
            <input type="text" class="form-control" disabled="" placeholder="Class" style="background-color: white;border-color: black;" value='.$row["class"].'>
      </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Birthdate:</label>
            <div class="col-sm-10">  
            <input type="text" class="form-control" disabled="" style="background-color: white;border-color: black;" value='.$row["birthdate"].'>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Gender:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" disabled="" style="background-color: white;border-color: black;" value='.$row["gender"].'>
      </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Aadhar Number:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" disabled="" style="background-color: white;border-color: black;" value='.$row["aadharno"].'>
      </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Parent Mobile Number:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" disabled="" style="background-color: white;border-color: black;" value='.$row["pmobno"].'>
      </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Father Name:</label>
            <div class="col-sm-10">  
      <textarea type="text" rows=1 class="form-control" disabled="" placeholder="First Name" style="background-color: white;border-color: black;">'.$row["fathername"].'</textarea>
      </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mother Name:</label>
            <div class="col-sm-10">  
      <textarea type="text" rows=1 class="form-control" disabled="" placeholder="First Name" style="background-color: white;border-color: black;">'.$row["mothername"].'</textarea>
      </div>
    </div>

<style>
textarea {
  resize: none;
}
textarea.ta10em {
  height: 10em;
}
</style>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Address:</label>
            <div class="col-sm-10">  
    <textarea type="text" rows=2 class="form-control" disabled="" style="background-color: white;border-color: black;">'.$row["address"].'</textarea>
    </div>
</div>
    
    
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Username:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" disabled="" style="background-color: white;border-color: black;" value='.$row["username"].'>
      </div>
    </div>
    
     <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-10">  
      <input type="text" class="form-control" disabled="" style="background-color: white;border-color: black;" value='.$row["pass"].'>
      </div>
    </div>';
    
                    }
                } ?>

  </form>

</div>
<div class="container mt-3">
        <center style="padding: 20px;">
            <!--<button type="button" onclick="printContent('1')" class="btn btn-outline-primary waves-effect" style="border-radius:50px;width:30%;"> Print </button>-->
            <a href="update_password.php"><button type="button" class="btn btn-outline-danger" style="border-radius:50px;width:30%;"> Change Password </button></a>
            <a href="student_af_log.php"><button type="button" class="btn btn-outline-success" style="border-radius:50px;width:30%;"> Back </button></a>
        </center>
</div>
<style>
    .footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 0rem;
  background-color: #efefef;
  text-align: center;
}
html {
  height: 100%;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}
body {
  position: relative;
  margin: 0;
  padding-bottom: 6rem;
  min-height: 100%;
}
</style>
<footer class="footer" style="">
    <font color="black">
    <div class="footer-copyright text-center py-3" style="">Designed and Develeoped By :
        <a href="http://padmasoft.padmaacademy.com/"> Padmasoft</a>
    </div>
    </font>
</footer>


</body>
</html>

