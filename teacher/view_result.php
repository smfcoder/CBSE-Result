<?php

session_start();
 $sname=$_SESSION['teachId'];
 $class_id=$_SESSION['classId'];
 $id=$_GET['id'];
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
            <a>Student Information</a>
          </li>
        </ol>
        
        <?php
            
                $query1="SELECT * from student where id='$id'" ;
                $result1 = mysqli_query($sql, $query1);
                $row2=mysqli_fetch_array($result1);
                $studentfullname=$row2['studentfullname'];
                $rollno=$row2['rollno'];
        ?>
        

        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Name</label>
            <div class="col-sm-5">
              <input type="text"  name="studentfullname"  class="form-control" placeholder="Student name" value="<?php echo $studentfullname; ?>" style="background-color:white;" disabled>
            </div>
                <label for="" class="col-sm-2 col-form-label">Roll Number</label>
            <div class="col-sm-4">
              <input type="text" name="rollno"  class="form-control" placeholder="Roll Number" value="<?php echo $rollno; ?>" style="background-color:white;" disabled>
            </div>
        
        </div>
        
        
        
        
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Result of Periodic Test 1</a>
          </li>
        </ol>
        
        
        
        
        
        
    <table class="table table-bordered" width="100%" cellspacing="0">
        <style>
            th{
                text-align:center;
            }
            td{
                text-align:center;
            }
        </style>
        <thead>
            <tr>
                <th width="10%">Sr.No</th>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
                  
                     
                        <?php
                           
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM result WHERE id='$id'";  
                            $result = mysqli_query($sql, $query);
                            $row = mysqli_fetch_array($result);
                            
                        ?>
                        
                        <tr>
                            <td>1</td>
                            <td>English</td>  
                            <td><?php echo $row["englishpt1"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>Hindi</td>  
                            <td><?php echo $row["hindipt1"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td>Maths</td>  
                            <td><?php echo $row["mathspt1"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>4</td>
                            <td>Science</td>  
                            <td><?php echo $row["sciencept1"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>5</td>
                            <td>SST</td>  
                            <td><?php echo $row["sstpt1"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>6</td>
                            <td>IT</td>  
                            <td><?php echo $row["itpt1"]; ?></td>  
                        </tr>
                        
                        
                  
                </tbody>
              </table>
              
              
              
    
    <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Result of Periodic Test 2</a>
          </li>
        </ol>
        
        
        
        
        
        
    <table class="table table-bordered" width="100%" cellspacing="0">

        </style>
        <thead>
            <tr>
                <th width="10%">Sr.No</th>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
                  
                     
                        <?php
                           
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM result WHERE id='$id'";  
                            $result = mysqli_query($sql, $query);
                            $row = mysqli_fetch_array($result);
                            
                        ?>
                        
                        <tr>
                            <td>1</td>
                            <td>English</td>  
                            <td><?php echo $row["englishpt2"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>Hindi</td>  
                            <td><?php echo $row["hindipt2"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td>Maths</td>  
                            <td><?php echo $row["mathspt2"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>4</td>
                            <td>Science</td>  
                            <td><?php echo $row["sciencept2"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>5</td>
                            <td>SST</td>  
                            <td><?php echo $row["sstpt2"]; ?></td>  
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>IT</td>  
                            <td><?php echo $row["itpt2"]; ?></td>  
                        </tr>
                        
                  
                </tbody>
              </table>
              
        
        
        
        
        
        
<!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Result of Periodic Test 3</a>
          </li>
        </ol>
        
        
        
        
        
        
    <table class="table table-bordered" width="100%" cellspacing="0">

        </style>
        <thead>
            <tr>
                <th width="10%">Sr.No</th>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
                  
                     
                        <?php
                           
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM result WHERE id='$id'";  
                            $result = mysqli_query($sql, $query);
                            $row = mysqli_fetch_array($result);
                            
                        ?>
                        
                        <tr>
                            <td>1</td>
                            <td>English</td>  
                            <td><?php echo $row["englishpt3"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>Hindi</td>  
                            <td><?php echo $row["hindipt3"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td>Maths</td>  
                            <td><?php echo $row["mathspt3"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>4</td>
                            <td>Science</td>  
                            <td><?php echo $row["sciencept3"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>5</td>
                            <td>SST</td>  
                            <td><?php echo $row["sstpt3"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>6</td>
                            <td>IT</td>  
                            <td><?php echo $row["itpt3"]; ?></td>  
                        </tr>
                        
                  
                </tbody>
              </table>
              
              
              
              
       <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Result of Final Test</a>
          </li>
        </ol>
        
        
        
        
        
        
    <table class="table table-bordered" width="100%" cellspacing="0">

        <thead>
            <tr>
                <th width="10%">Sr.No</th>
                <th>Subject</th>
                <th>Internal Marks</th>
                <th>Final Test Marks</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
                  
                     
                        <?php
                           
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM result WHERE id='$id'";  
                            $result = mysqli_query($sql, $query);
                            $row = mysqli_fetch_array($result);
                            
                        ?>
                        
                        <tr>
                            <td>1</td>
                            <td>English</td>
                            <td><?php echo $row["englishi"]; ?></td>
                            <td><?php echo $row["englishft"]; ?></td>
                            <td><?php echo $row["englishf"]; ?></td>
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>Hindi</td>  
                            <td><?php echo $row["hindii"]; ?></td>
                            <td><?php echo $row["hindift"]; ?></td>
                            <td><?php echo $row["hindif"]; ?></td>
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td>Maths</td>  
                            <td><?php echo $row["mathsi"]; ?></td>
                            <td><?php echo $row["mathsft"]; ?></td>
                            <td><?php echo $row["mathsf"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>4</td>
                            <td>Science</td>  
                            <td><?php echo $row["sciencei"]; ?></td>
                            <td><?php echo $row["scienceft"]; ?></td>
                            <td><?php echo $row["sciencef"]; ?></td>
                        </tr>
                        
                        <tr>
                            <td>5</td>
                            <td>SST</td>  
                            <td><?php echo $row["ssti"]; ?></td>
                            <td><?php echo $row["sstft"]; ?></td>
                            <td><?php echo $row["sstf"]; ?></td>  
                        </tr>
                        
                        <tr>
                            <td>6</td>
                            <td>IT</td>  
                            <td><?php echo $row["iti"]; ?></td>
                            <td><?php echo $row["itft"]; ?></td>
                            <td><?php echo $row["itf"]; ?></td>  
                        </tr>
                        
                  
                </tbody>
              </table>
              
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Internal Marks Out of 20</a>
          </li>
        </ol>
        
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Best of Perodic Tests</th>
                <th>Subject Enrichment</th>
                <th>Portfoilo</th>
                <th>Note-Book</th>
                <th>Total Internals</th>
            </tr>
        </thead>
        <tbody>
                  
                     
                        <?php
                           
                            include("../conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM result WHERE id='$id'";  
                            $result = mysqli_query($sql, $query);
                            $row = mysqli_fetch_array($result);
                           
                        ?>
                        
                        <tr>
                            <td>English</td>  
                            <td><?php echo $row["englishb"]; ?></td>  
                            <td><?php echo $row["english_se"]; ?></td>
                            <td><?php echo $row["english_p"]; ?></td>
                            <td><?php echo $row["english_n"]; ?></td>
                            <td><?php echo $row["englishi"]; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Hindi</td>  
                            <td><?php echo $row["hindib"]; ?></td>  
                            <td><?php echo $row["hindi_se"]; ?></td>
                            <td><?php echo $row["hindi_p"]; ?></td>
                            <td><?php echo $row["hindi_n"]; ?></td>
                            <td><?php echo $row["hindii"];?></td>
                        </tr>
                        
                        <tr>
                            <td>Maths</td>  
                            <td><?php echo $row["mathsb"]; ?></td>  
                            <td><?php echo $row["maths_se"]; ?></td>
                            <td><?php echo $row["maths_p"]; ?></td>
                            <td><?php echo $row["maths_n"]; ?></td>
                            <td><?php echo $row["mathsi"];?></td>
                        </tr>
                        
                        <tr>
                            <td>Science</td>  
                            <td><?php echo $row["scienceb"]; ?></td>  
                            <td><?php echo $row["science_se"]; ?></td>
                            <td><?php echo $row["science_p"]; ?></td>
                            <td><?php echo $row["science_n"]; ?></td>
                            <td><?php echo $row["sciencei"];?></td>
                        </tr>
                        
                        <tr>
                            <td>SST</td>  
                            <td><?php echo $row["sstb"]; ?></td>  
                            <td><?php echo $row["sst_se"]; ?></td>
                            <td><?php echo $row["sst_p"]; ?></td>
                            <td><?php echo $row["sst_n"]; ?></td>
                            <td><?php echo $row["ssti"];?></td>
                        </tr>
                        
                        <tr>
                            <td>IT</td>  
                            <td><?php echo $row["itb"]; ?></td>  
                            <td><?php echo $row["it_se"]; ?></td>
                            <td><?php echo $row["it_p"]; ?></td>
                            <td><?php echo $row["it_n"]; ?></td>
                            <td><?php echo $row["iti"];?></td>
                        </tr>
                        
                        
                  
                </tbody>
              </table>
    
    
    
    
   
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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>