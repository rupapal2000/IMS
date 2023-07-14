
<?php
include("include/config.php");
session_start();
?>
  <?php
   if(isset($_SESSION['adm']))
   {
    header("location:profile.php");
   }
  ?>
  <?php
   if(isset($_SESSION['usr']))
   {
    header("location:userprofile.php");
   }
  ?>
<?php
if(isset($_POST['btn1']))
{
   extract($_POST);
    $q2="select * from `admin` where `adminid`='$adminid' and `password`='$password'";
     $e2=mysqli_query($conn,$q2);
     //print_r($q2);die();
     if(mysqli_num_rows($e2)>0)
     {
      $_SESSION['adm']=$adminid;
      header("location:profile.php");
     }
     else
     {
      $msg="invalid login details";
     }
    }
    if(isset($_POST['btn2']))
{
   extract($_POST);
    $q3="select * from `student` where ( `email`='$emailid' or `phone`='$emailid') and `password`='$password'";
     $e3=mysqli_query($conn,$q3);
     //print_r($q3);die();
     if(mysqli_num_rows($e3)>0)
     {
      $_SESSION['usr']=$emailid;
      header("location:userprofile.php");
     }
     else
     {
      $msg="invalid login details";
     }
    }
    else
    {
      $msg="";
    }
    if(isset($_POST['btn3']))
{
   extract($_POST);
    $image=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
     $q4="select * from `student` where  `email`='$email' or `phone`='$phone'";
     $e4=mysqli_query($conn,$q4);
     //print_r($q3);die();
     if(mysqli_num_rows($e4)==0)
     {
          //upload file
        $target_file="image/student/";
        move_uploaded_file($image, $target_file.basename($image_name));
        //upload file end
        $q5="INSERT INTO `student`( `name`, `email`, `phone`, `password`, `gender`, `nationality`, `image`, `college`, `sem`, `department`) VALUES ('$name','$email','$phone','$password','$gender','$nationality','$image_name','$college','$sem','$department')";
        $e5=mysqli_query($conn,$q5);
        $msg="Register succesfully";
     }
     else
     {

      $msg="Account already exit";
     }
    }
    else
    {
      $msg="";
    }
   ?>
<?PHP 
$q3="select * from `course`";
$e3=mysqli_query($conn,$q3);
?>
<?PHP 
  $q4="select * from `banner` where `status` = '1'";
  $e4=mysqli_query($conn,$q4);

  $q6="select * from `about`";
  $e6=mysqli_query($conn,$q6);
  $ra=mysqli_fetch_row($e6);

  $q7="select * from `service`";
  $e7=mysqli_query($conn,$q7);
  $rs=mysqli_fetch_row($e7);

  $q8="select * from `contact`";
  $e8=mysqli_query($conn,$q8);
  $rc=mysqli_fetch_row($e8);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      body {
        overflow-x: hidden;
      }
       .btn:hover{
        background-color:green;
      }
      .navbar a h1 b i{
        color:white;
      }
      .navbar ul li a:hover{
        background-color:white;
        border-radius:7px;
      }
      .collapse ul li a{
        margin-left:18px;
      }
      /* .carousel-item>img{height:400px;}
      .carousel-item>img{width:100%;height:520px;}
      @media only screen and (max-width:600px)
      {
        .carousel-item{height:200px;}
      }  */
    
    </style>
  </head>
  <body>
  
    <nav class="navbar navbar-expand-sm navbar-light bg-info">
        <a class="navbar-brand" href="index.php"><h1><b><i>IMS</i></b></h1></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 ml-5 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><b>Home</b><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#ab"><b>About Us</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#ab"><b>Contact Us</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#ab"><b>Service</b></a>
                </li>
          </ul>
          <nav class="navbar navbar-expand-sm navbar-light bg-info">
              <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#register">
                  Student Register
              </button>        
           </nav>
              <button type="button" class="btn btn-secondary btn-lg mr-2" data-toggle="modal" data-target="#StudentId">
                    Student Login
              </button>
              <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#modelId">
                  Login
              </button>        
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Admin Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="" method="post"> 
              <div class="form-group">
                <label for="">Adminid</label>
                <input type="text"
                  class="form-control" name="adminid" id="adminid" aria-describedby="helpId" placeholder="">
                <small id="msg1" class="form-text">*</small>
              </div>
              <div class="modal-body">
                <label for="">Password</label>
                <input type="password"
                  class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
                <small id="msg2" class="form-text">*</small>
              </div>
              <button type="submit" class="btn btn-primary" name="btn1" onclick="return validate();">Login</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Button trigger modal -->
     <!-- Modal -->
    <div class="modal fade" id="StudentId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Student Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="" method="post"> 
              <div class="form-group">
                <label for="">Emailid/Phone</label>
                <input type="text"
                  class="form-control" name="emailid" id="emailid" aria-describedby="helpId" placeholder="">
                <small id="msg3" class="form-text">*</small>
              </div>
              <div class="modal-body">
                <label for="">Password</label>
                <input type="password"
                  class="form-control" name="password" id="password1" aria-describedby="helpId" placeholder="">
                <small id="msg4" class="form-text">*</small>
              </div>
              <button type="submit" class="btn btn-primary" name="btn2" onclick="return validate1();">Login</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
   </div>
    <!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Student Register</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">    
            <div class="form-group">
            <label for="">Name</label>
            <input type="text" required
              class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" required
              class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="text" required
              class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" required
              class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
          <label for="">Gender</label><br>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="gender" id="" value="M"> M
              <input class="form-check-input" type="radio" name="gender" id="" value="F">F
            </label>
          </div>
          </div>
          <div class="form-group">
            <label for="">Nationality</label>
            <select class="form-control" name="nationality" id="">
             <option selected disabled>--select your country--</option>
              <option value="india">INDIA</option>
              <option value="srilanka">SRILANKA</option>
              <option value="bangladesh">BANGLADESH</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Upload Image</label>
            <input type="file" required class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            <small id="fileHelpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">College</label>
            <input type="text" required
              class="form-control" name="college" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Department</label>
            <input type="text" required
              class="form-control" name="department" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Sem</label>
            <select class="form-control" name="sem" id="">
              <option value="1st">1st</option>
              <option value="2nd">2nd</option>
              <option value="3rd">3rd</option>
            </select>
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <button type="submit" class="btn btn-primary" name="btn3">Register</button>
       </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php 
       if($msg!="")
       {
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <strong>Alert !</strong><?php echo"$msg"; ?> 
    </div>
    <?php
       }
       ?>
       
              <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselId" data-slide-to="1"></li>
                  <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <?php $rasult=mysqli_fetch_row($e4); ?>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img src="image/banner/<?php echo "$rasult[1]";?>" style="width: 100%; height:500px;" class="<?php if($rasult[2]== 1){ echo "d-block";} else{echo "d-none";}?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Title</h3>
                      <p>Description</p>
                    </div>
                  </div>
                  <?php
                  if(mysqli_num_rows($e4))
                  {
                    while($rasult=mysqli_fetch_row($e4))
                    {
                  ?>
                  <div class="carousel-item">
                    <img src="image/banner/<?php echo "$rasult[1]";?>" style="width: 100%; height:500px;" class="<?php if($rasult[2]== 1){ echo "d-block";} else{echo "d-none";}?>" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Title</h3>
                      <p>Description</p>
                    </div>
                  </div>
                  <?php
                  }
                  
                }?>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        
      <div class="row">
        <?php
        if(mysqli_num_rows($e3))
        {
          while($rasult=mysqli_fetch_row($e3))
          {
        ?>
            <div class="col-lg-3">
              <div class="card m-1" style="height:400px; width:400px;border:2px solid black;">
                <img class="card-img-top" src="image/course/<?php echo "$rasult[2]";?>" alt="" style="width:80%;height:80%;">
                <div class="card-body">
                  <h4 class="card-title"><?php echo "$rasult[1]";?></h4>
                  <p class="card-text">Price: <?php echo "$rasult[4]";?></p>
                </div>
              </div>
            </div>
          <?php
          }
        }?>
      </div>
          
         </div>
          <!-- Site footer -->
          <div class="row" style="margin-top:10px;border:2px solid black">
            <div class="col-lg-6">
              <h2 style="text-align:center;" id="ab"><?php echo "$ra[1]";?></h2>
              <?php
              if($ra[3]==1)
              {
              ?>
                <h5 style="margin-left:10px;"><?php echo "$ra[2]";?></h5>
              <?php
              }
              ?>
            </div>
            <div class="col-lg-3">
              <h2 style="text-align:center;" id="ab"><?php echo "$rs[1]";?></h2>
              <?php
              $q8="select * from `service`";
              $e8=mysqli_query($conn,$q8);
              while($rs1=mysqli_fetch_row($e8))
                {
                  if($rs1[3]== 1)
                  {
              ?>
                <h4 style="text-align:center;"><?php echo "$rs1[2]";?></h4>
              <?php
                }
               }
              ?>
            </div>
            <div class="col-lg-3">
            <h2 style="text-align:center;" id="ab"><?php echo "$rc[1]";?></h2>
            <?php
            if($rc[6]== 1)
            {
            ?>
               <h4 style="text-align:center;"><?php echo "$rc[2]";?></h4>
               <h4 style="text-align:center;"><?php echo "$rc[3]";?></h4>
               <h4 style="text-align:center;"><?php echo "$rc[4]";?></h4>
               <h4 style="text-align:center;"><?php echo "$rc[5]";?></h4>
            <?php
             }?>
            </div>
         </div>
             <h4 style="margin-left:600px;">&copy;copyright DESIGN & DEVELOPMENT BY <b><i><a href="index.php">RUPA</a></i></b></h4>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<script>
     function validate()
     {
      var x=document.getElementById("adminid").value;
         var y=document.getElementById("password").value;
          if(x=="" || x==null) 
          {
            document.getElementById("msg1").innerHTML="*please enter your adminid"
            document.getElementById("msg1").style.color='red';
            return false;
          }
          else
          {
            document.getElementById("msg1").innerHTML=""
            document.getElementById("msg1").style.color='gray';
          }       
          if(y=="" || y==null) 
          {
            document.getElementById("msg2").innerHTML="*please enter your password"
            document.getElementById("msg2").style.color='red';
            return false;
          } 
          else
          {
            document.getElementById("msg2").innerHTML=""
            document.getElementById("msg2").style.color='gray';
          }           
          
     }
     function validate1()
     {
      var x=document.getElementById("emailid").value;
         var y=document.getElementById("password1").value;
          if(x=="" || x==null) 
          {
            document.getElementById("msg3").innerHTML="*please enter your emailid or phone"
            document.getElementById("msg3").style.color='red';
            return false;
          }
          else
          {
            document.getElementById("msg3").innerHTML=""
            document.getElementById("msg3").style.color='gray';
          }       
          if(y=="" || y==null) 
          {
            document.getElementById("msg4").innerHTML="*please enter your password"
            document.getElementById("msg4").style.color='red';
            return false;
          } 
          else
          {
            document.getElementById("msg4").innerHTML=""
            document.getElementById("msg4").style.color='gray';
          }           
          
     }
</script>