<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-4 col-lg-2 me-0 px-3 fs-6 bg-warning text-dark" href="#">
      <img src="../img/1.png" class="d-inline-block align-top bg-success rounded" alt="" width="30" height="30">
      &nbsp; PGCS
    </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item">
      <h3 class="text-white mx-3">PILOTOS GROUNDS AND GRILL</h3>
    </div>
  </div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap mb-1">
    <?php if (isset($_SESSION['UserLogin'])){?>
          <button type="button" class="btn btn-danger mx-3 "><a href="logout.php" style="color:white;"> <span class="fas fa-power-off"> </span> </a></button>
          <?php } else{ ?>
          <button type="button" class="btn btn-sm btn-outline-secondary"><a href="login.php">LOG IN</a></button>
          <?php }?>
    </div>
  </div>
</header>