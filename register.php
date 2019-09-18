<?php
    session_start();
    include("conn.php");
    $error = '';
    if(isset($_POST['submit'])){
        
        $name= $_POST['school_name'];
        $email= $_POST['school_email'];
        $principal_name= $_POST['principal_name'];
        $address=$_POST['address'];
        $user= $_POST['school_user'];
        $pass = $_POST['school_pass'];
        $phone= $_POST['contact_no'];
        $status = 0;
        $sql_u = "SELECT * FROM school WHERE username LIKE '%$user%' OR email LIKE '%$email%'";
        
        $res_u = mysqli_query($sql, $sql_u);
        if (mysqli_num_rows($res_u) > 0) {
            $_SESSION['registration'] = 'already';
        }
        else{
            $ins="INSERT INTO school(name,email,name_principal,school_add,contact_no,username,pass,status) values('$name','$email','$principal_name','$address','$phone','$user','$pass','$status');";

            if(mysqli_query($sql,$ins)) {
                $_SESSION['registration'] = 'success';
            }   
            else {
                $_SESSION['registration'] = 'failed';

            }
        } 
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>School Registration</title>
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #293a4a;
            color: white;
            text-align: center;
        }
       
        .login-form {
		max-width: 840px;
    	margin: 40px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    </style>
  </head>
  <body class="text-center">
      <?php

    if(isset($_SESSION['registration'])) {
        if($_SESSION['registration']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['registration']);
        }
        else if($_SESSION['registration']=='already') {
            echo '<script>alert("Already registered")</script>';
            unset($_SESSION['registration']);
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration</script>';
            unset($_SESSION['registration']);
        }
    }
?>    
     <div class="login-form"> 
    <form action="" method="post">
        <div class="form-group">
        <img src="img/school_reg.jpg" style="width:120px; height:120px;"></img></div>
        <h3>School Registration</h3>
        <div class="form-group">
            <input type="text" name="school_name" class="form-control" placeholder="Name of School" required="required">
        </div>
        <div class="form-group">
            <input type="email" name="school_email" class="form-control" placeholder="Email" required="required">
        </div>
                <div class="form-group">
            <input type="text" name="principal_name" class="form-control" placeholder="Name of Principal" required="required">
        </div>
        <div class="form-group">
            <textarea type="text" name="address" class="form-control" placeholder="School Address" required="required"></textarea>
        </div>
        <div class="form-group">
            <input type="tel" pattern="[789][0-9]{9}" name="contact_no" class="form-control" placeholder="Contact No. (Mobile No)" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="school_user" class="form-control" placeholder="User Name" required="required">
        </div>
        <div class="form-group">
            <input type="password" id="pass" name="school_pass" class="form-control" placeholder="Password" required="required">
        </div>
        
        <div class="form-group">
            <input type="password" id="repass" name="school_repass" class="form-control" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" onclick="return Validate()"  class="btn btn-primary btn-block">Register</button>
        </div>
        
    </form>
    </div>
    <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("pass").value;
        var confirmPassword = document.getElementById("repass").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
    <div style="padding: 30px;"></div>

    
    <div class="footer">
        <p class="text-center">Design and Develop by
          <a href="http://padmasoft.padmaacademy.com/">
            <strong>PadmaSoft</strong>
          </a>
        </p>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>