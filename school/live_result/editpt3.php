<?php
    session_start();
    $sname=$_SESSION['schoolId'];
    $id = $_GET['id'];
    if(!isset($_SESSION['schoolId']))
    {
        header('location:../../school_log.php');
        exit();
    }
?>
<?php
    include("../conn.php");
    $error = '';
    if(isset($_POST['submit'])){
        $status=$_POST['status'];
        $unique=$_POST['id'];
        
        $sql_u = "SELECT * FROM class ORDER BY ASC";
        
        $res_u = mysqli_query($sql, $sql_u);
       
        $fetch="UPDATE class SET pt3_s='".$status."'  WHERE  id = '".$unique."'  ";
            
            
            if(mysqli_query($sql,$fetch)) {
                
            
                $_SESSION['msg_status'] = 'success';
                header('location:pt3.php');
               
                 
            }   
            else {
                
                $_SESSION['msg_status'] = 'failed';
                header('location:pt3.php');

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
            <a>ACTIVE/INACTIVE PERIODIC TEST 3</a>
          </li>
        </ol>
        <form method="POST" action="editpt3.php">
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="status" required>
                <option selected value="1">Active</option>
                <option value="0">Inactive</option>
                
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
            </div>
        </div>
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary" style="border-radius:0px;">Submit</button></div>
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