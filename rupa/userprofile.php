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
    <?php include("include/header1.php"); ?>
      <div class="row">
      <?php include("include/navbar1.php"); ?>
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-3">
              <div class="card">
              <a href="allcourse.php"> 
                <img src="image/icon/f2.png" class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                  <h4 class="card-title">Course</h4>
                  <p class="card-text">(0)</p>
                </div>
              </a>  
              </div>
             </div>
            <div class="col-lg-3">
              <div class="card">
              <a href="allorder.php"> 
                <img src="image/icon/f4.png" class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                  <h4 class="card-title">Order</h4>
                  <p class="card-text">(0)</p>
                </div>
                </a>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>