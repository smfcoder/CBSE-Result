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
            $tm_pt2=($english+$hindi+$maths+$science+$sst);
            $per_pt2=(($tm_pt2)/2.5);
            
            
            
            
            $fetch="UPDATE result SET englishpt2='".$english."', hindipt2='".$hindi."', mathspt2='".$maths."',sciencept2='".$science."',sstpt2='".$sst."', itpt2='".$it."',tm_pt2='".$tm_pt2."',per_pt2='".$per_pt2."'   WHERE  sid = '".$uni."'  ";
            
            $my_pt="SELECT * FROM result WHERE  sid = '".$uni."' ;";
                    $q=mysqli_query($sql,$my_pt);
                    $row=mysqli_fetch_array($q);
                    
                    $english_pt1= $row['englishpt1'];
                    $english_pt3=$row['englishpt3'];
                    $english_pt2=$english;
                    
                    $hindi_pt1=$row['hindipt1'];
                    $hindi_pt3=$row['hindipt3'];
	                $hindi_pt2=$hindi;
	                
	                $maths_pt1=$row['mathspt1'];
	                $maths_pt3=$row['mathspt3'];
	                $maths_pt2=$maths;
	                
	                $science_pt1=$row['sciencept1'];
	                $science_pt3=$row['sciencept3'];
	                $science_pt2=$science;
	                
	                $sst_pt1=$row['sstpt1'];
	                $sst_pt3=$row['sstpt3'];
	                $sst_pt2=$sst;
	                
	                $it_pt3=$row['itpt3'];
	                $it_pt1=$row['itpt1'];
	                $it_pt2=$it;
	                
	                function calcbest1($pt1,$pt2,$pt3){
                	if ($pt1 >= $pt2  && $pt1 >= $pt3) {
                		$a=$pt1;
                	}
                	else if ($pt2 >= $pt1 && $pt2 >= $pt3) {
                		$a=$pt2;	
                	}
                	else if ($pt3 >= $pt1 && $pt3 >= $pt2) {
                		$a=$pt3;	
                	}
                	return($a);
                }
                function calcbest2($pt1,$pt2,$pt3){
                	if($pt1 >= $pt2 && $pt1 >= $pt3)
    				{
        				if($pt2 >= $pt3)
        				{
           					$b=$pt2;
        				}
        				else
        				{
        					$b=$pt3;
        				}
    				}
    				else if($pt2 >= $pt1 && $pt2 >= $pt3)
    				{
    				    if($pt1 >= $pt3)
    				    {
    				    	$b=$pt1;
    				    }
    				    else
    				    {
    				    	$b=$pt3;  
    				    }
    				}
    				else if($pt1 >= $pt2)
    				{
    						$b=$pt1; 
    				}
    				else
    				{
    						$b=$pt2;
    				}
                	return($b);
                }
	                
	                
	                
	                $eng1=calcbest1($english_pt1,$english_pt2,$english_pt3);
	                $eng2=calcbest2($english_pt1,$english_pt2,$english_pt3);
	                $eng_a=($eng1+$eng2)/2;
	                $eng=round($eng_a/10,2);
	                
	                $hin1=calcbest1($hindi_pt1,$hindi_pt2,$hindi_pt3);
	                $hin2=calcbest2($hindi_pt1,$hindi_pt2,$hindi_pt3);
	                $hin_a=($hin1+$hin2)/2;
	                $hin=round($hin_a/10,2);
	                
	                $math1=calcbest1($maths_pt1,$maths_pt2,$maths_pt3);
	                $math2=calcbest2($maths_pt1,$maths_pt2,$maths_pt3);
	                $math_a=($math1+$math2)/2;
	                $math=round($math_a/10,2);
	                
	                $sci1=calcbest1($science_pt1,$science_pt2,$science_pt3);
	                $sci2=calcbest2($science_pt1,$science_pt2,$science_pt3);
	                $sci_a=($sci1+$sci2)/2;
	                $sci=round($sci_a/10,2);
	                
	                $sst1=calcbest1($sst_pt1,$sst_pt2,$sst_pt3);
	                $sst2=calcbest2($sst_pt1,$sst_pt2,$sst_pt3);
	                $sst_a=($sst1+$sst2)/2;
	                $sstb=round($sst_a/10,2);
	                
	                $it1=calcbest1($it_pt1,$it_pt2,$it_pt3);
	                $it2=calcbest2($it_pt1,$it_pt2,$it_pt3);
	                $it_a=($it1+$it2)/2;
	                $itb=round($it_a/10,2);
	                
	                $query = "SELECT * FROM result WHERE sid='$uni'";  
                    $result = mysqli_query($sql, $query);
                    $row = mysqli_fetch_array($result);
                    
                    $eng_t=round($eng+$row["english_se"]+$row["english_p"]+$row["english_n"],2);
                    $hindi_t=round($hin+$row["hindi_se"]+$row["hindi_p"]+$row["hindi_n"],2);
                    $maths_t=round($math+$row["maths_se"]+$row["maths_p"]+$row["maths_n"],2);
                    $science_t=round($sci+$row["science_se"]+$row["science_p"]+$row["science_n"],2);
                    $sst_t=round($sstb+$row["sst_se"]+$row["sst_p"]+$row["sst_n"],2);
                    $it_t=round($itb+$row["it_se"]+$row["it_p"]+$row["it_n"],2);
        	                
	                    
                    $up = "UPDATE result SET englishi='".$eng_t."', hindii='".$hindi_t."', mathsi='".$maths_t."',sciencei='".$science_t."',ssti='".$sst_t."',iti='".$it_t."'   WHERE  sid = '".$uni."';";
           
	                
	           $f="UPDATE result SET englishb='".$eng."', hindib='".$hin."', mathsb='".$math."',scienceb='".$sci."',sstb='".$sstb."',itb='".$itb."'   WHERE  sid = '".$uni."'  ";
             
            
            if(mysqli_query($sql,$fetch)) 
            {
                $e=mysqli_query($sql,$f);
                $e_up=mysqli_query($sql,$up);
                include("ptb.php");
                $_SESSION['msg_status'] = 'success';
                header('location:pt2.php');
            }   
            else 
            {
                $_SESSION['msg_status'] = 'failed';
                header('location:pt2.php');
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
            <a>EDIT MARKS OF PERIODIC TEST 2</a>
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
        <form method="POST" action="edit_r_pt2.php">
            
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">English</label>
            <div class="col-sm-10">
              <input type="number" step=any  max='50' min='0' step=any  name="english" value="<?php echo $row_r['englishpt2'];?>" class="form-control" placeholder="English" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Hindi</label>
            <div class="col-sm-10">
              <input type="number" step=any  max='50' min='0' name="hindi" value="<?php echo $row_r['hindipt2'];?>" class="form-control" placeholder="Hindi" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Maths</label>
            <div class="col-sm-10">
              <input type="number" step=any max='50' min='0' name="maths" value="<?php echo $row_r['mathspt2'];?>" class="form-control" placeholder="Maths" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Science</label>
            <div class="col-sm-10">
              <input type="number" step=any max='50' min='0' class="form-control" value="<?php echo $row_r['sciencept2'];?>" name="science" placeholder="Science" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">SST</label>
            <div class="col-sm-10">
              <input type="number" step=any max='50' min='0' name="sst" value="<?php echo $row_r['sstpt2'];?>" class="form-control" placeholder="SST" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">IT</label>
            <div class="col-sm-10">
              <input type="number" max='50' min='0' name="it" value="<?php echo $row_r['itpt2'];?>" class="form-control" placeholder="IT" required>
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