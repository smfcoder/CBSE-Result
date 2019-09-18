<?php

session_start();
 $sname=$_SESSION['teachId'];
 $class_id=$_SESSION['classId'];
if(!isset($_SESSION['teachId']))
{
    header('location:../teach_log.php');
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

    if(isset($_SESSION['updation'])) {
        if($_SESSION['updation']=='success')   {
            echo '<script>alert("Update Success")</script>';
            unset($_SESSION['updation']);
          
        }
        else if($_SESSION['updation']=='already') {
            echo '<script>alert("Rollno or Aadhar No Already registered")</script>';
            unset($_SESSION['updation']);
            
        }
        else {
            echo '<script>alert("Sorry :(  Update Failed)")</script>';
            unset($_SESSION['updation']);
           
        }
    }
?>        
<?php

    if(isset($_SESSION['passupdate'])) {
        if($_SESSION['passupdate']=='success')   {
            echo '<script>alert("Update Success")</script>';
            unset($_SESSION['passupdate']);
        }
        
        else {
            echo '<script>alert("Sorry :( Update Failed )")</script>';
            unset($_SESSION['passupdate']);
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
            <a>Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">ADD Student</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="add_new_student.php">
                <span class="float-left">Click here</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">ADD Result</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="live_result/live_home.php">
                <span class="float-left">Click here</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">Print Result</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view_print.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">Export Data</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="export_data.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

      <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            My Class</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    
                    <th width="5%">Roll No</th>
                    <th width="50%">Student Name</th>
                    <th width="15%">Edit</th>
                    <th width="15%">View</th>
                    <th width="15%">Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                    <th width="5%">Roll No</th>
                    <th width="50%">Student Name</th>
                    <th width="15%">Edit</th>
                    <th width="15%">View</th>
                    <th width="15%">Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                        <?php
                           
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM student ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);
                            $rows = mysqli_num_rows($result);
                            
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    
                                    if($class_id== $row['class'])
                                    {
                                    ?>
                                    <tr>  
                                  <!--  <td><?php echo $row["id"];  ?></td>  
                                    <td><?php echo $row["sfname"]; ?></td>
                                    <td><?php echo $row["slname"]; ?></td> -->
                                    <td><?php echo $row["rollno"]; ?></td>
                                    <td><?php echo $row["studentfullname"]; ?></td>
                                    <td><a href="edit_student_details.php?id=<?php echo $row['id'];?>"  class="btn btn-xs btn-primary">edit</a></td>
                                    <td><a href="view_student_details.php?id=<?php echo $row['id'];?>"  class="btn btn-xs btn-primary">View</a></td>
                                    <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="delete.php?id=<?php echo $row['id'];?>&sid=<?php echo $row['sid'];?>">X</a></td>  
                                   <script>
                                       function ConfirmDelete() {
                                          return confirm("Are you sure you want to delete?");
                                        }
                                   </script>
                                    </tr>  
                                <?php
                                    }
                                }  
                            }  
                        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->

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
