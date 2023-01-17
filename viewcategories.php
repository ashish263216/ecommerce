
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewcategories</title>
    <link rel="icon" href="assets/images/favicon.png">
    <script src="https://kit.fontawesome.com/4f988cc8d0.js" crossorigin="anonymous"></script> <!--fontowsome-->
    <!-- <link rel="stylesheet" href=" assets/css/viewstyle.css"> -->
    <link rel="stylesheet" href="assets/css/boots.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>
<?php  include 'navbar.php' ?>
<div class="container">
<h1>View Categories</h1>
<input class="form-control " id="myInput" type="text" placeholder="Search here...">
    <br>

<table  class="table table-striped table-light">
    <thead>
    <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Image</th>
        <th>Status</th>
        <th colspan=2>Action</th>
    </tr>
</thead>
<tbody id="myTable">
<?php
include 'connection.php';
$sql="select * from categories";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
    $id=$row['id'];
   echo "<tr><td>".$row['id']."</td>";
   echo "<td>".$row['cat_name']."</td>";
   echo "<td><img src='".$row['image']."' height='50' width='50'/></td>";
   $status=$row['status'];
     if($status){
   echo '<td><a href="statuscategories.php?id='.$id.'&status=active" class="btn btn-success">Active</a></td>';
    }else{
   echo '<td><a href="statuscategories.php?id='.$id.'&status=deactive"class="btn btn-danger">Deactive</a></td>'; 
     }
   echo"<td><a href='editcategory.php?id=$id'><i class='fas fa-edit'></i></a></td>";
  //  echo"<td><a href='deletecategory.php?id=$id'><i class='fas fa-trash'></i></a></td>";
  echo "<td><button onclick='dltdata();'><i class='fas fa-trash'></i></button></td>";
   echo "</tr>";
}
?>
</tbody> 
</table>

</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script>
    function dltdata(){
      let dlt=confirm('Are you sure you want to delete');
      if(dlt==true){
        window.location.href='deletecategory.php?id=$id';
      }else{
        window.location='viewcategories.php';
      }
    }

  </script>


</body>
</html>


