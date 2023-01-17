<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view users</title>
    <link rel="icon" href="assets/images/favicon.png">
    <script src="https://kit.fontawesome.com/4f988cc8d0.js" crossorigin="anonymous"></script> <!--fontowsome-->
    <!-- <link rel="stylesheet" href="assets/css/viewstyle.css"> -->
    <link rel="stylesheet" href="assets/css/boots.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php  include_once 'navbar.php' ?>
<div class="container">
<h1>View Users</h1>
<input class="form-control " id="myInput" type="text" placeholder="Search here..."><br>
<table class="table  table-striped table-light" >
    <thead>
    <tr>
        <th>Id</th>
        <th>Userid</th>
        <th>Password</th>
        <th>Name</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>E-mail</th>
        <th>Phone</th>
    </tr>
</thead>
<tbody id="myTable">
    <?php
        include 'connection.php';
        $sql="select * from users";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['id']."</td>";
            echo "<td>".$row['userid']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['pincode']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['phone']."</td>";

            echo "</tr>";
        }



    ?>
    </tbody>
</table>
    </div>
<!--filter search-->
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
<!--filter search end-->




</body>
</html>