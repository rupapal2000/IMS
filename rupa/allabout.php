<?php
  include("include/config.php")
  ?>

  <?php  
    $q2="select * from `about`";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="mytable">
               <?php
               $i=1;
                 while($res=mysqli_fetch_row($e2))
                 {
               ?>
                        <tr>
                          <td scope="row"><?php echo "$i"; ?></td>
                          <td><?php echo "$res[1]"; ?></td>
                          <td><?php echo "$res[2]"; ?></td>
                          <td>
                             <a name="" id="" class="btn <?php if($res[3]==1){echo "btn-success";} else{echo "btn-danger";}?>" href="active.php?id1=<?php echo "$res[0]"; ?>" role="button"><?php if($res[3]==1){echo "Active";} else{echo "Dactive";}?></a>
                         </td>
                          <td>
                            <a name="" id="" class="fa fa-trash-o" style="font-size:40px;color:red;" href="deleteabout.php?id=<?php echo "$res[0]"; ?>" role="button"></a>
                          </td>
                      </tr>
             <?php 
             $i++;
                 }
             ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>