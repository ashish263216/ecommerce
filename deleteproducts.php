<?php
include 'connection.php';
$id=$_GET['id'];
$sql="delete from products where id=$id";
mysqli_query($conn,$sql);
echo"<script>alert('Delete Successfuly')</script>";
echo"<script>window.location='viewproducts.php'</script>";




?>