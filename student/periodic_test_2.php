<?php
session_start();
$sname=$_SESSION['userId'];
if(!isset($_SESSION['userId']))
{
    header('location:../student_log.php');
    exit();
   
}
?>
<?php
                include("conn.php");
                $query="SELECT * FROM student WHERE username='$sname'";
                $result = mysqli_query($sql, $query);
                $row = mysqli_fetch_array($result);
                $my_class=$row['class']; 
                $my_sid=$row['sid'];
?>
<?php
        $q_c="SELECT * FROM class WHERE class_div='$my_class'";
        $r_c = mysqli_query($sql, $q_c);
        $row_c = mysqli_fetch_array($r_c);
        if($row_c['pt2_s']== 0)
        {
            $_SESSION['pt2']='UD';
            header('location:alltests.php');
            exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>PT 2-Result</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>

</style>

</head>
<body>
      
  
  
<div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center" style="padding: 10px;"><u> Periodic Test 2 </u></h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                        <?php
                            $q_r="SELECT * FROM result WHERE sid='$my_sid'";
                            $r_r = mysqli_query($sql, $q_r);
                            $row_r = mysqli_fetch_array($r_r);
                            $eng= $row_r['englishpt2'];
                            $hindi =$row_r['hindipt2'];
                            $maths =$row_r['mathspt2'];
                            $science =$row_r['sciencept2'];
                            $sst =$row_r['sstpt2'];
                            $it =$row_r['itpt2'];
                            $tm=$row_r['tm_pt2'];
                            $per=$row_r['per_pt2'];
                            
                        ?>

                        <section class="section" id="exampl">
                            <div class="container-fluid">

                                <div class="row justify-content-md-center">
                              
                             

                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h3 align="center">Student Result Details</h3>
                                                    <hr />
                                                        <p><b>Student Name : <?php echo $row['studentfullname']; ?></b></p>
                                                        <p><b>Student Roll Id : <?php echo $row['rollno']; ?></b> 
                                                        <p><b>Student Class: <?php echo $row['class']; ?></b>

                                            </div>
                                            <div class="panel-body p-20">
                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">Sr no.</th>
                                                            <th style="text-align: center"> Subject</th>    
                                                            <th style="text-align: center">Marks</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                		<tr>
                                                            <th scope="row" style="text-align: center">1</th>
                                                            <td style="text-align: center">English</td>
                                                            <td style="text-align: center"><?php echo $eng; ?></td>
                                                		</tr>
                                                        	<tr>
                                                            <th scope="row" style="text-align: center">2</th>
                                                            <td style="text-align: center">Hindi</td>
                                                            <td style="text-align: center"><?php echo $hindi; ?></td>
                                                		</tr>

                                                    	<tr>
                                                            <th scope="row" style="text-align: center">3</th>
                                                            <td style="text-align: center">Maths</td>
                                                            <td style="text-align: center"><?php echo $maths; ?></td>
                                                		</tr>

	                                                    <tr>
                                                            <th scope="row" style="text-align: center">4</th>
                                                            <td style="text-align: center">Science</td>
                                                            <td style="text-align: center"><?php echo $science; ?></td>
                                                		</tr>

	                                                    <tr>
                                                            <th scope="row" style="text-align: center">5</th>
                                                            <td style="text-align: center">SST</td>
                                                            <td style="text-align: center"><?php echo $sst; ?></td>
                                                		</tr>
                                                		
                                                		 <tr>
                                                            <th scope="row" style="text-align: center">6</th>
                                                            <td style="text-align: center">IT</td>
                                                            <td style="text-align: center"><?php echo $it; ?></td>
                                                		</tr>



                                        </div>
                             	</tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->
 
                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
       
       

      

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->


</body>
</html>                            