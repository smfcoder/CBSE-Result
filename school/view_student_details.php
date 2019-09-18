<?php

session_start();
 $sname=$_SESSION['schoolId'];
    $class_id= $_GET['class'];
    if(!isset($_SESSION['schoolId']))
    {
        header('location:../school_log.php');
        exit();
    }
 $id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

 <?php
        include('main/head.php');
  ?>


<body id="page-top">
    
    <?php
    include("conn.php");
    $error = '';
   

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
            <a>Edit Student Details</a>
          </li>
        </ol>
    <form method="POST" action="edit_student_details.php">
        <?php
                include("conn.php");
                $query="SELECT * FROM student ORDER BY id ASC";
                $result = mysqli_query($sql, $query);
                $menu = '';
                while($row = mysqli_fetch_array($result)){ 
                    if($id==$row["id"]){ 
                    ?>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student First Name</label>
            <div class="col-sm-10">
              <input type="text" name="sfname" class="form-control" disabled="" style="background-color:white;" placeholder="First Name" value="<?php echo $row["sfname"] ;?>" required>
            </div>
        </div>
        
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student Middle Name</label>
            <div class="col-sm-10">
              <input type="text" name="smname" class="form-control" disabled="" style="background-color:white;" placeholder="Middle Name" value="<?php echo $row["smname"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="slname" class="form-control" disabled="" style="background-color:white;" placeholder="Last Name" value="<?php echo $row["slname"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Roll Number </label>
            <div class="col-sm-10">
              <input type="text" name="rollno" class="form-control" disabled="" style="background-color:white;" placeholder="Roll Number" value="<?php echo $row["rollno"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
              <input type="text" name="class" class="form-control" disabled="" style="background-color:white;" placeholder="Class" value="<?php echo $row["class"] ;?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="id" class="form-control" disabled="" style="background-color:white;" value="<?php echo $id;?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Birth-Date</label>
            <div class="col-sm-10">
              <input type="text" name="birthdate" class="form-control" disabled="" style="background-color:white;" placeholder="Birth-Date" value="<?php echo $row["birthdate"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" disabled="" style="background-color:white;" name="gender" value="<?php echo $row["gender"] ;?>" required>
                <option selected><?php echo $row["gender"] ;?></option>
                
               </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Aadhar Number</label>
            <div class="col-sm-10">
              <input type="text" name="aadharno" class="form-control" disabled="" style="background-color:white;" placeholder="Aadhar Number" value="<?php echo $row["aadharno"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Parent Mobile Number</label>
            <div class="col-sm-10">
              <input type="text" name="pmobno" class="form-control" disabled="" style="background-color:white;" placeholder="Parent Mobile Number" value="<?php echo $row["pmobno"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Father Name</label>
            <div class="col-sm-10">
              <input type="text" name="fathername" class="form-control" disabled="" style="background-color:white;" placeholder="Father Name" value="<?php echo $row["fathername"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Mother Name</label>
            <div class="col-sm-10">
              <input type="text" name="mothername" class="form-control" disabled="" style="background-color:white;" placeholder="Mother Name" value="<?php echo $row["mothername"] ;?>" required>
            </div>
        </div>
        
        <!--<div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Emergency Contact Number</label>
            <div class="col-sm-10">
              <input type="text" name="emergencymobno" class="form-control" disabled="" style="background-color:white;" placeholder="Emergency Contact Number" value="<?php //echo $row["emergencymobno"] ;?>" required>
            </div>
        </div>-->
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" name="address" class="form-control" disabled="" style="background-color:white;" placeholder="Address" value="<?php echo $row["address"] ;?>" required>
            </div>
        </div>
        
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">UserName</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="User Name" disabled="" style="background-color:white;" name="username" value="<?php echo $row["username"] ;?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Password" disabled="" style="background-color:white;" name="pass" value="<?php echo $row["pass"] ;?>" required>
            </div>
        </div>
        <!--<div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
    </form>
    
    <?php
             }
          } ?>
          
          
          
          
          
          
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