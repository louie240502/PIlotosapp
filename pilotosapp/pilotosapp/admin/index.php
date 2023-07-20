<?php

if(!isset($_SESSION)) 
{
    session_start(); 
}

include('../connection/connection.php');
$con = connection();

if(isset($_POST['login'])){

    $uid = $_POST['uid'];
    $pw = $_POST['pw'];
    $pass = md5($pw);
    $sql = "SELECT * FROM `admin` WHERE username = '$uid ' AND `password` = '$pass'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

   if($total >  0){
    $_SESSION['UserLogin'] = $row['username'];
    $_SESSION['Access'] = $row['access'];
    $_SESSION['UserLogin'];
    echo header("location: dashboard.php");
   }
   else{
    echo "<script>alert('NO USERNAME FOUND!');</script>";
   }
}
?>
<?php include('../admin/inc/header.php'); ?>

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
    <link href="../admin/css/signin.css" rel="stylesheet">
  </head>
<body class="text-center">
    
  <main class="form-signin w-100 m-auto">
    <form class="clearfix" method="post">
      <img class="mb-4" src="../img/2.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 fw-normal text-white">PILOTOS APP</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="uid" placeholder="aAKJIG2345">
        <label for="floatingInput">Admin_Username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="pw" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="form-group">
        <a href="forgetpassword.php" class="text-white">Forget Password?</a> 
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
      <p class="mt-5 mb-3 text-white">&copy; 2022–2023</p>
    </form>
  </main>

</body>
</html>