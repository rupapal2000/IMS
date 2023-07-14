<?php
session_start();
?>
  <?php
      if(!isset($_SESSION['adm']))
      {
      header("location:index.php");
      }
  ?>
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-sm navbar-light bg-primary">
            <a class="navbar-brand" href="#">Welcome</a>
            <a class="navbar-brand" href="#"><?php echo $_SESSION['adm']; ?></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
              </ul>
              <form class="form-inline my-2 my-lg-0">
             <ul class="navbar-nav  mt-2">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROFILE</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownId" style="margin-left:-100px;">
                    <a class="dropdown-item" href="createadmin.php">Create New Admin</a>
                    <a class="dropdown-item" href="changepassword.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Log out</a>
                  </div>
                </li>
              </ul>
              </form>
            </div>
          </nav>
        </div>
      </div>