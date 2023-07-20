<?php 
if(!isset($_SESSION)) 
{
    session_start(); 
}
if(isset($_SESSION['UserLogin'])){
"welcome |  ".$_SESSION['UserLogin'];
}else{
    echo"welcome | Guest";
}
include('../connection/connection.php');
$con = connection();
?>
<!doctype html>
<html lang="en">
    <?php include('../admin/inc/header.php')?>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body{
        height: 100vh;
        background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.8)), url("../img/1.png");
        background-repeat: no-repeat;
        background-position: center;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../admin/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <?php include('../admin/inc/head.php')?>

<div class="container-fluid">
  <div class="row">
  <?php include('../admin/inc/sidebar.php')?>
  
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row" >
        <h1 class="h2 text-white">Dashboard</h1>
        <hr>
      <div class="col-xl-3 col-md-6" >
          <div class="card bg-primary text-white mb-4">
          <div class="card-body">No. Products
          <?php 
                    $dash_user = "SELECT * FROM product";
                    $dash_users = mysqli_query($con, $dash_user);

                    if($user_total = mysqli_num_rows($dash_users)){
                      echo '<h4 class="mb-0">'.$user_total.'</h4>';
                    }
                    else{
                      echo '<h4 class="mb-0">EMPTY</h4>';
                    }
                  ?>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretch-link" href="#">view details</a>
          <div class="small text-white"> <i class="fas fa-angle-right"></i></div>
        </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6" >
          <div class="card bg-success text-white mb-4">
          <div class="card-body">No. Staffs
          <?php 
                    $dash_user = "SELECT * FROM staff";
                    $dash_users = mysqli_query($con, $dash_user);

                    if($user_total = mysqli_num_rows($dash_users)){
                      echo '<h4 class="mb-0">'.$user_total.'</h4>';
                    }
                    else{
                      echo '<h4 class="mb-0">EMPTY</h4>';
                    }
                  ?>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretch-link" href="#">view details</a>
          <div class="small text-white"> <i class="fas fa-angle-right"></i></div>
        </div>
        </div>
      </div>
    </div>

    
      <?php include('../admin/inc/foot.php')?>
    </main>
  </div>
</div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
