
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view subcategories</title>
    <link rel="icon" href="assets/images/favicon.png">
    <script src="https://kit.fontawesome.com/4f988cc8d0.js" crossorigin="anonymous"></script> <!--fontowsome-->
    <!-- <link rel="stylesheet" href="assets/css/viewstyle.css"> -->
    <link rel="stylesheet" href="assets/css/boots.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php  include_once 'navbar.php' ?>
<div class="container">
<h1>View SubCategories</h1>
<input class="form-control " id="myInput" type="text" placeholder="Search here...">
<br>
    
<table  class="table table-striped table-light">
    <thead>
    <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Sub Category Name</th>
        <th>Image</th>
        <th>Status</th>
        <th colspan=2>Action</th>
    </tr>
   </thead>
   <tbody id="myTable">
    <?php
    include 'connection.php';
$sql="select sub_categories.id,categories.cat_name,sub_categories.sub_name,sub_categories.image,sub_categories.status from sub_categories inner join categories on sub_categories.cat_id=categories.id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['cat_name']."</td>";
        echo "<td>".$row['sub_name']."</td>";
        echo "<td><img src='".$row['image']."' width='50' height='50'/></td>";
         $status=$row['status'];
         if($status){
              echo '<td><a href="statussubcategory.php?id='.$id.'&status=active" class="btn btn-success">Active</a></td>';
          }else{
             echo '<td><a href="statussubcategory.php?id='.$id.'&status=deactive"class="btn btn-danger">Deactive</a></td>'; 
           }
        echo"<td><a href='editsubcategory.php?id=$id'><i class='fas fa-edit'></i></a></td>";
        echo"<td><a href='deletesubcategory.php?id=$id'><i class='fas fa-trash'></i></a></td>";
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



</body>
</html>