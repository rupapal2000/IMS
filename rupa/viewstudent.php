<?php
include("include/config.php")
?>
<?php
  if(isset($_REQUEST['id']))
  {
   extract($_REQUEST);
   $q2="select * from `student` where `id`='$id'";
    $e2=mysqli_query($conn,$q2);
    //print_r($q2);die();
    if(mysqli_num_rows($e2)==0)
    {
      header("location:allstudent.php");
    }
    $res=mysqli_fetch_row($e2);
  }
 else
 {
   header("location:allstudent.php");
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
         
         <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text"
              class="form-control" name="name" value="<?php echo $res[1]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text"
              class="form-control" name="email" value="<?php echo $res[2]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="text"
              class="form-control" name="phone" value="<?php echo $res[3]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password"
              class="form-control" name="password" value="<?php echo $res[4]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
          <label for="">Gender</label><br>
          <div class="form-check form-check-inline">
          <?php echo $res[5]; ?>
          </div>
          </div>
          <div class="form-group">
            <label for="">Nationality</label>
            <?php echo $res[6]; ?>
          </div>
          <div class="form-group">
            <label for="">Upload Image</label>
            <img src="image/student/<?php echo $res[7]; ?>" style="height:80px;width:80px;"/>
            <small id="fileHelpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">College</label>
            <input type="text"
              class="form-control" value="<?php echo $res[8]; ?>" name="college" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Department</label>
            <input type="text"
              class="form-control"  value="<?php echo $res[9]; ?>" name="department" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Sem</label>
            <?php echo $res[10]; ?>
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
         <a href="allstudent.php"><button type="button" class="btn btn-primary" name="btn1">Back</button></a>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>