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
            <a>My Class</a>
          </li>
          <li class="breadcrumb-item active"><?php echo "Standard : ".$class_id; ?></li>
        </ol>

       
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
                    <th width="15%">Result</th>
                    <th width="15%">Edit</th>
                    <th width="15%">View Details</th>
                    <th width="15%">Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                    <th width="5%">Roll No</th>
                    <th width="50%">Student Name</th>
                    <th width="15%">Result</th>
                    <th width="15%">Edit</th>
                    <th width="15%">View Details</th>
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
                                    <td><a href="view_result.php?id=<?php echo $row['id'];?>"  class="btn btn-xs btn-primary">Result</a></td>
                                    <td><a href="edit_student_details.php?id=<?php echo $row['id'];?>"  class="btn btn-xs btn-primary">Edit</a></td>
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
