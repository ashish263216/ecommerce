<?php
include 'connection.php';
$id=$_GET['id'];
$sql="delete from sub_categories where id=$id";
mysqli_query($conn,$sql);
echo "<script>alert('Delete Successfully')</script>";
echo "<script>window.location='viewsubcategories.php'</script>";
?>