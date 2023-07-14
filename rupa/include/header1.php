<?php
include("include/config.php");
session_start();
?>
   <?php
       if(!isset($_SESSION['usr']))
       {
        header("location:index.php");
       }
       else
       {
        $em=$_SESSION['usr'];
        $q2="select * from `student` where `email`='$em' or `phone`='$em'";
        $e2=mysqli_query($conn,$q2);
        //print_r($q2);die();
        if(mysqli_num_rows($e2)>0)
        {
          $res=mysqli_fetch_row($e2);
          $nm=$res[1]; 
          $sid=$res[0];  
        }
       }
       ?>
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-sm navbar-light bg-primary">
            <a class="navbar-brand" href="#">Welcome</a>
            <a class="navbar-brand" href="#"><?php echo $nm; ?></a>
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
                    <a class="dropdown-item" href="changestudentpassword.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Log out</a>
                  </div>
                </li>
              </ul>
              </form>
            </div>
          </nav>
        </div>
      </div>