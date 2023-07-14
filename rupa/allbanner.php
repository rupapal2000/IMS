<?php
include("include/config.php")
?>
<?php  
    $q2="select * from `banner`";
    $e2=mysqli_query($conn,$q2);
    //print_r($q2);die();
    if(mysqli_num_rows($e2)==0)
    {
      $msg="No Record Found";
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
  </head>
   <style>
    #mytable img{height:80px;width:80px;}
   </style>
  <body>
    <div class="container-fluid">
        <?php include("include/header.php"); ?>
      <div class="row">
        <?php include("include/navbar.php"); ?>
        <div class="col-lg-9">
        <table class="table">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="mytable">
               <?php
                 while($res=mysqli_fetch_row($e2))
                 {
               ?>
              <tr>
                <td scope="row"><?php echo "$res[0]"; ?></td>
                <td>
                    <img src="image/banner/<?php echo "$res[1]"; ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </td>
                <td>
                   <a name="" id="" class="btn <?php if($res[2]==1){echo "btn-success";} else{echo "btn-danger";}?>" href="active.php?id=<?php echo "$res[0]"; ?>" role="button"><?php if($res[2]==1){echo "Active";} else{echo "Dactive";}?></a>
                </td>
                <td>
                   <a name="" id="" class="btn btn-danger" href="deletebanner.php?id=<?php echo "$res[0]"; ?>" role="button">Delete</a>
                </td>
             </tr>
             <?php 
                 }
             ?>
            </tbody>
          </table>
        <?php include("include/footer.php") ?>
    