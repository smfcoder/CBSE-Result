 <style>
     .button {
  padding: 5px 10px;
  display: inline-block;
  border-radius: 50px;
  background-color: #00B1FF;
  color: white;
  border: 5px solid white;
  transition: border 0.2s ease;
  font-size:18px;
  font-style:bold;
}
.button:hover {
  border: 5px solid #81D9FF;
  cursor: pointer;
}
 </style>
 <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" style="font-weight:700; color:rgba(0, 12, 173, 0.9);" href="student_af_log.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               
               <?php
                include("conn.php");
                $query="SELECT * FROM student ORDER BY id ASC";
                $result = mysqli_query($sql, $query);
                $menu = '';
                while($row = mysqli_fetch_array($result)){
                    if($sname==$row["username"]){
                     echo'<li class="nav-item active">
                    <a class="nav-link"><button type="button" class="btn btn-primary" style="border-radius:50px;">Hi, '.$row["sfname"].'</button></a>
                    </li>'; }
                }
?>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"><button type="button" class="btn btn-outline-danger" style="border-radius:50px;">Logout</button></a>
                </li>
            </ul>
        </div>
    </div>
</nav>