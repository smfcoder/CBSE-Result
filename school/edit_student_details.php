<?php
    session_start();
    $sname=$_SESSION['schoolId'];
    //$class_id= $_GET['class'];
    $id=$_GET['id'];
    if(!isset($_SESSION['schoolId']))
    {
        header('location:../school_log.php');
        exit();
    }
?>
<?php
    include("conn.php");
    //$error = '';
   
    if(isset($_POST['submit']))
    {
        $sfname= $_POST['sfname'];
        $smname= $_POST['smname'];
        $slname= $_POST['slname'];
        $studentfullname=$sfname." ".$smname." ".$slname;
        $rollno= $_POST['rollno'];
        $class= $_POST['class'];
        $birthdate= $_POST['birthdate'];
        $gender= $_POST['gender'];
        $aadharno= $_POST['aadharno'];
        $iaadharno= $_POST['iaadharno'];
        $pmobno= $_POST['pmobno'];
        $fathername= $_POST['fathername'];
        $mothername= $_POST['mothername'];
        $address= $_POST['address'];
        $username= $_POST['username'];
        $pass = $_POST['pass'];
        $irollno=$_POST['irollno'];
        $uni=$_POST['id'];
        $sid=$_POST['sid'];
        $validaadharno=strlen("$aadharno");
        
        $ss= "SELECT * FROM student WHERE class='$class'";
        $exss = mysqli_query($sql, $ss);
        $ssnum = mysqli_num_rows($exss);
        
        
        
        if($validaadharno!=12)
        {
            $_SESSION['updation']='invalidaadhar';
            header('location:view_student.php?class='.$class.' ');
        }
        else
        {
            if($ssnum==1)
            {
                if($iaadharno==$aadharno)
                {
                    $fetch="UPDATE student SET sfname='".$sfname."',smname='".$smname."',slname='".$slname."',studentfullname='".$studentfullname."',rollno='".$rollno."',class='".$class."',birthdate='".$birthdate."',gender='".$gender."',aadharno='".$aadharno."',pmobno='".$pmobno."',fathername='".$fathername."',mothername='".$mothername."',address='".$address."',username='".$username."',pass='".$pass."' WHERE id = '".$uni."' ";
                    $fet="UPDATE result SET username='".$username."' WHERE sid = '".$sid."' ";
                    if(mysqli_query($sql,$fetch)) 
                    {
                        $q_e = mysqli_query($sql,$fet);
                        $_SESSION['updation'] = 'success';
                        header('location:view_student.php?class='.$class.' ');
                    }   
                    else 
                    {
                        $_SESSION['updation'] = 'failed';
                        header('location:view_student.php?class='.$class.' ');
                    }
                }
                else
                {
                    $s = "SELECT * FROM student WHERE aadharno = '$aadharno'; ";
                    $ress = mysqli_query($sql, $s);
                    $t = mysqli_num_rows($ress);
                    if($t>=1)
                    {
                        $_SESSION['updation'] = 'already';
                        header('location:view_student.php?class='.$class.' ');    
                    }
                    else
                    {
                        $fetch="UPDATE student SET sfname='".$sfname."',smname='".$smname."',slname='".$slname."',studentfullname='".$studentfullname."',rollno='".$rollno."',class='".$class."',birthdate='".$birthdate."',gender='".$gender."',aadharno='".$aadharno."',pmobno='".$pmobno."',fathername='".$fathername."',mothername='".$mothername."',address='".$address."',username='".$username."',pass='".$pass."' WHERE id = '".$uni."' ";
                        $fet="UPDATE result SET username='".$username."' WHERE sid = '".$sid."' ";
                        if(mysqli_query($sql,$fetch)) 
                        {
                            $q_e = mysqli_query($sql,$fet);
                            $_SESSION['updation'] = 'success';
                            header('location:view_student.php?class='.$class.' ');
                        }   
                        else 
                        {
                            $_SESSION['updation'] = 'failed';
                            header('location:view_student.php?class='.$class.' ');
                        }
                    }
                }
            }
            else if($irollno==$rollno && $iaadharno==$aadharno )
            {
                $fetch="UPDATE student SET sfname='".$sfname."',smname='".$smname."',slname='".$slname."',studentfullname='".$studentfullname."',rollno='".$rollno."',class='".$class."',birthdate='".$birthdate."',gender='".$gender."',aadharno='".$aadharno."',pmobno='".$pmobno."',fathername='".$fathername."',mothername='".$mothername."',address='".$address."',username='".$username."',pass='".$pass."' WHERE id = '".$uni."' ";
                $fet="UPDATE result SET username='".$username."' WHERE sid = '".$sid."' ";
                if(mysqli_query($sql,$fetch)) 
                {
                    $q_e = mysqli_query($sql,$fet);
                    $_SESSION['updation'] = 'success';
                    header('location:view_student.php?class='.$class.' ');
                }   
                else 
                {
                    $_SESSION['updation'] = 'failed';
                    header('location:view_student.php?class='.$class.' ');
                }
                
            }
            else if($irollno==$rollno && $iaadharno!=$aadharno )
            {
                $s = "SELECT * FROM student WHERE aadharno = '$aadharno'; ";
                $ress = mysqli_query($sql, $s);
                $t = mysqli_num_rows($ress);
                if($t>=1)
                {
                    $_SESSION['updation'] = 'already';
                    header('location:view_student.php?class='.$class.' ');    
                }
                else
                {
                    $fetch="UPDATE student SET sfname='".$sfname."',smname='".$smname."',slname='".$slname."',studentfullname='".$studentfullname."',rollno='".$rollno."',class='".$class."',birthdate='".$birthdate."',gender='".$gender."',aadharno='".$aadharno."',pmobno='".$pmobno."',fathername='".$fathername."',mothername='".$mothername."',address='".$address."',username='".$username."',pass='".$pass."' WHERE id = '".$uni."' ";
                    $fet="UPDATE result SET username='".$username."' WHERE sid = '".$sid."' ";
                    if(mysqli_query($sql,$fetch)) 
                    {
                        $q_e = mysqli_query($sql,$fet);
                        $_SESSION['updation'] = 'success';
                        header('location:view_student.php?class='.$class.' ');
                    }   
                    else 
                    {
                        $_SESSION['updation'] = 'failed';
                        header('location:view_student.php?class='.$class.' ');
                    }
                }
                
            }
            else if($irollno!=$rollno && $iaadharno==$aadharno )
            {
                $sql_f = "SELECT * FROM student WHERE rollno='$rollno' AND class='$class' ";
                $res_f = mysqli_query($sql, $sql_f);
                $rf = mysqli_num_rows($res_f);
    
                if ($rf>=1) 
                {
                    $_SESSION['updation'] = 'already';
                    header('location:view_student.php?class='.$class.' ');
                }
                else
                {
                    $fetch="UPDATE student SET sfname='".$sfname."',smname='".$smname."',slname='".$slname."',studentfullname='".$studentfullname."',rollno='".$rollno."',class='".$class."',birthdate='".$birthdate."',gender='".$gender."',aadharno='".$aadharno."',pmobno='".$pmobno."',fathername='".$fathername."',mothername='".$mothername."',address='".$address."',username='".$username."',pass='".$pass."' WHERE id = '".$uni."' ";
                    $fet="UPDATE result SET username='".$username."' WHERE sid = '".$sid."' ";
                    if(mysqli_query($sql,$fetch)) 
                    {
                        $q_e = mysqli_query($sql,$fet);
                        $_SESSION['updation'] = 'success';
                        header('location:view_student.php?class='.$class.' ');
                    }   
                    else 
                    {
                        $_SESSION['updation'] = 'failed';
                        header('location:view_student.php?class='.$class.' ');
                    }
                }
                
            }
            else if($irollno!=$rollno && $iaadharno!=$aadharno )
            {
                $sql_f = "SELECT * FROM student WHERE rollno='$rollno' AND class='$class' ";
                $res_f = mysqli_query($sql, $sql_f);
                $rf = mysqli_num_rows($res_f);
    
                $s = "SELECT * FROM student WHERE aadharno = '$aadharno'; ";
                $ress = mysqli_query($sql, $s);
                $t = mysqli_num_rows($ress);
                
                if ($rf>=1 || $t>=1) 
                {
                    $_SESSION['updation'] = 'already';
                    header('location:view_student.php?class='.$class.' ');
                }
                else
                {
                    $fetch="UPDATE student SET sfname='".$sfname."',smname='".$smname."',slname='".$slname."',studentfullname='".$studentfullname."',rollno='".$rollno."',class='".$class."',birthdate='".$birthdate."',gender='".$gender."',aadharno='".$aadharno."',pmobno='".$pmobno."',fathername='".$fathername."',mothername='".$mothername."',address='".$address."',username='".$username."',pass='".$pass."' WHERE id = '".$uni."' ";
                    $fet="UPDATE result SET username='".$username."' WHERE sid = '".$sid."' ";
                    if(mysqli_query($sql,$fetch)) 
                    {
                        $q_e = mysqli_query($sql,$fet);
                        $_SESSION['updation'] = 'success';
                        header('location:view_student.php?class='.$class.' ');
                    }   
                    else 
                    {
                        $_SESSION['updation'] = 'failed';
                        header('location:view_student.php?class='.$class.' ');
                    }
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
            <a>Edit Student Details</a>
          </li>
        </ol>
    <form method="POST" action="edit_student_details.php">
<script>
function validate() {
  var element = document.getElementById('sfname');
  var element1 = document.getElementById('smname');
  var element2 = document.getElementById('slname');
  var element3 = document.getElementById('fathername');
  var element4 = document.getElementById('mothername');
  element.value = element.value.replace(/[^a-zA-Z]+/, ' ');
  element1.value = element1.value.replace(/[^a-zA-Z]+/, ' ');
  element2.value = element2.value.replace(/[^a-zA-Z]+/, ' ');
  element3.value = element3.value.replace(/[^a-zA-Z]+/, ' ');
  element4.value = element4.value.replace(/[^a-zA-Z]+/, ' ');
  //element3.value = element2.value.replace(/[^a-z0-9]+/, ' ');
};
</script>
        <?php
                include("conn.php");
                $query="SELECT * FROM student Where id='$id'";
                $result = mysqli_query($sql, $query);
                $row = mysqli_fetch_array($result);
                ?>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student First Name</label>
            <div class="col-sm-10">
              <input type="text" id="sfname" name="sfname" class="form-control" onchange="uniqueUser()" onkeyup="validate();" placeholder="First Name" value="<?php echo $row["sfname"] ;?>" required>
            </div>
        </div>
        
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student Middle Name</label>
            <div class="col-sm-10">
              <input type="text" id="smname" name="smname" class="form-control" placeholder="Middle Name" onkeyup="validate();" value="<?php echo $row["smname"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student Last Name</label>
            <div class="col-sm-10">
              <input type="text" id="slname"  name="slname" class="form-control" placeholder="Last Name" onkeyup="validate();" value="<?php echo $row["slname"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Roll Number </label>
            <div class="col-sm-10">
              <input type="number" id="rollno" name="rollno" class="form-control" onchange="uniqueUser()" placeholder="Roll Number" value="<?php echo $row["rollno"] ;?>" required>
            </div>
        </div>
        <input type="hidden" name="irollno" value="<?php echo $row["rollno"] ;?>" required>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
              <input type="text" id="class" onchange="uniqueUser()" class="form-control" value="<?php echo $row["class"];?>" style="background-color:white;" disabled required>
            </div>
        </div>
        
         <div class="form-group row">
            <div class="col-sm-10">
              <input type="text" name="class"class="form-control" value="<?php echo $row["class"];?>" hidden></input>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
            </div>
        </div>
        

     
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Birth-Date</label>
            <div class="col-sm-10">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
              <input id="datepicker" width="276" name="birthdate" class="form-control" placeholder="Birth-Date" value="<?php echo $row["birthdate"] ;?>"  required />
    <script>
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>
            </div>
        </div>
        
  
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select class="form-control select1" name="gender" style="width: 100%;">
                  <?php
                  include("conn.php");
                  $qq="SELECT * FROM student Where id ='$id'; ";
                  $rr=mysqli_query($sql,$qq);
                    $roo= mysqli_fetch_array($rr);
                    
                  
                      echo'<option>'.$row["gender"].'</option>';
                  if($row["gender"]=="Male"){
                      echo'<option>Female</option>';
                  }
                  else{
                  echo'<option>Male</option>';
                  }
                    
                 ?>
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
              <input type="number" id="aadharno" name="aadharno" class="form-control" placeholder="Aadhar Number" onkeyup="check(); return false;"   value="<?php echo $row["aadharno"] ;?>" required>
            </div>
        </div>
        
              <input name="iaadharno" value="<?php echo $row["aadharno"] ;?>" hidden required>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Parent Mobile Number</label>
            <div class="col-sm-10">
              <input type="tel" name="pmobno" class="form-control" placeholder="Parent Mobile Number" value="<?php echo $row["pmobno"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Father Name</label>
            <div class="col-sm-10">
              <input type="text" id="fathername" name="fathername" class="form-control" placeholder="Father Name" onkeyup="validate();" value="<?php echo $row["fathername"] ;?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Mother Name</label>
            <div class="col-sm-10">
              <input type="text" id="mothername" name="mothername" class="form-control" placeholder="Mother Name" onkeyup="validate();" value="<?php echo $row["mothername"] ;?>" required>
            </div>
        </div>
        <!--
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Emergency Contact Number</label>
            <div class="col-sm-10">
              <input type="text" name="emergencymobno" class="form-control" placeholder="Emergency Contact Number" value="<?php //echo $row["emergencymobno"] ;?>" required>
            </div>
        </div>
        -->
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $row["address"] ;?>" required>
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
              <textarea rows=1 type="text" class="form-control" id="userr" placeholder="User Name" name="username"  required><?php echo $row["username"] ;?></textarea>
            </div>
        </div>
        <?php //echo $row["username"] ;?>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Password" name="pass" value="<?php echo $row["pass"] ;?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <input type="hidden" name="sid" class="form-control" value="<?php echo $row["sid"];?>">
            </div>
        </div>
        <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
    
    <?php
             
           ?>
        <!--  <textarea id="userr" class="form-control" id="userr" placeholder="User Name" name="username" required></textarea>
        <input type="text" class="form-control" id="userr" placeholder="User Name" name="username" required></input>-->
        <script>
            function uniqueUser(){
	        var classes = document.getElementById('class').value;
	        var sfname = document.getElementById('sfname').value;
	        var rollno = document.getElementById('rollno').value;
	       
            var rsfname = sfname.toLowerCase();
	        var use = classes.concat("-",rsfname);
	        var user = use.concat("-",rollno);
	        document.getElementById('userr').innerHTML = user;
	        
	        
	        document.getElementById('pass').value = rsfname;
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