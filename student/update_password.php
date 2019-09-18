<?php

session_start();
 $sname=$_SESSION['userId'];
if(!isset($_SESSION['userId']))
{
    header('location:../student_log.php');
    exit();
   
}
?>
<?php
  include("changepass_conn.php");
  if(isset($_POST['submit'])):
  extract($_POST);
  if($old_password!="" && $password!="" && $confirm_pwd!="") :
   $sname=$_SESSION['userId'];
  $old_pwd=(mysqli_real_escape_string($db,$_POST['old_password']));
  $pwd=(mysqli_real_escape_string($db,$_POST['password']));
  $c_pwd=(mysqli_real_escape_string($db,$_POST['confirm_pwd']));
  if($pwd == $c_pwd) :
  if($pwd!=$old_pwd) :
    $sql="SELECT * FROM `student` WHERE `username`='$sname' AND `pass` ='$old_pwd'";
    $db_check=$db->query($sql);
    $count=mysqli_num_rows($db_check);
  if($count==1) :
    $fetch=$db->query("UPDATE `student` SET `pass` = '$pwd' WHERE `username`='$sname'");
    $old_password=''; $password =''; $confirm_pwd = '';
    $msg_sucess = "Your new password updated successfully.";
    header("Location: student_details.php/");
  else:
    $error = "<script>alert('The Old password you gave is incorrect.');</script>";

  endif;
  else :
    $error = "<script>alert('Old password new password same Please try again.')</script>";

  endif;
  else:
    $error = "<script>alert('New password and confirm password do not matched.')</script>";

  endif;
  else :
    $error = "<script>alert('Please fil all the fields.')</script>";

  endif;   
  endif;
  
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <style>
        <style type="text/css">
.error{
margin-top: 10px;
margin-bottom: 0;
margin-left: 100px;
color: #fff;
background-color: #D65C4F;
display: table;
padding: 5px 8px;
font-size: 25px;
font-weight: 600;
line-height: 30px;
  }
.green{
margin-top: 10px;
margin-bottom: 0;
text-align:center;
color: #fff;
background-color: green;
display: table;
padding: 5px 8px;
font-size: 25px;
font-weight: 600;
line-height: 30px;
  }
.box{
    border:2px solid black;
    padding:35px;
}
</style>
    <?
        include('header.php');
    ?>
  <div class="container" style="margin-top:50px;">
      <div class="box"> 
        <form method="post" autocomplete="off" id="password_form" class="needs-validation" action="update_password.php" novalidate>
            <div class="form-group">
                <label for="oldpassword">Old Password:</label>
                <input type="password" class="form-control" id="oldpassword" placeholder="Old Password" name="old_password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group">
                <label for="newpassword">New Password:</label>
                <input type="password" class="form-control" id="password" placeholder="New Password" name="password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group">
                <label for="confirmpassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_pwd" placeholder="Confirm Password" name="confirm_pwd" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I agree to change password myself.
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <center>
    <div class="submit">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
    </center>


    <div class="<?=(@$msg_sucess=="") ? 'error' : 'green' ; ?>" id="logerror">
     <?php echo @$error; ?><?php echo @$msg_sucess; ?>
    </div>
</form>
</div>
</div>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>