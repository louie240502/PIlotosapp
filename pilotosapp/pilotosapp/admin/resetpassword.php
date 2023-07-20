<?php
require('../connection/connection.php');
$con = connection();

if(!isset($_GET["code"])){
    exit("Page in the link does not exist!");
}

$codes = $_GET["code"];
$getEmailQuery = mysqli_query($con,"SELECT username FROM `resetpassword` WHERE code = '$codes'");
if(mysqli_num_rows($getEmailQuery) == 0){
    exit("Page not exist!");
}

if(isset($_POST['password'])){
    $password = $_POST['password'];
    $pw = md5($password);

    $row = mysqli_fetch_array($getEmailQuery);
    $username = $row["username"];
    $query1 = mysqli_query($con, "UPDATE `admin` SET `password` = '$pw' WHERE `username`='$username'");
    if($query1){
    $query = mysqli_query($con, "DELETE FROM resetpassword WHERE code = '$codes'");
    echo "<script>alert('PASSWORD UPDATED!');</script>";
    }else{
    exit("ERROR!");
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
<link href="../admin/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<main class="form-signin w-100 m-auto">
    <form class="clearfix" method="post">
      <!-- <img class="mb-4" src="../img/2.png" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 fw-normal text-white">PILOTOS APP</h1>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="password" placeholder="New Password">
        <label for="floatingInput">Registered Email Address</label>
      </div>
        <input class="btn btn-lg btn-primary my-1" type="submit" name="submit" placeholder="Update Password">
        <p class="mt-5 mb-3 text-white">&copy; 2022–2023</p>
    </form>
  </main>

</body>
</html>
