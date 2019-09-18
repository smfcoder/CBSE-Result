<?php

session_start();
 $sname=$_SESSION['schoolId'];
 $id = $_GET['id'];
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
        $unique=$_POST['id'];
        $iclass=$_POST['iclass'];
        
        if($class==$iclass)
        {
            $sql_u = "SELECT * FROM teacher Where id = '$id'";
            $res_u = mysqli_query($sql, $sql_u);
            $r = mysqli_num_rows($res_u);
            if ($r > 1) {
                $_SESSION['updation'] = 'already';
                header('location:school_af_log.php');
            }
            else{
                $fetch="UPDATE teacher SET name='".$name."',tmname='".$tmname."',tlname='".$tlname."',tfullname='".$tfullname."',class='".$class."',username='".$username."',pass='".$pass."',emailid='".$emailid."'  WHERE  id = '".$unique."'  ";
                if(mysqli_query($sql,$fetch)) {
                    $_SESSION['updation'] = 'success';
                    header('location:school_af_log.php');
                }   
                else {
                    
                    $_SESSION['updation'] = 'failed';
                    header('location:school_af_log.php');
                }
            }
        }
        else
        {
            $sql_ue = "SELECT * FROM teacher Where class = '$class'";
            $res_ue = mysqli_query($sql, $sql_ue);
            $re = mysqli_num_rows($res_ue);
            if ($re >= 1) {
                $_SESSION['updation'] = 'already';
                header('location:school_af_log.php');
            }
            else{
                $fetch="UPDATE teacher SET name='".$name."',tmname='".$tmname."',tlname='".$tlname."',tfullname='".$tfullname."',class='".$class."',username='".$username."',pass='".$pass."',emailid='".$emailid."'  WHERE  id = '".$unique."'  ";
                if(mysqli_query($sql,$fetch)) {
                    $_SESSION['updation'] = 'success';
                    header('location:school_af_log.php');
                }   
                else {
                    
                    $_SESSION['updation'] = 'failed';
                    header('location:school_af_log.php');
                }
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
            <a>Edit Teacher Details</a>
          </li>
        </ol>
    
    <?php
                    
                    $query="SELECT * FROM teacher Where id = '$id'";  
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    $name= $row['name'];
                                    $tmname=$row['tmname'];
                                    $tlname=$row['tlname'];
                                    $tfullname= $row['tfullname'];
                                    $class= $row['class'];
                                    $username= $row['username'];
                                    $pass = $row['pass'];
                                    $emailid=$row['emailid'];
                                           
                                }
                            }
     ?>
                    
                       
                    
    
    
    
    <form method="POST" action="edit_teacher_details.php">
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
              <input type="text" id="name" name="name" class="form-control" onchange="uniqueUser()" onkeyup="validate();"  placeholder="First Name" value="<?php echo $name; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Middle Name</label>
            <div class="col-sm-10">
              <input type="text"  name="tmname" id="tmname" class="form-control" onkeyup="validate();" placeholder="Middle Name" value="<?php echo $tmname; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text"  name="tlname" id="tlname" class="form-control" onkeyup="validate();" placeholder="Last Name" value="<?php echo $tlname; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" onchange="uniqueUser()" id="inlineFormCustomSelectPref" name="class"  required>
                    <option value="<?php echo $class ?>" selected><?php echo $class ?></option>   
                <?php
                    
                    $query="SELECT * FROM class ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);  
                            $rows = mysqli_num_rows($result);
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                { 
                                    if($class!=$row['class_div']) {?>
                                    <option value="<?php echo $row['class_div'] ?>"><?php echo $row['class_div'] ?></option>
            <?php
                                }
                              
                                }
                            }
            ?>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="iclass" class="form-control" value="<?php echo $class ?>">
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
            <label for="" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
              <textarea type="text" rows=1 id="userr" class="form-control" placeholder="User Name" name="username"  required><?php echo $username; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <textarea type="text" rows=1 id="pass" class="form-control" placeholder="Password" name="pass"  required><?php echo $pass; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Email Id</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Email Id" name="emailid" value="<?php echo $emailid; ?>">
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