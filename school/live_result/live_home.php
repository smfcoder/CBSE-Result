<?php
    session_start();
    $sname=$_SESSION['schoolId'];
    if(!isset($_SESSION['schoolId']))
    {
        header('location:../../school_log.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

 <?php
        include('head.php');
  ?>
<style>
    .wrimagecard{	
	margin-top: 0;
    margin-bottom: 1.5rem;
    text-align: left;
    position: relative;
    background: #fff;
    box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
    border-radius: 4px;
    transition: all 0.3s ease;
}
.wrimagecard .fa{
	position: relative;
    font-size: 70px;
}
.wrimagecard-topimage_header{
padding: 20px;
}
a.wrimagecard:hover, .wrimagecard-topimage:hover {
    box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
}
.wrimagecard-topimage a {
    width: 100%;
    height: 100%;
    display: block;
}
.wrimagecard-topimage_title {
    padding: 20px 24px;
    height: 80px;
    padding-bottom: 0.75rem;
    position: relative;
}
.wrimagecard-topimage a {
    border-bottom: none;
    text-decoration: none;
    color: #525c65;
    transition: color 0.3s ease;
}

</style>

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
            <a>Live Results</a>
          </li>
        </ol>
      <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="pt1.php">
          <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
            <center><i class = "fa fa-briefcase" style="color:#16A085"></i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Periodic Test 1
            <div class="pull-right badge" id="WrControls"></div></h4>
          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="pt2.php">
          <div class="wrimagecard-topimage_header" style="background-color: rgba(255, 227, 254)">
            <center><i class = "fa fa-briefcase" style="color:#ff00f6"></i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Periodic Test 2
            <div class="pull-right badge" id="WrControls"></div></h4>
          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="pt3.php">
          <div class="wrimagecard-topimage_header" style="background-color: rgba(51, 105, 232, 0.1)">
            <center><i class = "fa fa-briefcase" style="color:#3369e8"></i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Periodic Test 3
            <div class="pull-right badge" id="WrControls"></div></h4>
          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="ft.php">
          <div class="wrimagecard-topimage_header" style="background-color:  rgba(213, 15, 37, 0.1)">
            <center><i class = "fa fa-briefcase" style="color:#d50f25"></i></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Final Test
            <div class="pull-right badge" id="WrControls"></div></h4>
          </div>
        </a>
      </div>
    </div>
    </div>
      
      
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