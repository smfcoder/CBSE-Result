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
<?php
    include("../conn.php");
    $error = '';
    if(isset($_POST['submit']))
    {
            $english=$_POST['english'];
            $hindi=$_POST['hindi'];
            $maths=$_POST['maths'];
            $science=$_POST['science'];
            $sst=$_POST['sst'];
            $it=$_POST['it'];
            $val=1;
            $uni=$_POST['sid'];
            $unid=$_POST['id'];
            $fetch="UPDATE result SET englishft='".$english."', hindift='".$hindi."', mathsft='".$maths."',scienceft='".$science."',sstft='".$sst."',itft='".$it."'   WHERE  sid = '".$uni."'  ";
            $fet="UPDATE student SET ft_s='".$val."'   WHERE  id = '".$unid."'  ";
            
            
            $query = "SELECT * FROM result WHERE sid='$uni'";  
            $result = mysqli_query($sql, $query);
            $row = mysqli_fetch_array($result);
            
            $eng_t=$row["englishi"]+$english;
            $hindi_t=$row["hindii"]+$hindi;
            $maths_t=$row["mathsi"]+$maths;
            $science_t=$row["sciencei"]+$science;
            $sst_t=$row["ssti"]+$sst;
            $it_t=$row["iti"]+$it;
                            
            $up = "UPDATE result SET englishf='".$eng_t."', hindif='".$hindi_t."', mathsf='".$maths_t."',sciencef='".$science_t."',sstf='".$sst_t."',itf='".$it_t."'   WHERE  sid = '".$uni."';";
            $qqq=mysqli_query($sql,$up);
            
            if(mysqli_query($sql,$fetch)) 
            {
                $e=mysqli_query($sql,$fet);
                $_SESSION['msg_status'] = 'success';
                header('location:ft.php');
            }   
            else 
            {
                $_SESSION['msg_status'] = 'failed';
                header('location:ft.php');
            }
    }

?>
<!DOCTYPE html>
<html lang="en">

 <?php
        include('head.php');
  ?>


<body id="page-top">

  <?php
        include('nav.php');
  ?>

  <div id="wrapper">

   <?php
        include('side.php');
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>ENTER MARKS OF FINAL TEST out of 80</a>
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
            <a>SUBJECTS</a>
          </li>
        </ol>
        
        
        <form method="POST" action="add_r_ft.php">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">English</label>
            <div class="col-sm-10">
              <input type="number" step=any  max='80' min='0'  name="english"  class="form-control" placeholder="English" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Hindi</label>
            <div class="col-sm-10">
              <input type="number" step=any  max='80' min='0' name="hindi" class="form-control" placeholder="Hindi" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Maths</label>
            <div class="col-sm-10">
              <input type="number" step=any max='80' min='0' name="maths" class="form-control" placeholder="Maths" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Science</label>
            <div class="col-sm-10">
              <input type="number" step=any max='80' min='0' class="form-control" name="science" placeholder="Science" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">SST</label>
            <div class="col-sm-10">
              <input type="number" step=any max='80' min='0' name="sst" class="form-control" placeholder="SST" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">IT</label>
            <div class="col-sm-10">
              <input type="number" step=any max='80' min='0' name="it" class="form-control" placeholder="IT" required>
            </div>
        </div>
        
        <?php
                include("../conn.php");
                $query="SELECT * FROM student Where id='$id'";
                $result = mysqli_query($sql, $query);
                $row = mysqli_fetch_array($result);
                $sid_r=$row['sid'];
        ?>
        
        <input type="hidden" name="sid" class="form-control" value="<?php echo $row['sid'];?>">
        <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary"  style="border-radius:0px;">Submit</button></div>
    </form>
        
        
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Internal Marks Out of 20</a>
          </li>
        </ol>
        
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Perodic Test</th>
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
                            $query = "SELECT * FROM result WHERE sid='$sid_r'";  
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
            include("footer.php");
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
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>




  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>