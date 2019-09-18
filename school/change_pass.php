<?php

session_start();
 $sname=$_SESSION['schoolId'];
if(!isset($_SESSION['schoolId']))
{
    header('location:../school_log.php');
    exit();
   
}

?>

<?php
  include("changepass_conn.php");
  if(isset($_POST['submit'])):
  extract($_POST);
  if($old_password!="" && $password!="" && $confirm_pwd!="") :
  $sname=$_SESSION['schoolId'];
  $old_pwd=(mysqli_real_escape_string($db,$_POST['old_password']));
  $pwd=(mysqli_real_escape_string($db,$_POST['password']));
  $c_pwd=(mysqli_real_escape_string($db,$_POST['confirm_pwd']));
  $uniqueuser=$_POST['id'];
  
  
  
  if($pwd == $c_pwd) :
  if($pwd!=$old_pwd) :
    $sql="SELECT * FROM `school` WHERE `id`='$uniqueuser' AND `pass` ='$old_pwd'";
    $db_check=$db->query($sql);
    $count=mysqli_num_rows($db_check);
   
  if($count==1) :
    $fetch=$db->query("UPDATE `school` SET `pass` = '".$pwd."' WHERE `username`='".$sname."' ");
    $old_password=''; $password =''; $confirm_pwd = '';
    $msg_sucess = "Your new password updated successfully.";
    header("Location: change_pass.php");
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

<!DOCTYPE html>
<html lang="en">

 <?php
        include('main/head.php');
  ?>


<body id="page-top">

  <?php
        include('main/nav.php');
  ?>

  <div id="wrapper">

   <?php
        include('main/side.php');
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Change Password</a>
          </li>
        </ol>
        <div class="panel-body">
        <form method="post" autocomplete="off" id="password_form" class="needs-validation" action="change_pass.php" novalidate>
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
        <input class="form-check-input" type="checkbox" name="remember" style="height:15px;width:15px;" required> I agree to change password.
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    
    <?php
                
                include("changepass_conn.php");
                 $query="SELECT * FROM school ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    $id= $row['id'];
                                
                                           
                                }
                            }
    
    ?>
    
    <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
            </div>
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
     
      <!-- Sticky Footer -->
     <?php
            include("main/footer.php");
      ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
