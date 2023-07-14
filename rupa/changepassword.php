<?php
include("include/config.php")
?>
<?php
if(isset($_POST['btn1']))
{
    // $name=$_POST['name'];
    //receive all data
    extract($_POST);
    $q2="select * from `admin` where `adminid`='$adminid' and `password`='$opassword'";
    $e2=mysqli_query($conn,$q2);
    if(mysqli_num_rows($e2)==0)
     {
       $msg="Old password does not matched";
     }
     else if($npassword!=$cpassword)
     {
        $msg="Both password does not matched";
     }
   else
   {
    //print_r($id ." ". $name." ".$duration." " .$fee);die();
     //queries string
        $q1="UPDATE `admin` SET `password` = '$npassword' WHERE `adminid` = '$adminid';";
        //execution string
        $e1=mysqli_query($conn,$q1);
       
        if($e1)
        {
          $msg="updated successfully";
        }
        else
        {
            $msg="updation failed";
        }
    }
      }
else
{
 $msg="";
}
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
    .card{margin-top:20px;}
   </style>
  </head>
  <body>
    <div class="container-fluid">
    <?php include("include/header.php"); ?>
      <div class="row">
      <?php include("include/navbar.php"); ?>
        <div class="col-lg-9">
          <?php
            if($msg!="")
            {
          ?>
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong><?php echo"$msg";  ?>!</strong> 
          </div>
          <?php
            }
          ?>
         <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Adminid</label>
            <input type="text" readonly
              class="form-control" name="adminid" value="<?php echo $_SESSION['adm']; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
         <div class="form-group">
            <label for="">Old Password</label>
            <input type="password"
              class="form-control" name="opassword"  id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">New Password</label>
            <input type="password"
              class="form-control" name="npassword" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password"
              class="form-control" name="cpassword" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          
          <button type="submit" class="btn btn-primary" name="btn1">Update</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>