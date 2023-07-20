<?php 
if(!isset($_SESSION)){
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
        .content{
          min-height: 98.4vh;
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
      a{
        text-decoration: none;
        color: green;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../admin/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <?php include('../admin/inc/head.php')?>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php include('../admin/inc/sidebar.php')?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="h2 text-white mt-2 border-bottom">Staff Information</h2>
            <?php 
            $id = $_GET['ID'];
            $select_data = mysqli_query($con, "SELECT * FROM `staff` WHERE staff_id = '$id'");
            while($row = mysqli_fetch_array($select_data)){
            ?>
            <form action="" method="post" enctype="multipart/form-data" class="form-signin m-auto mt-5 rounded p-5 bg-white">
                <div class="modal-header">
                    <h4 class="modal-title">Employee ID: # <?php echo $row['staff_id'];?> </h4>
                </div>
                    <div class="modal-body">
                        <center>
                            <div class="form-group">
                                <img src="<?php echo $row['photo']?>" height="120" width="120" class="rounded" />
                            </div>
                        </center>
                        <div class="form-group">
                            <label>LastName</label>
                            <input type="text" class="form-control" value="<?php echo $row['lname']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>FirstName</label>
                            <input type="text" class="form-control" value="<?php echo $row['fname']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" value="<?php echo $row['department_name']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" class="form-control" value="<?php echo $row['usertype_name']; ?>" disabled>
                        </div>
                    </div>
                    <?php }?>
                <div class="modal-footer">
                    <a href="managestaff.php" type="button" class="btn btn-danger mt-2 mx-1" data-dismiss="modal">
                    <span class="icon"><i class="fas fa-arrow-left"></i></span>
                    BACK</a>
                </div>
            </form>

            <?php include('../admin/inc/foot.php')?>
            </main>
        </div>
    </div>
    </div>
    <?php include("../admin/inc/footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="/assets/js/sidebars.js"></script>
  </body>
</html>

