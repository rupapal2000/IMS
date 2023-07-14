<?php
  include("include/config.php")
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
    #mytable img{height:80px;width:80px;}
   </style>
  </head>
  <body>
    <div class="container-fluid">
    <?php include("include/header1.php"); ?>
    <?php  
    if(isset($_REQUEST['id']))
    {
    extract($_REQUEST);
    $q2="select * from `myorder` where `sid`='$sid' and `cid`='$id'";
    $e2=mysqli_query($conn,$q2);
    //print_r($q2);die();
    if(mysqli_num_rows($e2)==0)
    {
      header("location:mycourse.php?x=you are unatherized for this course");
    }
    $q2="select * from `video` where `cid`='$id'";
    $e2=mysqli_query($conn,$q2);
    //print_r($q2);die();
    if(mysqli_num_rows($e2)==0)
    {
      $msg="No Record Found";
    }
    }
    else
    {
      header("location:mycourse.php");
    }
    ?>
      <div class="row">
      <?php include("include/navbar1.php"); ?>
        <div class="col-lg-9">
               <?php
                 while($res=mysqli_fetch_row($e2))
                 {
                  $q3="select * from `course` where `id`='$res[1]'";
                  //print_r($q3);die();
                  $e3=mysqli_query($conn,$q3);
                  $res3=mysqli_fetch_row($e3);
                ?>
              <details style="padding: 10px 10px;box-shadow:0px 0px 3px gray;margin:10px;">
                 <summary><?php echo "$res[2]"; ?></summary>
                 <iframe width="400" height="200" src="<?php echo "$res[3]"; ?>" title="HTML summer Training 1st class" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </details> 
             <?php 
                 }
             ?>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>