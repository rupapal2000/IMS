<?php
  include("include/config.php")
  ?>

  <?php  
    $q2="select * from `student`";
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
                class="form-control mt-2" name="" id="myinput" aria-describedby="helpId" placeholder="Search By Anything">
          <table class="table">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>College</th>
                <th>Sem</th>
                <th>Department</th>
                <th>RegDate</th>
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
                    <img src="image/student/<?php echo "$res[7]"; ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </td>
                <td><?php echo "$res[1]"; ?></td>
                <td><?php echo "$res[2]"; ?></td>
                <td><?php echo "$res[3]"; ?></td>
                <td><?php echo "$res[8]"; ?></td>
                <td><?php echo "$res[9]"; ?></td>
                <td><?php echo "$res[10]"; ?></td>
                <td><?php echo "$res[11]"; ?></td>
                <td>
                   <a name="" id="" class="btn btn-primary" href="editstudent.php?id=<?php echo "$res[0]"; ?>" role="button">Edit</a>
                   <a name="" id="" class="btn btn-success" href="viewstudent.php?id=<?php echo "$res[0]"; ?>" role="button">View</a>
                   <a name="" id="" class="btn btn-danger" href="deletestudent.php?id=<?php echo "$res[0]"; ?>" role="button">Delete</a>
                </td>
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