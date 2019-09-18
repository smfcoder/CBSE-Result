<?php

session_start();

 $sid=$_GET['sid'];
 $id=$_GET['id'];

    $sname=$_SESSION['schoolId'];
    //$class_id= $_GET['class'];
    if(!isset($_SESSION['schoolId']))
    {
        header('location:../school_log.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Result</title>
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
                                    <h2 class="title" align="center" style="padding: 10px;"><u>Final Test </u></h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    
              <section class="section" id="exampl">
                            <div class="container-fluid">
                                <div id='DivIdToPrint' >
                                <div class="row justify-content-md-center">
                              <?php
                                    include("conn.php");
                                    $query="SELECT * FROM student Where id='$id';";
                                    $exe=mysqli_query($sql,$query);
                                    $rows=mysqli_fetch_array($exe);
                              
                              ?>
                              
                              
                              
                             
                                    
                                    <div class="col-md-8 col-md-offset-2" style="margin-top:150px;">
                                        <div class="panel">
                                          
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                        <table>
                                                            <tr><td><b>Name of Student     </b></td><td> : <?php echo $rows['studentfullname'];?></td></tr>
                                                            <tr><td><b>Roll-No     </b></td> <td> : <?php echo $rows['rollno'];?> </td> </tr> 
                                                            <tr><td><b>Class    </b></td><td> : <?php echo $rows['class'];?> </td> </tr>
                                                            <tr><td><b>Date of Birth    </b></td><td> :  <?php echo $rows['birthdate'];?> </td></tr>
                                                            <tr><td><b>Aadhar No   </b></td><td> : <?php echo $rows['aadharno'];?> </td> </tr>
                                                            <tr><td><b>Mother's Name    </b></td><td>: Mrs. <?php echo $rows['mothername'];?> </td></tr>
                                                            <tr><td><b>Father's Name    </b></td><td>: Mr. <?php echo $rows['fathername'];?> </td> </tr>
                                                            <tr><td><b>Residential Address    </b></td><td>  :  <?php echo $rows['address'];?> </td></tr>
                                                            <tr><td><b>Telephone No    </b></td><td> : <?php echo $rows['pmobno'];?> </td> </tr>
                                                        
                                                        </table>
                                            </div>
                                            <div class="panel-body p-30" style="padding-top:30px;">
                                                <?php
                                                    include("conn.php");
                                                    $que="SELECT * FROM result Where sid='$sid';";
                                                    $ex=mysqli_query($sql,$que);
                                                    $row=mysqli_fetch_array($ex);
                              
                                                  ?>
                              
                                                <table border="1" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            <th width="15%" style="text-align: center">Sr.No</th>
                                                            <th style="text-align: center"> Subject</th>    
                                                            <th style="text-align: center">Internal Marks</th>
                                                            <th style="text-align: center">Final Test Marks</th>
                                                            <th style="text-align: center">Total Marks</th>
                                                        </tr>
                                                </thead>
                                                
                                                <tbody>
                                                		<tr>
                                                            <th scope="row" style="text-align: center">1</th>
                                                            <td style="text-align: center">English</td>
                                                            <td style="text-align: center"><?php echo $row['englishi']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['englishft']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['englishf']; ?></td>
                                                		</tr>
                                                        	<tr>
                                                            <th scope="row" style="text-align: center">2</th>
                                                            <td style="text-align: center">Hindi</td>
                                                            <td style="text-align: center"><?php echo $row['hindii']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['hindift']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['hindif']; ?></td>
                                                		</tr>

                                                    	<tr>
                                                            <th scope="row" style="text-align: center">3</th>
                                                            <td style="text-align: center">Maths</td>
                                                            <td style="text-align: center"><?php echo $row['mathsi']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['mathsft']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['mathsf']; ?></td>
                                                		</tr>

	                                                    <tr>
                                                            <th scope="row" style="text-align: center">4</th>
                                                            <td style="text-align: center">Science</td>
                                                            <td style="text-align: center"><?php echo $row['sciencei']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['scienceft']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['sciencef']; ?></td>
                                                		</tr>

	                                                    <tr>
                                                            <th scope="row" style="text-align: center">5</th>
                                                            <td style="text-align: center">SST</td>
                                                            <td style="text-align: center"><?php echo $row['ssti']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['sstft']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['sstf']; ?></td>
                                                		</tr>
                                                		
                                                		<tr>
                                                            <th scope="row" style="text-align: center">6</th>
                                                            <td style="text-align: center">IT</td>
                                                            <td style="text-align: center"><?php echo $row['iti']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['itft']; ?></td>
                                                            <td style="text-align: center"><?php echo $row['itf']; ?></td>
                                                		</tr>
                                        </div>

    



                                        </div>
                             	</tbody>
                                                </table>
                                                
                                            </div>
                                        
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                 </div>
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
        <center>
        <button colspan="3" align="center" style="margin-top:20px;"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" onclick="printDiv();" ></i></button>
        </center>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
       <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script type="text/javascript">
    function printDiv() {
  var divToPrint = document.getElementById('DivIdToPrint');
  var newWin = window.open('', 'Print-Window');
  newWin.document.open();
  newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
  newWin.document.close();
  setTimeout(function() {
    newWin.close();
  }, 10);
}

</script>
        
        
        
        <!--<script src="js/main.js"></script>
        <script>
            $(function($) {

            });


function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>-->


       

      

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->


</body>
</html>                            