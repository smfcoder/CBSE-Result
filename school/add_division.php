<?php
    session_start();
    $sname=$_SESSION['schoolId'];
    if(!isset($_SESSION['schoolId']))
    {
        header('location:../school_log.php');
        exit();
    }
?>
 <?php
    include("conn.php");
    $error = '';
    if(isset($_POST['submit']))
    {
        $class_name= $_POST['class'];
        $div_name=strtoupper($_POST['divi']);
        $cd=strtoupper($class_name."-".$div_name);
        $sql_u = "SELECT * FROM class WHERE class_div='$cd'";
        $res_u = mysqli_query($sql, $sql_u);
        if (mysqli_num_rows($res_u) > 0) {
            $_SESSION['reg'] = 'already';
        }
        else{
              $ins="INSERT INTO class (class_name,div_name,class_div) VALUES('$class_name','$div_name','$cd');";
              $q=mysqli_query($sql,$ins);
            if($q) 
            {
                $_SESSION['reg'] = 'success';
            }   
            else 
            {
                $_SESSION['reg'] = 'failed';
            }
        } 
    }

?>
<!DOCTYPE html>
<html lang="en">

 <?php
        include('main/head.php');
  ?>


<body id="page-top">
<?php

    if(isset($_SESSION['reg'])) {
        if($_SESSION['reg']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['reg']);
        }
        else if($_SESSION['reg']=='already') {
            echo '<script>alert("Class Already registered")</script>';
            unset($_SESSION['reg']);
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration)")</script>';
            unset($_SESSION['reg']);
        }
    }
?>    
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
            <a>Add Division</a>
          </li>
        </ol>
        
        
        
    <form method="POST" action="add_division.php" name="myform" id="myform">
        
<script>
            $(function()
{
    $("#myform").validate(
      {
        rules: 
        {
          item: 
          {
            required: true
          }
        }
      });	
});
</script>
<style>
body
{
  font-family: Arial, Sans-serif;
}
label.error
{
color:red;
font-family:verdana, Helvetica;
}
</style>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="class" required>
                <option value="">Choose...</option>
                <option value="10">10</option>
                <option value="9">9</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Division</label>
            <div class="col-sm-10">
               <input type="text" name="divi" style="text-transform: uppercase;" class="form-control" placeholder="Enter Division" required>
            </div>
        </div>
        
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
   



              <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            My Class</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    
                    <th>Class</th>
                    <th>Division</th>
                    <th>Standard</th>
                    
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                    <th>Class</th>
                    <th>Division</th>
                    <th>Standard</th>
                   
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                        <?php  
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM class ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  ?>
                                    <tr>  
                                    <td><?php echo $row["class_name"]; ?></td>  
                                    <td><?php echo $row["div_name"]; ?></td>
                                    <td><?php echo $row["class_div"]; ?></td> 
                                    <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="del_div.php?id=<?php echo $row['id'];?>">X</a></td>
                                    <script>
                                        function ConfirmDelete() {
                                          return confirm("Are you sure you want to delete?");
                                        }
                                    </script>
                                    </tr>  
                                <?php
                                    
                                }  
                            }  
                        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          
        </div>


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