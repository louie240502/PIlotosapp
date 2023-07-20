<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top mt-5">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
      </a>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3">
        <span class="mb-3 mb-md-0 text-white">
            <?php 
                $name = $_SESSION['UserLogin'];
                $sql = "SELECT * FROM `admin` WHERE username = '$name'";
                $employees = $con->query($sql) or die($con->error);
                $row = $employees->fetch_assoc();
                ?>
            <img src="../img/2.png" class="d-inline-block align-top" alt="" width="30" height="30">
            <?php echo $row['access']?> : <?php echo $row['fname']?> <?php echo $row['lname']?>
        </span>
     </li>
    </ul>
  </footer>
</div>