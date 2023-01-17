<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view products</title>
    <link rel="icon" href="assets/images/favicon.png">
    <script src="https://kit.fontawesome.com/4f988cc8d0.js" crossorigin="anonymous"></script> <!--fontowsome-->
    <!-- <link rel="stylesheet" href="assets/css/viewstyle.css"> -->
    <link rel="stylesheet" href="assets/css/boots.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php  include_once 'navbar.php' ?>
<div class="container">
<h1>View Products</h1>
<input class="form-control " id="myInput" type="text" placeholder="Search here...">
<br>
    
<table class="table table-striped table-light" >
    <thead>
    <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Subcategory Name</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Qty</th>
        <th>Stock</th>
        <th>Units</th>
        <th>MRP</th>
        <th>Selling Price</th>
        <th>Status</th>
        <th colspan=2>Action</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php
    include 'connection.php';
    $sql="SELECT products.id, categories.cat_name,sub_categories.sub_name,products.product_name,products.image,products.qty,products.stock,products.units,products.mrp,products.selling_price,products.status from products INNER JOIN sub_categories ON products.sub_id = sub_categories.id  INNER JOIN categories ON sub_categories.cat_id=categories.id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['cat_name']."</td>";
        echo "<td>".$row['sub_name']."</td>";
        echo '<td>'.$row['product_name']."</td>";
        echo "<td><img src='".$row['image']."' width='50' height='50'/></td>";
        echo "<td>".$row['qty']."</td>";
        echo "<td>".$row['stock']."</td>";
        echo "<td>".$row['units']."</td>";
        echo "<td>".$row['mrp']."</td>";
        echo "<td>".$row['selling_price']."</td>";
        $status=$row['status'];
         if($status){
              echo '<td><a href="statusproducts.php?id='.$id.'&status=active" class="btn btn-success">Active</a></td>';
          }else{
             echo '<td><a href="statusproducts.php?id='.$id.'&status=deactive"class="btn btn-danger">Deactive</a></td>'; 
           }
        
        echo"<td><a href='editproducts.php?id=$id'><i class='fas fa-edit'></i></a></td>";
        echo"<td><a href='deleteproducts.php?id=$id'><i class='fas fa-trash'></i></a></td>";
        echo "</tr>";
    }
   

    ?>
    <tbody>
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