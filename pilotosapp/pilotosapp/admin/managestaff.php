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
if(isset($_POST['btnSave'])){

    $un = $_POST['username'];
    $pw= $_POST['password'];
    $lname = $_POST['lname'];
    $fname= $_POST['fname'];
    $dep= $_POST['dep'];
    $usertype= $_POST['usertype'];

    $sql= mysqli_query($con, "INSERT INTO `staff`(`username`, `password`, `lname`, `fname`, `department_name`, `usertype_name`) 
    VALUES ('$un','$pw','$lname','$fname','$dep','$usertype')");
    if($sql){
        header("Location: managestaff.php?message=successadd");
    }else{
        echo"failed to save a faculty"  .mysqli_connect_errno();
    }
}
?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM staff WHERE staff_id = '$id'");
    header("location: managestaff.php?message=successdeleted");
}
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
        <a href="#addstaffModal" class="btn btn-success btn-lg mt-4 " data-toggle="modal"> <span> 
        <i class="fas fa-plus mx-2 " data-toggle="tooltip" title="ADD"></i>Add New</span> </a>
      <h2 class="h2 text-white">Staffs List</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm text-white table-dark">
            <?php include('../admin/inc/notifier.php');?>
          <thead>
            <tr>
              <th class="table-warning" scope="col">#</th>
              <th class="table-warning" scope="col">Image</th>
              <th class="table-warning" scope="col">LastName</th>
              <th class="table-warning" scope="col">FirstName</th>
              <th class="table-warning" scope="col">Department</th>
              <th class="table-warning" scope="col">Position</th>
              <th class="table-warning" scope="col">Action</th>
            </tr>
          </thead>
          <?php $select_data = mysqli_query($con, "SELECT * FROM `staff` ORDER BY staff_id DESC");
            while($row = mysqli_fetch_array($select_data)){
          ?>
          <tbody>
            <tr>
              <td class="id"><a href="viewunitstaff.php?ID=<?php echo $row['staff_id']?>"> <div class="pb-1"><i class="fas fa-eye"></i> </div> </a></td>
              <td><img src="<?php echo $row['photo']?>" height="50" width="50" class="rounded"></td>
              <td class="lastn"><?php echo $row['lname']?></td>
              <td class="firstn"><?php echo $row['fname']?></td>
              <td class="depname"><?php echo $row['department_name']?> </td>
              <td class="usertype"><?php echo $row['usertype_name']?> </td>
              <td>
                  <a  href="viewstaff.php?ID=<?php echo $row['staff_id']?>">
                      <i class="fas fa-pen mx-2" data-toggle="tooltip" title="EDIT"></i>
                  </a>
                  <a href="managestaff.php?delete=<?php echo $row['staff_id']?>" class="delete" name="btnDeletemodal">
                      <i class="fas fa-trash mx-2" data-toggle="tooltip" title="DELETE"></i>
                  </a>
              </td>
            </tr>
          </tbody>
          <?php }?>
        </table>
      </div>
      <?php include('../admin/inc/foot.php')?>
    </main>
    <!--ADD MODAL-->
    <div id="addstaffModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Staff</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>LastName</label>
                            <input type="text" name="lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>FirstName</label>
                            <input type="text" name="fname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <select class="form-control w-100" name="dep"required>
                            <option value="">--SELECT--</option>
                                <?php  $subs ="SELECT * FROM `department`";
                                        $result = mysqli_query($con, $subs);
                                        while($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['dep_name'];?>"> <?php echo $row['dep_name']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <select class="form-control w-100" name="usertype" required>
                            <option value="">--SELECT--</option>
                                <?php  $subs ="SELECT * FROM `usertype`";
                                        $result = mysqli_query($con, $subs);
                                        while($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['usertype_name'];?>"> <?php echo $row['usertype_name']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dafault" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-success" name="btnSave">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END ADD MODAL-->  
    <?php include("../admin/inc/footer.php") ?>
    <script>
        setTimeout(function(){
            document.getElementById("alert").style.display = "none";
        }, 3000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="/assets/js/sidebars.js"></script>
    </body>
</html>
