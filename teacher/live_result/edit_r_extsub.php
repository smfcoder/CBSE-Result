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
            $english_se=$_POST['english_se'];
            $hindi_se=$_POST['hindi_se'];
            $maths_se=$_POST['maths_se'];
            $science_se=$_POST['science_se'];
            $sst_se=$_POST['sst_se'];
            $it_se=$_POST['it_se'];
    
 
 
            $english_p=$_POST['english_p'];
            $hindi_p=$_POST['hindi_p'];
            $maths_p=$_POST['maths_p'];
            $science_p=$_POST['science_p'];
            $sst_p=$_POST['sst_p'];
            $it_p=$_POST['it_p'];
 
 
            $english_n=$_POST['english_n'];
            $hindi_n=$_POST['hindi_n'];
            $maths_n=$_POST['maths_n'];
            $science_n=$_POST['science_n'];
            $sst_n=$_POST['sst_n'];
            $it_n=$_POST['it_n'];
            
            
            
            $val=1;
            $uni=$_POST['sid'];
            $unid=$_POST['id'];
            
            
            
            
            
            $fetch="UPDATE result SET english_se='".$english_se."', hindi_se='".$hindi_se."', maths_se='".$maths_se."',science_se='".$science_se."',sst_se='".$sst_se."',it_se='".$it_se."',english_p='".$english_p."', hindi_p='".$hindi_p."', maths_p='".$maths_p."',science_p='".$science_p."',sst_p='".$sst_p."',it_p='".$it_p."',english_n='".$english_n."', hindi_n='".$hindi_n."', maths_n='".$maths_n."',science_n='".$science_n."',sst_n='".$sst_n."',it_n='".$it_n."'  WHERE  sid = '".$uni."'  ";
            
            $query = "SELECT * FROM result WHERE sid='$uni'";  
            $result = mysqli_query($sql, $query);
            $row = mysqli_fetch_array($result);
            
            $eng_t=$row["englishb"]+$english_se+$english_p+$english_n;
            $hindi_t=(($row["hindib"])+($hindi_p)+($hindi_n)+($hindi_se));
            $maths_t=(($row["mathsb"])+($maths_se)+($maths_p)+($maths_n));
            $science_t=(($row["scienceb"])+($science_se)+($science_p)+($science_n));
            $sst_t=(($row["sstb"])+($sst_se)+($sst_p)+($sst_n));
            $it_t=(($row["itb"])+($it_se)+($it_p)+($it_n));
            
            
            
            
            $up = "UPDATE result SET englishi='".$eng_t."', hindii='".$hindi_t."', mathsi='".$maths_t."',sciencei='".$science_t."',ssti='".$sst_t."',iti='".$it_t."'   WHERE  sid = '".$uni."';";
           
            
            
            if(mysqli_query($sql,$fetch)) 
            {
                
                $qqq=mysqli_query($sql,$up);
                
                $queryyy="SELECT * FROM student Where id='$unid'";
                $resulttt = mysqli_query($sql, $queryyy);
                $rowww = mysqli_fetch_array($resulttt);
                $uniqqu = $rowww['sid'];    
                $query123 = "SELECT * FROM result WHERE sid='$uniqqu'";  
                $result123 = mysqli_query($sql, $query123);
                $row123 = mysqli_fetch_array($result123); 
                $eng3_t=round($row123["englishi"]+$row123["englishft"],2);
                $hindi3_t=round($row123["hindii"]+$row123["hindift"],2);
                $maths3_t=round($row123["mathsi"]+$row123["mathsft"],2);
                $science3_t=round($row123["sciencei"]+$row123["scienceft"],2);
                $sst3_t=round($row123["ssti"]+$row123["sstft"],2);
                $it3_t=round($row123["iti"]+$row123["itft"],2);
                
                
                $upp = "UPDATE result SET englishf='".$eng3_t."', hindif='".$hindi3_t."', mathsf='".$maths3_t."',sciencef='".$science3_t."',sstf='".$sst3_t."',itf='".$it3_t."'  WHERE  sid = '".$uniqqu."';";
                        
                $qqqq=mysqli_query($sql,$upp);      
                
            
                $_SESSION['msg_status'] = 'success';
               header('location:extsub.php');
            }   
            else 
            {
                $_SESSION['msg_status'] = 'failed';
               header('location:extsub.php');
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
            <a>EDIT MARKS OF SESSIONAL ASSESMENT </a>
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
            <a>ENGLISH</a>
          </li>
        </ol>
        
        
        <?php
                include("../conn.php");
                $query="SELECT * FROM student Where id='$id'";
                $result = mysqli_query($sql, $query);
                $row = mysqli_fetch_array($result);
                $si=$row['sid'];
                $query_r="SELECT * FROM result Where sid = '$si';";
                $result_r = mysqli_query($sql, $query_r);
                $row_r = mysqli_fetch_array($result_r);
                
        ?>
        <form method="POST" action="edit_r_extsub.php">
            
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Subject Enrichment</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0'  name="english_se" value="<?php echo $row_r['english_se'];?>" class="form-control" placeholder="Subject Enrichment" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Portfolio</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0' name="english_p" value="<?php echo $row_r['english_p'];?>" class="form-control" placeholder="Portfolio" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Notebook</label>
            <div class="col-sm-11">
              <input type="number" step=any max='5' min='0' name="english_n" value="<?php echo $row_r['english_n'];?>" class="form-control" placeholder="Notebook" required>
            </div>
        </div>
        
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>HINDI</a>
          </li>
        </ol>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Subject Enrichment</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0'  name="hindi_se" value="<?php echo $row_r['hindi_se'];?>" class="form-control" placeholder="Subject Enrichment" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Portfolio</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0' name="hindi_p" value="<?php echo $row_r['hindi_p'];?>" class="form-control" placeholder="Portfolio" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Notebook</label>
            <div class="col-sm-11">
              <input type="number" step=any max='5' min='0' name="hindi_n" value="<?php echo $row_r['hindi_n'];?>" class="form-control" placeholder="Notebook" required>
            </div>
        </div>
        
        
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>MATHS</a>
          </li>
        </ol>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Subject Enrichment</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0'  name="maths_se" value="<?php echo $row_r['maths_se'];?>" class="form-control" placeholder="Subject Enrichment" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Portfolio</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0' name="maths_p" value="<?php echo $row_r['maths_p'];?>" class="form-control" placeholder="Portfolio" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Notebook</label>
            <div class="col-sm-11">
              <input type="number" step=any max='5' min='0' name="maths_n" value="<?php echo $row_r['maths_n'];?>" class="form-control" placeholder="Notebook" required>
            </div>
        </div>
        
        
       
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>SCIENCE</a>
          </li>
        </ol>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Subject Enrichment</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0'  name="science_se" value="<?php echo $row_r['science_se'];?>" class="form-control" placeholder="Subject Enrichment" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Portfolio</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0' name="science_p" value="<?php echo $row_r['science_p'];?>" class="form-control" placeholder="Portfolio" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Notebook</label>
            <div class="col-sm-11">
              <input type="number" step=any max='5' min='0' name="science_n" value="<?php echo $row_r['science_n'];?>" class="form-control" placeholder="Notebook" required>
            </div>
        </div>
        
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>SST</a>
          </li>
        </ol>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Subject Enrichment</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0'  name="sst_se" value="<?php echo $row_r['sst_se'];?>" class="form-control" placeholder="Subject Enrichment" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Portfolio</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0' name="sst_p" value="<?php echo $row_r['sst_p'];?>" class="form-control" placeholder="Portfolio" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Notebook</label>
            <div class="col-sm-11">
              <input type="number" step=any max='5' min='0' name="sst_n" value="<?php echo $row_r['sst_n'];?>" class="form-control" placeholder="Notebook" required>
            </div>
        </div>


        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>IT</a>
          </li>
        </ol>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Subject Enrichment</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0'  name="it_se" value="<?php echo $row_r['it_se'];?>" class="form-control" placeholder="Subject Enrichment" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Portfolio</label>
            <div class="col-sm-11">
              <input type="number" step=any  max='5' min='0' name="it_p" value="<?php echo $row_r['it_p'];?>" class="form-control" placeholder="Portfolio" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Notebook</label>
            <div class="col-sm-11">
              <input type="number" step=any max='5' min='0' name="it_n" value="<?php echo $row_r['it_n'];?>" class="form-control" placeholder="Notebook" required>
            </div>
        </div>
        
        <input type="hidden" name="sid" class="form-control" value="<?php echo $row['sid'];?>">
        <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary"  style="border-radius:0px;">Submit</button></div>
    </form>
   
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