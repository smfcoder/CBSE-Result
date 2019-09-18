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
    if(isset($_POST['submit'])){
        
        $name= $_POST['name'];
        $tmname= $_POST['tmname'];
        $tlname=$_POST['tlname'];
        $tfullname=$name." ".$tmname." ".$tlname ;
        $class= $_POST['class'];
        $username= $_POST['username'];
        $pass = $_POST['pass'];
        $emailid=$_POST['emailid'];
        $sql_u = "SELECT * FROM teacher WHERE class ='$class'";
        
        $res_u = mysqli_query($sql, $sql_u);
        if (mysqli_num_rows($res_u) != 0) {
            $_SESSION['registration'] = 'already';
        }
        else{
            $ins="INSERT INTO teacher(name,tmname,tlname,tfullname,class,username,pass,emailid) values('$name','$tmname','$tlname','$tfullname','$class','$username','$pass','$emailid');";

            if(mysqli_query($sql,$ins)) {
                $_SESSION['registration'] = 'success';
            }   
            else {
                $_SESSION['registration'] = 'failed';

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

    if(isset($_SESSION['registration'])) {
        if($_SESSION['registration']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['registration']);
        }
        else if($_SESSION['registration']=='already') {
            echo '<script>alert("Class Already registered")</script>';
            unset($_SESSION['registration']);
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration)")</script>';
            unset($_SESSION['registration']);
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
            <a>Add Teacher</a>
          </li>
        </ol>
    <form method="POST" action="add_teacher.php" name="myform" id="myform">
<script>
function validate() {
  var element = document.getElementById('name');
  var element1 = document.getElementById('tmname');
  var element2 = document.getElementById('tlname');
    element.value = element.value.replace(/[^a-zA-Z]+/, '');
  element1.value = element1.value.replace(/[^a-zA-Z]+/, '');
  element2.value = element2.value.replace(/[^a-zA-Z]+/, '');
};
</script>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" id="name" class="form-control" onkeyup="validate();" onchange="uniqueUser()" placeholder="Name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Middle Name</label>
            <div class="col-sm-10">
              <input type="text" id="tmname" name="tmname"  class="form-control" onkeyup="validate();"  placeholder="Middle Name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" id="tlname" name="tlname"  class="form-control" onkeyup="validate();" placeholder="Last Name" required>
            </div>
        </div>
        
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
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" onchange="uniqueUser()" name="class" required>
                   <option value="">Choose...</option>
                <?php
                        $qc="SELECT class_div FROM class";  
                        $rc = mysqli_query($sql, $qc);  
                        $rowc = mysqli_num_rows($rc);
                        if($rowc > 0 )  
                        {  
                                while($rowfc = mysqli_fetch_array($rc))
                                {
                                            echo '<option value="'.$rowfc['class_div'].'">'.$rowfc['class_div'].'</option>';
                                }
                        }
                
                ?>

       </select>
            </div>
        </div>
        
        <style>
                    textarea {
                        resize: none;
                        }
                        textarea.ta10em {
                         height: 10em;
                        }
        </style>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
              <textarea type="text" rows=1 class="form-control" id="userr" placeholder="User Name" name="username" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Pass</label>
            <div class="col-sm-10">
              <textarea type="text" rows=1 id="pass" class="form-control" placeholder="Password" name="pass" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Email Id</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Email Id" name="emailid">
            </div>
        </div>
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
    
                  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Teachers</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    
                    <th>Name</th>
                    <th>Class</th>
                    <th>Username</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                    <th>Name</th>
                    <th>Class</th>
                    <th>Username</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                  </tr>
                </tfoot>
                <tbody>


                        <?php  
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM teacher ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  ?>
                                    <tr>  
                                   <!-- <td><?php echo $row["id"];  ?></td>-->
                                    <td><?php echo $row["name"]; ?></td>  
                                    <td><?php echo $row["class"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><a class="btn btn-primary" href="view_teacher_details.php?id=<?php echo $row['id'];?>">View</a></td>  
                                    <td><a class="btn btn-primary" href="edit_teacher_details.php?id=<?php echo $row['id'];?>">Edit</a></td>  
                                    <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="del.php?id=<?php echo $row['id'];?>">X</a></td>
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
    <script>
            function uniqueUser(){
	        var name = document.getElementById('name').value;
	        var class1 = document.getElementById('inlineFormCustomSelectPref').value;
	       
	        var rname = name.toLowerCase();
	        var use = rname.concat("-",class1);
	       
	        document.getElementById('userr').innerHTML = use;
	        
	         document.getElementById('pass').value = rname;
	    
	        
        }
        </script>  
    
    
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