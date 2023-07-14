<?php
include("include/config.php")
?>
<?php
if(isset($_POST['btn1']))
{
    // $name=$_POST['name'];
    //receive all data
    extract($_POST);
   
     $q2="select * from `contact` where `title`='$title'";
     $e2=mysqli_query($conn,$q2);
     //print_r($q2);die();
     if(mysqli_num_rows($e2)==0)
     {
        $q1="INSERT INTO `contact`(`title`, `address`, `phone1`, `phone2`, `emailid`, `status`) VALUES ('$title','$add','$phone1','$phone2','$email','0')";
        $e1=mysqli_query($conn,$q1);
        $msg= "Insert sucessfully.....";
     }
     else
     {
       
        $msg= "Already added";
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
            <label for="">Title</label>
            <input type="text"
              class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <textarea class="form-control" name="add" id="" rows="3" maxlength="250"></textarea>
          </div>
          <div class="form-group">
            <label for="">Phone1</label>
            <input type="phone"
              class="form-control" name="phone1" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Phone2</label>
            <input type="phone"
              class="form-control" name="phone2" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Email Id</label>
             <input type="email"
              class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <button type="submit" class="btn btn-primary" name="btn1">Submit</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>