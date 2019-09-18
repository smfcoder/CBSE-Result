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

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Teacher Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">



  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <script>
        $(document).ready(function() {

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'excelHtml5',
            text: 'Export to Excel',
            className: 'btn btn-primary',
            filename: 'data',
            
            exportOptions: {
                modifier: {
                    page: 'all'
                }
            }
        }
        ]
            } );
        } );

    </script>
     <style>
        .buttons-excel{
           
           
            margin:20px auto;
            
           
           
            
        }
    </style>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="teacher_af_log.php">Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>

  
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <?php
                include("../conn.php");
                $query="SELECT * FROM teacher ORDER BY id ASC";
                $result = mysqli_query($sql, $query);
                $menu = '';
                while($row = mysqli_fetch_array($result)){
                    if($sname==$row["username"]){
                     echo'<a class="dropdown-item" href="#">Hi, '.$row["name"].'</a>'; 
                        
                    }
                }
            ?>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
     <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="teacher_af_log.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_new_student.php">
          <i class="fas fa-user-graduate"></i>
          <span>Add Student</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_class.php">
          <i class="fas fa-fw fa-table"></i>
          <span>My Class</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="live_result/live_home.php">
          <i class="fab fa-elementor"></i>
          <span>Add Result</span></a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="export_data.php">
        <i class="fas fa-download"></i>
          <span>Export Data</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="view_print.php">
       <i class="fa fa-print" aria-hidden="true"></i>
          <span>Print Result</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="change_pass.php">
        <i class="fas fa-retweet"></i>
          <span>Change Password</span></a>
      </li>
          
    </ul>
    
    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Export To Excel</div>
          <div class="card-body">
            <div class="table-responsive">
         <table id="example" class="table table-bordered" style="width:100%" cellspacing="0">
        
                <thead>
                  <tr>
                    
                    <th>Roll No</th>
                    <th>Student Name</th>
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

       
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="text-center my-auto">
            <span class="text-info">Design and Develop By <a href="http://padmasoft.padmaacademy.com/">PadmaSoft</a></span>
          </div>
        </div>
    </footer>


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
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/sb-admin.min.js"></script>
</body>

</html>
