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

    include("conn.php");
    $error = '';
    if(isset($_POST['submit'])){
        
        $schoolusername= $_POST['school_username'];
        $schoolpassword= $_POST['school_password'];
        $t1username=$_POST['t1username'];
        $t1password= $_POST['t1password'];
        $t2username= $_POST['t2username'];
        $t2password = $_POST['t2password'];
       
        $tp1 = "SELECT * FROM teacher Where username='$t1username' AND pass='$t1password'; ";
        $tpp1=mysqli_query($sql,$tp1);
        $row_t1=mysqli_fetch_array($tpp1);
        $rows_t1_num=mysqli_num_rows($tpp1);
        
        $tp2 = "SELECT * FROM teacher Where username='$t2username' AND pass='$t2password'; ";
        $tpp2=mysqli_query($sql,$tp2);
        $row_t=mysqli_fetch_array($tpp2);
         $rows_t2_num=mysqli_num_rows($tpp2);
        
        
        $sp="SELECT * From school Where username='$schoolusername' AND pass='$schoolpassword';";
        $spp=mysqli_query($sql,$sp);
        $row_s=mysqli_fetch_array($spp);
        $rows_sp_num=mysqli_num_rows($spp);
        
        if($rows_sp_num > 0)
        {
            $flagsp=1;
        }
        else
        {
            $flagsp=0;
             $_SESSION['del']='ivs';
        }
        
        
        if($rows_t2_num > 0)
        {
            $flagt2=1;
        }
        else
        {
            $flagt2=0;
            $_SESSION['del']='ivt2';
        }
        
        
        if($rows_t1_num > 0)
        {
            $flagt1=1;
        }
        else
        {
            $flagt1=0;
            $_SESSION['del']='ivt1';
        }
        
        if($flagsp==1 && $flagt1 == 1 && $flagt2==1)
        {
           $del_r="TRUNCATE TABLE result;";
                    $ex_del_r=mysqli_query($sql,$del_r);
                    
                    $del_c="TRUNCATE TABLE class;";
                    $ex_del_c=mysqli_query($sql,$del_c);
                    
                    $del_s="TRUNCATE TABLE student;";
                    $ex_del_s=mysqli_query($sql,$del_s);
                    
                    $del_t="TRUNCATE TABLE teacher;";
                    $ex_del_t=mysqli_query($sql,$del_t);
                    
                    
                    $_SESSION['del']='success'; 
        }
        
       
       
      
    }  
?>

<!DOCTYPE html>
<html lang="en">

 <?php
        include('main/head.php');
  ?>


<body id="page-top">
<?php

    if(isset($_SESSION['del'])) {
        if($_SESSION['del']=='success')   {
            echo '<script>alert("Delete Success")</script>';
            unset($_SESSION['del']);
        }
        else if($_SESSION['del']=='ivs') {
            echo '<script>alert("School Username Or Password Invalid")</script>';
            unset($_SESSION['del']);
        }
        else if($_SESSION['del']=='ivt1') {
            echo '<script>alert("Teacher 1 Username Or Password Invalid")</script>';
            unset($_SESSION['del']);
        }
        else{
            echo '<script>alert("Teacher 2 Username Or Password Invalid")</script>';
            unset($_SESSION['del']);
        }
        
    }
?>    
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
            <a>DELETE RECORD</a>
          </li>
        </ol>
<center>
<img src="Warning1.png" alt="warning" class="img-fluid">
</center>
        <div class="panel-body">
            
            
        <center> 
        <h1 style="color:red;">It will delete all record of student, teacher and result. </h1>
        
        <a href="del_expo_class.php"><button class="btn btn-primary btn-lg" style="margin:20px;width:30%;" >Export Data</button></a>
        
        </center>    
            
            
            
            
            
        <form method="post" autocomplete="off" id="password_form" class="needs-validation" action="delete_all.php" novalidate>
             <div class="form-group row">
                <label class="col-sm-2 col-form-label">School Username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="schoolusername" placeholder="School Username" name="school_username" required>
                    </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">School Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="schoolpassword" placeholder="School Password" name="school_password" required>
                    </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teacher 1 Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="t1username" placeholder="Teacher 1 Username" name="t1username" required>
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teacher 1 Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="t1password" placeholder="Teacher 1 Password" name="t1password" required>
                    </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
             <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teacher 2 Username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="t2username" placeholder="Teacher 2 Username" name="t2username" required>
                    </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teacher 2 Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="t2password" placeholder="Teacher 2 Password" name="t2password" required>
                    </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <center>
            <div class="form-group form-check">
                <label class="form-check-label" style="margin:20px;">
                    <input class="form-check-input" type="checkbox" name="remember" style="height:15px;width:15px;" required> I agree to <font color="red"> Delete </font> all the Data and Records of Students and Teachers.
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                </label>
            </div>
            </center>
  
   
                        <?php  
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM teacher ORDER BY id ASC";
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            $flag=1;
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    $x=$row['class'];
                                    $q="SELECT dd FROM class Where class_div='$x';";
                                    $exq=mysqli_query($sql,$q);
                                    $rowc=mysqli_fetch_array($exq);
                                    if($rowc['dd']==0)
                                    {
                                        $flag=0;
                                    }
                                }  
                            }  
                        ?>
    
    <?php
            if($flag==1){
    ?>
    <center>
    <div class="submit">
        <button name="submit" type="submit" class="btn btn-primary btn-lg" style="margin:20px;">Submit</button>
    </div>
    </center>
    <?php
            }
            else{
    ?>
    
    <center>
        <h5>Submit Button is Disabled</h5>
    <h6 style="color:red;">(Click on Export data to enable submit button)</h6>
    <div class="submit">
        <button class="btn btn-primary btn-lg" style="margin:20px;" disabled>Submit</button>
    </div>
    </center>
    
    <?php
                }
    ?>
     
            
    
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
