<?php

session_start();
 $sname=$_SESSION['userId'];
if(!isset($_SESSION['userId']))
{
    header('location:../student_log.php');
    exit();
   
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style type="text/css">
    
    .card:hover{
      -webkit-box-shadow :-1px 9px 40px -12px rgba(0,0,0,0.75) ;
      -moz-box-shadow :-1px 9px 40px -12px rgba(0,0,0,0.75) ;
      box-shadow :-1px 9px 40px -12px rgba(0,0,0,0.75) ;
    }


</style>
</head>
<body>
    <?php

    if(isset($_SESSION['pt1'])) {
        if($_SESSION['pt1']=='UD')   {
            echo '<script>alert("RESULT NOT DECLARED ")</script>';
            unset($_SESSION['pt1']);
        }
        
    }
    if(isset($_SESSION['pt2'])) {
        if($_SESSION['pt2']=='UD')   {
            echo '<script>alert("RESULT NOT DECLARED ")</script>';
            unset($_SESSION['pt2']);
        }
        
    }
    if(isset($_SESSION['pt3'])) {
        if($_SESSION['pt3']=='UD')   {
            echo '<script>alert("RESULT NOT DECLARED ")</script>';
            unset($_SESSION['pt3']);
        }
        
    }
    if(isset($_SESSION['ft'])) {
        if($_SESSION['ft']=='UD')   {
            echo '<script>alert("RESULT NOT DECLARED ")</script>';
            unset($_SESSION['ft']);
        }
        
    }
?>    
  <?php
        include("header.php");
    ?>
<div style="padding:10px;"></div>
<div class="container-fluid">
<div class="row" style="padding: 10px;">

<div class="col-sm-3" style="padding: 10px;">

<div class="card" style="background-color: #FDF2E9">
<div class="card-body">
<h4 class="card-title"> Periodic Test 1 </h4>
<p class="card-text">Click on button below to view details.</p>
<a href="periodic_test_1.php" class="btn btn-outline-primary"> View >> </a>
</div>
</div>

</div>


<div class="col-sm-3" style="padding: 10px;">

<div class="card" style="background-color: #d9e7ff;">
<div class="card-body">
<h4 class="card-title"> Periodic Test 2 </h4>
<p class="card-text">Click on the button below to view the result.</p>
<a href="periodic_test_2.php" class="btn btn-outline-primary"> View >> </a>
</div>
</div>

</div>

<div class="col-sm-3" style="padding: 10px;">

<div class="card" style="background-color: #ffcfcf">
<div class="card-body">
<h4 class="card-title"> Periodic Test 3  </h4>
<p class="card-text">Click on button below to view details.</p>
<a href="periodic_test_3.php" class="btn btn-outline-primary"> View >> </a>
</div>
</div>

</div>

<div class="col-sm-3" style="padding: 10px;">

<div class="card" style="background-color: #e4d9ff">
<div class="card-body">
<h4 class="card-title"> Final Test Result </h4>
<p class="card-text">Click on button below to view details.</p>
<a href="final_test_result.php" class="btn btn-outline-primary"> View >> </a>
</div>
</div>

</div>


</div>
</div>
<style>
    .footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 0rem;
  background-color: #efefef;
  text-align: center;
}
html {
  height: 100%;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}
body {
  position: relative;
  margin: 0;
  padding-bottom: 6rem;
  min-height: 100%;
}
</style>
<footer class="footer" style="">
    <font color="black">
    <div class="footer-copyright text-center py-3" style="">Designed and Develeoped By :
        <a href="http://padmasoft.padmaacademy.com/"> Padmasoft</a>
    </div>
    </font>
</footer>
</body>
</html>