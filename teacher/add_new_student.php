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
<?php
    include("conn.php");
    $error = '';
    if(isset($_POST['submit'])){
        
        $sfname= $_POST['sfname'];
        $smname= $_POST['smname'];
        $slname= $_POST['slname'];
        $studentfullname=$sfname." ".$smname." ".$slname;
        $rollno= $_POST['rollno'];
        $class= $_POST['class'];
        $birthdate= $_POST['birthdate'];
        $gender= $_POST['gender'];
        $aadharno= $_POST['aadharno'];
        $pmobno= $_POST['pmobno'];
        $fathername= $_POST['fathername'];
        $mothername= $_POST['mothername'];
        //$emergencymobno= $_POST['emergencymobno'];
        $address= $_POST['address'];
        $username= $_POST['username'];
        $pass = $_POST['pass'];
        $validaadharno=strlen("$aadharno");
        if($validaadharno!=12){
            $_SESSION['registration']='invalidaadhar';
        }
        else{
        $sql_u = "SELECT * FROM student WHERE rollno ='$rollno' AND class ='$class' OR aadharno = '$aadharno';";
        $sq= "SELECT * FROM student WHERE class='$class';";
        $r_sql ="SELECT * FROM result;";
        $r_qe=mysqli_query($sql,$r_sql);
        
        $res_u = mysqli_query($sql, $sql_u);
        if (mysqli_num_rows($res_u) > 0) {
            $_SESSION['registration'] = 'already';
        }
        else{
            
            $qe = mysqli_query($sql, $sq);
            $no =mysqli_num_rows($qe);
            $no=$no+1;
            $x= strval($no);
            $sid=$class."-".$x;
            
            
            $ins="INSERT INTO student(sid,sfname,smname,slname,studentfullname,rollno,class,birthdate,gender,aadharno,pmobno,fathername,mothername,address,username,pass) values('$sid','$sfname','$smname','$slname','$studentfullname','$rollno','$class','$birthdate','$gender','$aadharno','$pmobno','$fathername','$mothername','$address','$username','$pass');";
           $ins_r="INSERT INTO result(sid,username,class) values('$sid','$username','$class');";
            if(mysqli_query($sql,$ins)) {
                $ins_r_q= mysqli_query($sql,$ins_r);
                $_SESSION['registration'] = 'success';
            }   
            else {
                $_SESSION['registration'] = 'failed';

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

    if(isset($_SESSION['registration'])) {
        if($_SESSION['registration']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['registration']);
        }
        else if($_SESSION['registration']=='invalidaadhar') {
            echo '<script>alert("Invalid Aadhar number")</script>';
            unset($_SESSION['registration']);
        }
        else if($_SESSION['registration']=='already') {
            echo '<script>alert("Already registered")</script>';
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
            <a>Add Student</a>
          </li>
        </ol>
    <form method="POST" action="add_new_student.php" name="myform" id="myform">
<script>
function validate() {
  var element = document.getElementById('sfname');
  var element1 = document.getElementById('smname');
  var element2 = document.getElementById('slname');
  var element3 = document.getElementById('fathername');
  var element4 = document.getElementById('mothername');
   var element5 = document.getElementById('pmobno');
  element.value = element.value.replace(/[^a-zA-Z]+/, ' ');
  element1.value = element1.value.replace(/[^a-zA-Z]+/, ' ');
  element2.value = element2.value.replace(/[^a-zA-Z]+/, ' ');
  element3.value = element3.value.replace(/[^a-zA-Z]+/, ' ');
  element4.value = element4.value.replace(/[^a-zA-Z]+/, ' ');
  element5.value = element5.value.replace(/[^0-9]+/, ' ');
};
</script>
        
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student First Name</label>
            <div class="col-sm-10">
              <input type="text" id="sfname" name="sfname" onchange="uniqueUser()" onkeyup="validate();" class="form-control" placeholder="First Name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student Middle Name</label>
            <div class="col-sm-10">
              <input type="text" id="smname" name="smname" class="form-control" onkeyup="validate();" placeholder="Middle Name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student Last Name</label>
            <div class="col-sm-10">
              <input type="text" id="slname" name="slname" class="form-control" onkeyup="validate();" placeholder="Last Name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Roll Number </label>
            <div class="col-sm-10">
              <input type="number" id="rollno" name="rollno" onchange="uniqueUser()" onkeyup="validate();" class="form-control" placeholder="Roll Number" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
              <input type="text" id="class" onchange="uniqueUser()" class="form-control" value="<?php echo $class_id;?>" style="background-color:white;" disabled required>
            </div>
        </div>
        
         <div class="form-group row">
            <div class="col-sm-10">
              <input type="text" name="class"class="form-control" value="<?php echo $class_id;?>" hidden></input>
            </div>
        </div>
        
    
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Birth-Date</label>
            <div class="col-sm-10">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <input id="datepicker" width="276" name="birthdate" class="form-control" placeholder="Birth-Date" style="background-color:white;" required />
    
    <script>
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>
                
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
            <label for="" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="gender" required>
                <option value="">Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="other">Other</option>
                
               </select>
            </div>
        </div>
<script>
function check()
{

    var pass1 = document.getElementById('aadharno');


    var message = document.getElementById('message');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";
    var nocolor="#ffffff";

    if(aadharno.value.length==12){
    	aadharno.style.backgroundColor = nocolor ;
        message.innerHTML = ""
	}
    else if(aadharno.value.length!=12){
        aadharno.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 12 digits, match requested format!"
    }}
</script>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Aadhar Number</label>
            <div class="col-sm-10">
              <input type="number" id="aadharno" name="aadharno" class="form-control" placeholder="Enter 12 Digit Aadhar Number" onkeyup="check(); return false;"  required>
              <span id="message"></span>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Parent Mobile Number</label>
            <div class="col-sm-10">
              <input type="number" id="pmobno" name="pmobno" class="form-control" placeholder="Parent Mobile Number" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Father Name</label>
            <div class="col-sm-10">
              <input type="text" id="fathername" name="fathername" class="form-control" onkeyup="validate();" placeholder="Father Name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Mother Name</label>
            <div class="col-sm-10">
              <input type="text" id="mothername" name="mothername" class="form-control" onkeyup="validate();" placeholder="Mother Name" required>
            </div>
        </div>
       
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" name="address" class="form-control" placeholder="Address" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">UserName</label>
            <div class="col-sm-10">
                <style>
                    textarea {
                        resize: none;
                        }
                        textarea.ta10em {
                         height: 10em;
                        }
                </style>
              <textarea rows=1 type="text" class="form-control" id="userr" placeholder="User Name" name="username" required></textarea>
            </div>
        </div>
        
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <textarea type="text" rows=1 id="pass" class="form-control" placeholder="Password" name="pass" required></textarea>
            </div>
        </div>
        <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
    
    <script>
            function uniqueUser(){
	        var classes = document.getElementById('class').value;
	        var sfname = document.getElementById('sfname').value;
	        var rollno = document.getElementById('rollno').value;
	        
            var rsfname = sfname.toLowerCase();
	        var use = classes.concat("-",rsfname);
	        var user = use.concat("-",rollno);
	        document.getElementById('userr').innerHTML = user;
	        
	         var rpsfname = sfname.toLowerCase();
	    
	        document.getElementById('pass').value = rpsfname;
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