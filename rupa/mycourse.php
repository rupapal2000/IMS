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
    $q2="select * from `myorder` where `sid`='$sid'";
    $e2=mysqli_query($conn,$q2);
    //print_r($q2);die();
    if(mysqli_num_rows($e2)==0)
    {
      $msg="No Record Found";
    }
    ?>
    <?php
        if(isset($_REQUEST['x']))
        {
        extract($_REQUEST);
        $msg=$_REQUEST['x'];
        }
        else
        {
            $msg="";
        }
    ?>
      <div class="row">
      <?php include("include/navbar1.php"); ?>
        <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12">
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
          </div>
          </div>
        <div class="row">
        <?php
                 while($res=mysqli_fetch_row($e2))
                 {
                  $q3="select * from `course` where `id`='$res[2]'";
                  //print_r($q3);die();
                  $e3=mysqli_query($conn,$q3);
                  $res3=mysqli_fetch_row($e3);
                  $q4="select * from `student` where `id`='$res[1]'";
                  $e4=mysqli_query($conn,$q4);
                  $res4=mysqli_fetch_row($e4);
                  
               ?>
            <div class="col-lg-3">
              <div class="card" style="height:450px;">
              <a href="allcourse.php"> 
                <img src="image/icon/f2.png" class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                  <h4 class="card-title"><?php echo "$res3[1]"; ?></h4>
                  <p class="card-text"><a href="myvideo.php?id=<?php echo "$res3[0]"; ?>">See More >></a></p>
                </div>
              </a>  
              </div>
             </div>
             <?php 
                 }
             ?>
          </div>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>