<?php
  include("include/config.php")
  ?>

  <?php 
    if(isset($_REQUEST['id']))
    {
      extract($_REQUEST);
    
    $q2="select * from `partpayment` where `oid`='$id'";
    $e2=mysqli_query($conn,$q2);
    //print_r($q2);die();
    if(mysqli_num_rows($e2)==0)
    {
      $msg="No Record Found";
    }
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
    #mytable img{height:80px;width:80px;}
   </style>
  </head>
  <body>
    <div class="container-fluid">
    <?php include("include/header.php"); ?>
      <div class="row">
      <?php include("include/navbar.php"); ?>
        <div class="col-lg-9">
            
              <input type="text"
                class="form-control mt-2" name="myinput" id="" aria-describedby="helpId" placeholder="Search By Anything">
              
        <table class="table">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Total Fee</th>
                <th>Datetime</th>
              </tr>
            </thead>
            <tbody id="mytable">
               <?php
                 while($res=mysqli_fetch_row($e2))
                 {
                  $q3="SELECT a.name, b.cid FROM course a, myorder b WHERE b.id ='$id' and a.id = b.cid";
                  $e3=mysqli_query($conn,$q3);
                  $res3=mysqli_fetch_row($e3);
                  
                  $q4="select * from `student` where `id`='$res[1]'";
                  $e4=mysqli_query($conn,$q4);
                  $res4=mysqli_fetch_row($e4);
                  
               ?>
              <tr>
                <td scope="row"><?php echo "$res[0]"; ?></td>
                <td><?php echo "$res4[1]"; ?></td>
                <td><?php echo "$res3[0]"; ?></td>
                <td><?php echo "$res[3]"; ?></td>
                <td><?php echo "$res[4]"; ?></td> 
             </tr>
             <?php 
                 }
             ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>