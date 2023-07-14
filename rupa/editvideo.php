<?php
include("include/config.php")
?>
<?php
if(isset($_POST['btn1']))
{
    // $name=$_POST['name'];
    //receive all data
    extract($_POST);
     //queries string
        $q1="update `video` set `cid`='$cid', `title`='$title', `link`='$link' where `id`='$id'";
        //execution string) VALUE
        $e1=mysqli_query($conn,$q1);
        if($e1)
        {
          $msg="updated successfully";
          header("location:allvideo.php");
        }
        else
        {
            $msg="updation failed";
        }
    }
   else if(isset($_REQUEST['id']))
  {
   extract($_REQUEST);
   $q3="select * from `video` where `id`='$id'";
    $e3=mysqli_query($conn,$q3);
    if(mysqli_num_rows($e3)==0)
    {
      header("location:allvideo.php");
    }
    $res3=mysqli_fetch_row($e3);
  $q2="select * from `course`";
  $e2=mysqli_query($conn,$q2);
  //print_r($q2);die();
  if(mysqli_num_rows($e2)==0)
  {
    $msg="No Record Found";
  }
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
            <label for="">Id</label>
            <input type="text"
              class="form-control" readonly name="id" id="" value="<?php echo"$res3[0]";  ?>" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Course Name</label>
            <select class="form-control" name="cid" id="">
             <option selected disabled>--select course name--</option>
             <?php
                 while($res=mysqli_fetch_row($e2))
                 {
               ?>
             <option value="<?php echo"$res[0]"; ?>"<?php $z=($res[0]==$res3[1])?'selected':'';echo $z; ?>><?php echo"$res[1]"; ?></option>
                <?php  
                 } 
                ?>
              
            </select>
          </div>
         
          <div class="form-group">
            <label for="">Title</label>
            <input type="text"
              class="form-control" name="title" id="" value="<?php echo"$res3[2]";  ?>" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <div class="form-group">
            <label for="">Link</label>
            <input type="text"
              class="form-control" name="link" id="" value="<?php echo"$res3[3]";  ?>" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
          </div>
          <button type="submit" class="btn btn-primary" name="btn1">Update</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>