<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-2">
      <div class="position-sticky pt-3 sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 text-muted text-uppercase">
          <span>Task</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./dashboard.php">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span class="item">My Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="icon"><i class="fas fa-book"></i></span>
                <span class="item">Product List</span>
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Manage Employees</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="../admin/managestaff.php">
            <span class="icon"><i class="fas fa-user"></i></span>
              Staffs
            </a>
          </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <span class="icon"><i class="fas fa-book"></i></span>
              Product Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <span class="icon"><i class="fas fa-book"></i></span>
                Sales Analysis
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <span class="icon"><i class="fas fa-file"></i></span>
                Reports
            </a>  
          </li>
          <li  class="nav-item">
              <!--THis is for notication-->
              <?php 
              $sql_get1 = mysqli_query($con, "SELECT * from product WHERE status = 0");
              $count = mysqli_num_rows($sql_get1);
              ?>
              <div class="dropdown">
                    <a href="" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle mt-2 " style="margin-left: 15px;" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="icon"><i class="fas fa-bell"></i></span>
                        <span  class="badge badge-primary" style="border-radius:50%; position:absolute; top:-2px; left:-2px; color:black;"><?php echo $count?></span>
                          New Products
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                      <li>
                          <?php 
                            $sql_get2 = mysqli_query($con, "SELECT * from product WHERE status = 0");
                            if(mysqli_num_rows($sql_get2)>0){
                              while($results = mysqli_fetch_assoc($sql_get2))
                              {
                                echo '<a class="dropdown-item text-light" href="capstonetitles.php?ID='.$results['t_id'].'">'.$results['t_name'].'</a>';
                                echo '<div class="dropdown-divider"> </div>';
                              }
                            }else{
                                echo '<a class="dropdown-item text-light font-weight-bold" href="#"> No uploaded Title!</a>';
                            }
                          ?>
                        </li>
                    </ul>
                    <!--nofication for uploaded manuscript-->
                </div>
                <?php  ?>
              <!--End notication-->
            </li>
        </ul>
      </div>
    </nav>
