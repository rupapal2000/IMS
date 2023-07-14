<?php
include("include/config.php")
?>
<?php
 if(isset($_REQUEST['id']))
 {
    $id=$_REQUEST['id'];
    $a="select * from `banner` where `id`='$id'";
    $ea=mysqli_query($conn,$a);
    $ras=mysqli_fetch_row($ea);

    if($ras[2]==1)
    {
        $ua="UPDATE `banner` SET `status`='0' WHERE `id` = '$id'";
        $ue=mysqli_query($conn,$ua);
        header("location:allbanner.php");
    }
    else
    {
        $ua="UPDATE `banner` SET `status`='1' WHERE `id` = '$id'";
        $ue=mysqli_query($conn,$ua);
        header("location:allbanner.php");
    }
 }
 elseif(isset($_REQUEST['id1']))
 {
    $id1=$_REQUEST['id1'];
    $q="select * from `about` where `id`='$id1'";
    $eq=mysqli_query($conn,$q);
    $res=mysqli_fetch_row($eq);

    if($res[3]==1)
    {
        $ua="UPDATE `about` SET `status`='0' WHERE `id` = '$id1'";
        $ue=mysqli_query($conn,$ua);
        header("location:allabout.php");
    }
    else
    {
        $ua="UPDATE `about` SET `status`='1' WHERE `id` = '$id1'";
        $ue=mysqli_query($conn,$ua);
        header("location:allabout.php");
    }
 }
 elseif(isset($_REQUEST['id2']))
 {
    $id2=$_REQUEST['id2'];
    $q1="select * from `service` where `id`='$id2'";
    $e1=mysqli_query($conn,$q1);
    $res1=mysqli_fetch_row($e1);

    if($res1[3]==1)
    {
        $q2="UPDATE `service` SET `status`='0' WHERE `id` = '$id2'";
        $e2=mysqli_query($conn,$q2);
        header("location:allservice.php");
    }
    else
    {
        $q2="UPDATE `service` SET `status`='1' WHERE `id` = '$id2'";
        $e2=mysqli_query($conn,$q2);
        header("location:allservice.php");
    }
 }
 elseif(isset($_REQUEST['id3']))
 {
    $id3=$_REQUEST['id3'];
    $q3="SELECT * FROM `contact` WHERE `id`='$id3'";
    $e3=mysqli_query($conn,$q3);
    $res2=mysqli_fetch_row($e3);

    if($res2[6]==1)
    {
        $q4="UPDATE `contact` SET `status`='0' WHERE `id` = '$id3'";
        $e4=mysqli_query($conn,$q4);
        header("location:allcontact.php");
    }
    else
    {
        $q5="UPDATE `contact` SET `status`='1' WHERE `id` = '$id3'";
        $e5=mysqli_query($conn,$q5);
        header("location:allcontact.php");
    }
 }
//  else
//  {
//      header("location:profile.php");
//  }
?>