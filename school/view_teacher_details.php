<?php

session_start();
 $sname=$_SESSION['schoolId'];
 $id = $_GET['id'];
if(!isset($_SESSION['schoolId']))
{
    header('location:../school_log.php');
    exit();
   
}
?>

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
            <a>View Teacher Details</a>
          </li>
        </ol>
    
    <?php
                    
                    $query="SELECT * FROM teacher Where id = '$id'";  
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                   // $name= $row['name'];
                                   // $tmname=$row['tmname'];
                                   // $tlname=$row['tlname'];
                                    $tfullname= $row['tfullname'];
                                    $class= $row['class'];
                                    $username= $row['username'];
                                    $pass = $row['pass'];
                                    $emailid=$row['emailid'];
                                           
                                }
                            }
     ?>
                    
                       
                    
    
    
    
    <form method="POST" action="">
        
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Teacher Full Name</label>
            <div class="col-sm-10">
              <input type="text"  name="tlname" id="tlname" class="form-control" placeholder="Last Name" value="<?php echo $tfullname; ?>" style="background-color:white;" disabled>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" onchange="uniqueUser()" id="inlineFormCustomSelectPref" name="class" style="background-color:white;"  disabled>
                    <option value="<?php echo $class ?>" selected><?php echo $class ?></option>   
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="iclass" class="form-control" value="<?php echo $class ?>">
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
            <label for="" class="col-sm-2 col-form-label" >User Name</label>
            <div class="col-sm-10">
              <textarea type="text" rows=1 id="userr" class="form-control" placeholder="User Name" name="username" style="background-color:white;"  disabled><?php echo $username; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <textarea type="text" rows=1 id="pass" class="form-control" placeholder="Password" name="pass" style="background-color:white;"  disabled><?php echo $pass; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Email Id</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Email Id" name="emailid" style="background-color:white;" value="<?php echo $emailid; ?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
            </div>
        </div>
        
    </form>
    
    
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