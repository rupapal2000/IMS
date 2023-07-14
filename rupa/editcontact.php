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
        $q1="UPDATE `contact` SET `title`='$title',`address`='$add',`phone1`='$phone1',`phone2`='$phone2',`emailid`='$email' WHERE `id`='$id'";
        //execution string) VALUE
        $e1=mysqli_query($conn,$q1);
        if($e1)
        {
          $msg="updated successfully";
          header("location:allcontact.php");
        }
        else
        {
            $msg="updation failed";
        }
    }
   else if(isset($_REQUEST['id']))
  {
   extract($_REQUEST);
   $q3="select * from `contact` where `id`='$id'";
    $e3=mysqli_query($conn,$q3);
    if(mysqli_num_rows($e3)==0)
    {
      header("location:allcontact.php");
    }
    $res3=mysqli_fetch_row($e3);
  $q2="select * from `contact`";
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
             <label for=""></label>
             <input type="hidden" readonly value="<?php echo "$res3[0]"; ?>"
               class="form-control" name="id" id="" aria-describedby="helpId" placeholder="">
             <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
           </div>
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo "$res3[1]"; ?>"/>
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <input type="text"
              class="form-control" name="add" id="" value="<?php echo "$res3[2]"; ?>"  aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
        </div>
        <div class="form-group">
            <label for="">Phone1</label>
            <input type="phone1"
              class="form-control" name="phone1" id="" value="<?php echo "$res3[3]"; ?>"  aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
        </div>
        <div class="form-group">
            <label for="">Phone2</label>
            <input type="text"
              class="form-control" name="phone2" id="" value="<?php echo "$res3[4]"; ?>"  aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email"
              class="form-control" name="email" id="" value="<?php echo "$res3[5]"; ?>"  aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">*</small>
        </div>
          <button type="submit" class="btn btn-primary" name="btn1">Update</button>
         </form>
        </div>
      </div>
    </div>
     <?php include("include/footer.php") ?>