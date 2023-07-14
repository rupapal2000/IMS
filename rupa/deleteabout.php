<?php
include("include/config.php");
?>
<?php
  if(isset($_REQUEST['id']))
  {
    $id=$_REQUEST['id'];
    $q2="select * from `about` where `id`='$id'";
    $e2=mysqli_query($conn,$q2);
    
    if(mysqli_num_rows($e2)==0)
    {
      header("location:allabout.php");
    }
    else
    {
        $res=mysqli_fetch_row($e2);
    }
  }
 else
 {
   header("location:allabout.php");
 }
?>
<?php
if(isset($_POST['btn1']))
 {
    $dl="DELETE FROM `about` WHERE `id`='$id'";
    $dle=mysqli_query($conn,$dl);
    header("location:allabout.php");
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
         <h1 class="text-danger text-center">Are You Sure?</h1>
         <form action="" method="post" enctype="multipart/form-data">
           <div class="form-group">
             <label for=""></label>
             <input type="hidden" readonly value="<?php echo "$res[0]"; ?>"
               class="form-control" name="id" id="" aria-describedby="helpId" placeholder="">
             <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
           </div>
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" value="<?php echo "$res[1]"; ?>"/>
          </div>
          <div class="form-group">
            <label for="">Content</label>
            <input type="text"
              class="form-control" name="title" id="" value="<?php echo "$res[2]"; ?>"  aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
        </div>
         
         <button type="submit" class="btn btn-primary" name="btn1">Yes</button></a>
         <a href="allabout.php"><button type="button" class="btn btn-primary" name="btn1">No</button></a>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>