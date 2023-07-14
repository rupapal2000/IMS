<?php
include("include/config.php")
?>
<?php
if(isset($_POST['btn1']))
{
    // $name=$_POST['name'];
    //receive all data
    extract($_POST);
    $image=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];

    if($image_name != '')
    {
      $target_file="image/course/";
      move_uploaded_file($image, $target_file.basename($image_name));
    }
    else
    {
      $image_name=$image1;
    }
   
    //print_r($id ." ". $name." ".$duration." " .$fee);die();
     //queries string
        $q1="UPDATE `course` SET `name` = '$name',`img`='$image_name', `duration` = '$duration', `fee` = '$fee' WHERE `id` = '$id';";
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
       // print_r($msg);die();
         $q2="select * from `course` where `id`='$id'";
         $e2=mysqli_query($conn,$q2);
          $res=mysqli_fetch_row($e2);
      }

   else if(isset($_REQUEST['id']))
{
 extract($_REQUEST);
 $q2="select * from `course` where `id`='$id'";
  $e2=mysqli_query($conn,$q2);
  if(mysqli_num_rows($e2)==0)
  {
    header("location:allcourse.php");
  }
  $res=mysqli_fetch_row($e2);
  $msg="";
}
else
{
  header("location:allcourse.php");
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
            <label for="">Id</label>
            <input type="text" readonly
              class="form-control" name="id" value="<?php echo $res[0]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
         <div class="form-group">
            <label for="">Name</label>
            <input type="text"
              class="form-control" name="name" value="<?php echo $res[1]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Duration</label>
            <input type="text"
              class="form-control" name="duration" value="<?php echo $res[3]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Fee</label>
            <input type="text"
              class="form-control" name="fee" value="<?php echo $res[4]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Upload Image</label>
            <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            <input type="hidden" class="form-control-file" name="image1" value="<?php echo $res[2]; ?>" id="" placeholder="" aria-describedby="fileHelpId">
            <small id="fileHelpId" class="form-text text-muted">*</small>
          </div>
          
          <button type="submit" class="btn btn-primary" name="btn1">Update</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>