<?php
include("include/config.php")
?>
<?php
if(isset($_POST['btn1']))
{
    // $name=$_POST['name'];
    //receive all data
    extract($_POST);
   
     $q2="select * from `student` where `email`='$email' or `phone`='$phone'";
     $e2=mysqli_query($conn,$q2);
     //print_r($q2);die();
     if(mysqli_num_rows($e2)>0)
     {
       $msg="email or phone number already exist";
     }
     else
     {
       //upload file
    $target_file="image/student/";
    $image=$_FILES['image']['tmp_name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file.basename($_FILES["image"]["name"]));
    $image=$target_file.$_FILES['image']['name'];
    //upload file end
     //queries string
        $q1="INSERT INTO `student`( `name`, `email`, `phone`, `password`, `gender`, `nationality`, `image`, `college`, `sem`, `department`) VALUES ('$name','$email','$phone','$password','$gender','$nationality','$image','$college','$sem','$department')";
        //execution string
        $e1=mysqli_query($conn,$q1);
        if($e1)
        {
          $msg="inserted successfully";
        }
        else
        {
            $msg="insertion failed";
        }
      }
}
else
{
   $msg="";
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
         <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text"
              class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text"
              class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="text"
              class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password"
              class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
          <label for="">Gender</label><br>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="gender" id="" value="M"> M
              <input class="form-check-input" type="radio" name="gender" id="" value="F">F
            </label>
          </div>
          </div>
          <div class="form-group">
            <label for="">Nationality</label>
            <select class="form-control" name="nationality" id="">
             <option selected disabled>--select your country--</option>
              <option value="india">INDIA</option>
              <option value="srilanka">SRILANKA</option>
              <option value="bangladesh">BANGLADESH</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Upload Image</label>
            <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            <small id="fileHelpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">College</label>
            <input type="text"
              class="form-control" name="college" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Department</label>
            <input type="text"
              class="form-control" name="department" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Sem</label>
            <select class="form-control" name="sem" id="">
              <option value="1st">1st</option>
              <option value="2nd">2nd</option>
              <option value="3rd">3rd</option>
            </select>
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <button type="submit" class="btn btn-primary" name="btn1">Submit</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>