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