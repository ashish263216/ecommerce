<?php
include'connection.php';
$id=$_GET['id'];
$sql="DELETE FROM categories where id=$id";
mysqli_query($conn,$sql);
echo"<script>alert('delete successfully')</script>";
echo"<script>window.location='viewcategories.php'</script>";
?>