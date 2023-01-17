<?php
$id =  $_GET['id'];
$status =  $_GET['status'];
// $unactive =  $_GET['unactive'];
include "connection.php";


if($status == 'active')
{
mysqli_query($conn,"UPDATE `products` SET `status` = '0' where id='$id'");

  // echo"<script>alert('Category Deactive Successfully')</script>";
}
else
{
 mysqli_query($conn,"UPDATE `products` SET `status` = '1' where id='$id'");

  // echo"<script>alert('Category Active Successfully')</script>";
}

  echo"<script>window.location='viewproducts.php'</script>";
  
 ?> 