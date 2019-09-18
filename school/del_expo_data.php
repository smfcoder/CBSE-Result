<?php

session_start();
 $sname=$_SESSION['schoolId'];
 $class_id=$_GET['class'];
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
            <a>Student Result Data</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>


      <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            My Class</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" border="1" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    
                    <th>Roll No</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>BirthDate</th>
                    <th>Gender</th>
                    <th>Aadhar Number</th>
                    <th>Parent Mob.No.</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Address</th>
                    <th>English PT1</th>
                    <th>Hindi PT1</th>
                    <th>Maths PT1</th>
                    <th>Science PT1</th>
                    <th>IT PT1</th>
                    <th>Sst PT1</th>
                    <th>English PT2</th>
                    <th>Hindi PT2</th>
                    <th>Maths PT2</th>
                    <th>Science PT2</th>
                    <th>Sst PT2</th>
                    <th>IT PT2</th>
                    <th>English PT3</th>
                    <th>Hindi PT3</th>
                    <th>Maths PT3</th>
                    <th>Science PT3</th>
                    <th>Sst PT3</th>
                    <th>IT PT3</th>
                    <th>Best of English</th>
                    <th>Best of Hindi</th>
                    <th>Best of Maths</th>
                    <th>Best of Science</th>
                    <th>Best of Sst</th>
                    <th>Best of IT</th>
                    <th>English Subjectenrichment</th>
                    <th>Hindi Subjectenrichment</th>
                    <th>Maths Subjectenrichment</th>
                    <th>Science Subjectenrichment</th>
                    <th>Sst Subjectenrichment</th>
                    <th>IT Subjectenrichment</th>
                    <th>English Portfolio</th>
                    <th>Hindi Portfolio</th>
                    <th>Maths Portfolio</th>
                    <th>Science Portfolio</th>
                    <th>Sst Portfolio</th>
                    <th>IT Portfolio</th>
                    <th>English Notebook</th>
                    <th>Hindi Notebook</th>
                    <th>Maths Notebook</th>
                    <th>Science Notebook</th>
                    <th>Sst Notebook</th>
                    <th>IT Notebook</th>
                    <th>English Total Internals</th>
                    <th>Hindi Total Internals</th>
                    <th>Maths Total Internals</th>
                    <th>Science Total Internals</th>
                    <th>Sst Total Internals</th>
                    <th>IT Total Internals</th>
                    <th>English Final Test</th>
                    <th>Hindi Final Test</th>
                    <th>Maths Final Test</th>
                    <th>Science Final Test</th>
                    <th>Sst Final Test</th>
                    <th>IT Final Test</th>
                    <th>English Total Marks</th>
                    <th>Hindi Total Marks</th>
                    <th>Maths Total Marks</th>
                    <th>Science Total Marks</th>
                    <th>Sst Total Marks</th>
                    <th>IT Total Marks</th>
                    
                  </tr>
                </thead>
                
                <tbody>
                    
                    <?php
                            include('conn.php');
                            $query="SELECT * From result Where class='$class_id';";
                            $er=mysqli_query($sql,$query);
                           
                            
                                while($rowr=mysqli_fetch_array($er))
                                {
                                    $sid=$rowr['sid'];
                                    $qs="SELECT * From student Where sid='$sid';";
                                    $es=mysqli_query($sql,$qs);
                                    $row_s=mysqli_fetch_array($es);
                    ?>
                                    <tr>  
                                        <td><?php echo $row_s["rollno"]; ?></td>
                                        <td><?php echo $row_s["studentfullname"]; ?></td>
                                        <td><?php echo $row_s["class"]; ?></td>
                                        <td><?php echo $row_s["birthdate"]; ?></td>
                                        <td><?php echo $row_s["gender"]; ?></td>
                                        <td><?php echo $row_s["aadharno"]; ?></td>
                                        <td><?php echo $row_s["pmobno"]; ?></td>
                                        <td><?php echo $row_s["fathername"]; ?></td>
                                        <td><?php echo $row_s["mothername"]; ?></td>
                                        <td><?php echo $row_s["address"]; ?></td>
                                        
                                        <td><?php echo $rowr["englishpt1"]; ?></td>
                                        <td><?php echo $rowr["hindipt1"]; ?></td>
                                        <td><?php echo $rowr["mathspt1"]; ?></td>
                                        <td><?php echo $rowr["sciencept1"]; ?></td>
                                        <td><?php echo $rowr["sstpt1"]; ?></td>
                                        <td><?php echo $rowr["itpt1"]; ?></td>
                                        
                                        <td><?php echo $rowr["englishpt2"]; ?></td>
                                        <td><?php echo $rowr["hindipt2"]; ?></td>
                                        <td><?php echo $rowr["mathspt2"]; ?></td>
                                        <td><?php echo $rowr["sciencept2"]; ?></td>
                                        <td><?php echo $rowr["sstpt2"]; ?></td>
                                        <td><?php echo $rowr["itpt2"]; ?></td>
                                        
                                        <td><?php echo $rowr["englishpt3"]; ?></td>
                                        <td><?php echo $rowr["hindipt3"]; ?></td>
                                        <td><?php echo $rowr["mathspt3"]; ?></td>
                                        <td><?php echo $rowr["sciencept3"]; ?></td>
                                        <td><?php echo $rowr["sstpt3"]; ?></td>
                                        <td><?php echo $rowr["itpt3"]; ?></td>
                                        
                                        <td><?php echo $rowr["englishb"]; ?></td>
                                        <td><?php echo $rowr["hindib"]; ?></td>
                                        <td><?php echo $rowr["mathsb"]; ?></td>
                                        <td><?php echo $rowr["scienceb"]; ?></td>
                                        <td><?php echo $rowr["sstb"]; ?></td>
                                        <td><?php echo $rowr["itb"]; ?></td>
                                        
                                        <td><?php echo $rowr["english_se"]; ?></td>
                                        <td><?php echo $rowr["hindi_se"]; ?></td>
                                        <td><?php echo $rowr["maths_se"]; ?></td>
                                        <td><?php echo $rowr["science_se"]; ?></td>
                                        <td><?php echo $rowr["sst_se"]; ?></td>
                                        <td><?php echo $rowr["it_se"]; ?></td>
                                        
                                        <td><?php echo $rowr["english_p"]; ?></td>
                                        <td><?php echo $rowr["hindi_p"]; ?></td>
                                        <td><?php echo $rowr["maths_p"]; ?></td>
                                        <td><?php echo $rowr["science_p"]; ?></td>
                                        <td><?php echo $rowr["sst_p"]; ?></td>
                                        <td><?php echo $rowr["it_p"]; ?></td>
                                        
                                        <td><?php echo $rowr["english_n"]; ?></td>
                                        <td><?php echo $rowr["hindi_n"]; ?></td>
                                        <td><?php echo $rowr["maths_n"]; ?></td>
                                        <td><?php echo $rowr["science_n"]; ?></td>
                                        <td><?php echo $rowr["sst_n"]; ?></td>
                                        <td><?php echo $rowr["it_n"]; ?></td>
                                        
                                        <td><?php echo $rowr["englishi"]; ?></td>
                                        <td><?php echo $rowr["hindii"]; ?></td>
                                        <td><?php echo $rowr["mathsi"]; ?></td>
                                        <td><?php echo $rowr["sciencei"]; ?></td>
                                        <td><?php echo $rowr["ssti"]; ?></td>
                                        <td><?php echo $rowr["iti"]; ?></td>
                                        
                                        <td><?php echo $rowr["englishft"]; ?></td>
                                        <td><?php echo $rowr["hindift"]; ?></td>
                                        <td><?php echo $rowr["mathsft"]; ?></td>
                                        <td><?php echo $rowr["scienceft"]; ?></td>
                                        <td><?php echo $rowr["sstft"]; ?></td>
                                        <td><?php echo $rowr["itft"]; ?></td>
                                        
                                        
                                        <td><?php echo $rowr["englishf"]; ?></td>
                                        <td><?php echo $rowr["hindif"]; ?></td>
                                        <td><?php echo $rowr["mathsf"]; ?></td>
                                        <td><?php echo $rowr["sciencef"]; ?></td>
                                        <td><?php echo $rowr["sstf"]; ?></td>
                                        <td><?php echo $rowr["itf"]; ?></td>
                                        
                                    </tr>      
                                        
                    <?php        
                                
                                    
                                
                            }
                    ?>
                    
                  
                        
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        
        <script>

    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
        location.href='vd.php';
        
    }
    location.href='vd.php';
}
</script>
    <form method="POST" action="del_expo_data.php" id="myForm"> 
        <center style="margin:30px;"> <a type="button" href="vd.php?class=<?php echo $class_id;?>" class="btn btn-primary" onclick="exportTableToExcel('dataTable', '<?php echo $class_id; ?>')">Export Table Data To Excel File</a></center>
    </form>
    
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
