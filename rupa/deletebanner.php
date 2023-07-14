<?php
include("include/config.php")
?>
<?php
  if(isset($_REQUEST['id']))
  {
   extract($_REQUEST);
   $q2="select * from `banner` where `id`='$id'";
    $e2=mysqli_query($conn,$q2);
    
    if(mysqli_num_rows($e2)==0)
    {
      header("location:allbanner.php");
    }
    $res=mysqli_fetch_row($e2);
  }
   else if(isset($_REQUEST['id2']))
  {
   extract($_REQUEST);
   $q2="delete from `banner` where `id`='$id2'";

    $e2=mysqli_query($conn,$q2);
    
      header("location:allbanner.php");
    }
   
 else
 {
   header("location:allbanner.php");
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
            <label for="">Sl No</label>
            <input type="text"
              class="form-control" name="name" value="<?php echo $res[0]; ?>" id="" aria-describedby="helpId" placeholder="" readonly>
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="text"
              class="form-control" name="duration" value="<?php echo $res[1]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
         <a href="deletebanner.php?id2=<?php echo $res[0]; ?>"><button type="button" class="btn btn-primary" name="btn1">Yes</button></a>
         <a href="allbanner.php"><button type="button" class="btn btn-primary" name="btn1">No</button></a>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>