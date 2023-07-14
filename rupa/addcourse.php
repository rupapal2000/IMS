<?php
include("include/config.php")
?>
<?php
if(isset($_POST['btn1']))
{
    // $name=$_POST['name'];
    //receive all data
    extract($_POST);
     $q2="select * from `course` where `name`='$name' and `duration`='$duration'";
     $e2=mysqli_query($conn,$q2);
     //print_r($q2);die();
     if(mysqli_num_rows($e2)>0)
     {
       $msg="course name and duration already exist";
     }
     else
     {
        $image=$_FILES['image']['tmp_name'];
        $image_name=$_FILES['image']['name'];

        $target_file="image/course/";
        move_uploaded_file($image, $target_file.basename($image_name));
      //queries string
          $q1="INSERT INTO `course`(`name`,`img`, `duration`,`fee`) VALUES ('$name','$image_name','$duration','$fee')";
          //print_r($q1);die();
          //execution string
          $e1=mysqli_query($conn,$q1);
          if($e1)
          {
            $msg="inserted successfully";
          }
        
          else
          {
              $msg="insertion failed";
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
            <label for="">Name</label>
            <input type="text"
              class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Duration</label>
            <input type="text"
              class="form-control" name="duration" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Fee</label>
            <input type="number"
              class="form-control" name="fee" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Upload Image</label>
            <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            <small id="fileHelpId" class="form-text text-muted">*</small>
          </div>
          <button type="submit" class="btn btn-primary" name="btn1">Submit</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>