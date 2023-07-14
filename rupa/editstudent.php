<?php
include("include/config.php")
?>
<?php
if(isset($_POST['btn1']))
{
    // $name=$_POST['name'];
    //receive all data
    extract($_POST);
   
     $q2="select * from `student` where `id`='$id'";
     $e2=mysqli_query($conn,$q2);
     $res1=mysqli_fetch_row($e2);
     //print_r($q2);die();
     $image=$_FILES['image']['name'];
     if($image!="")
     {
    //upload file end
       //upload file
    $target_file="image/student/";
    $image=$_FILES['image']['tmp_name'];
    $image_name=$_FILES["image"]["name"];
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file.basename($image_name));
    $image=$target_file.$_FILES['image']['name'];
     }
     else
     {
         $image_name=$res1[7];
     }
    //upload file end
     //queries string
        $q1="update `student`set `name`='$name', `email`='$email', `phone`='$phone', `password`='$password', `gender`='$gender', `nationality`='$nationality', `image`='$image_name', `college`='$college', `sem`='$sem', `department`='$department' where `id`='$id'";
        //execution string
        $e1=mysqli_query($conn,$q1);
        if($e1)
        {
          $msg="updated successfully";
        }
        else
        {
            $msg="updation failed";
        }
        $q2="select * from `student` where `id`='$id'";
  $e2=mysqli_query($conn,$q2);
  //print_r($q2);die();
  if(mysqli_num_rows($e2)==0)
  {
    header("location:allstudent.php");
  }
  $res=mysqli_fetch_row($e2);
      }

    else if(isset($_REQUEST['id']))
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
  $msg="";
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
            <label for="">Id</label>
            <input type="text" readonly
              class="form-control" name="id" value="<?php echo $res[0]; ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
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
          <?php $z=($res[4]=='M')?'checked':'';echo"$z"; ?>
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="gender" id="" value="M"  <?php $z=($res[5]=='M')?'checked':'';echo"$z"; ?>> M
              <input class="form-check-input" type="radio" name="gender" id="" value="F"  <?php $z=($res[5]=='F')?'checked':'';echo"$z"; ?>>F
            </label>
          </div>
          </div>
          <div class="form-group">
            <label for="">Nationality</label>
            <select class="form-control" name="nationality" id="">
             <option selected disabled>--select your country--</option>
              <option value="india" <?php $z=($res[6]=='india')?'selected':'';echo"$z"; ?>>INDIA</option>
              <option value="srilanka" <?php $z=($res[6]=='srilanka')?'selected':'';echo"$z"; ?>>SRILANKA</option>
              <option value="bangladesh" <?php $z=($res[6]=='bangladesh')?'selected':'';echo"$z"; ?>>BANGLADESH</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Upload Image</label>
            <input type="file" value="" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
            <img src="image/student/<?php echo $res[7];?>" style="height:80px;width:80px;"/>
            <small id="fileHelpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">College</label>
            <input type="text" value="<?php echo $res[8]; ?>"
              class="form-control" name="college" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Department</label>
            <input type="text" value="<?php echo $res[10]; ?>"
              class="form-control" name="department" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Sem</label>
            <select class="form-control" name="sem" id="">
              <option value="1st" <?php $z=($res[9]=='1st')?'selected':'';echo"$z"; ?>>1st</option>
              <option value="2nd" <?php $z=($res[9]=='2nd')?'selected':'';echo"$z"; ?>>2nd</option>
              <option value="3rd" <?php $z=($res[9]=='3rd')?'selected':'';echo"$z"; ?>>3rd</option>
            </select>
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <button type="submit" class="btn btn-primary" name="btn1">Update</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>