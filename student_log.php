<?php
    session_start();
    if(isset($_SESSION['userId'])) {
        unset($_SESSION['userId']);
    }
    include('conn.php');
   if(isset($_POST['submit'])){
        $login = $_POST['user'];
        $pass = $_POST['pass'];
       $db="SELECT * FROM student WHERE username='$login' and pass = '$pass'";
       $result=mysqli_query($sql, $db);
       $row = mysqli_fetch_array($result);
       if($row['username']==$login && $row['pass']==$pass)
       {
       		$_SESSION['userId']=$login;   
           header('Location:student/student_af_log.php');
            exit();
       }
       else{
          echo '<script type="text/javascript">alert("Inncorect username or password");</script>';
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

    <title>Student/Parent Login</title>
    <style>
    .login-form {
		width: 340px;
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
      
     <div class="login-form"> 
    <form action="" method="post">
        <div class="form-group">
        <img src="img/parent_login_icon.png"></img></div>
        <h3>Login As Student/Parent</h3>
        <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
      <!--  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                Forgot Password?
            </button>-->
    </form>
    </div>
    
  
    
    
    
   <?php
        include('footer.php');
   ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>