<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view orders</title>
    <link rel="icon" href="assets/images/favicon.png">
    <script src="https://kit.fontawesome.com/4f988cc8d0.js" crossorigin="anonymous"></script> <!--fontowsome-->
    <!-- <link rel="stylesheet" href="assets/css/viewstyle.css"> -->
    <link rel="stylesheet" href="assets/css/boots.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php  include_once 'navbar.php' ?>
<div class="container">
<h1>View Orders</h1>
<input class="form-control " id="myInput" type="text" placeholder="Search here..."><br>
<!-- <table class="table  table-striped table-light" >
    <thead>
    <tr>
        <th>Id</th>
        <th>Userid</th>
        <th>Address</t>
        <th>Name</th>
        <th>Pincode</th>
        <th>Mobile_no</th>
        <th>E-mail</th>
        <th>Order_date</th>
        
    </tr>
</thead>
<tbody id="myTable"> -->
    <?php
        // include 'connection.php';
        // $sql="select * from orders";
        // $result=mysqli_query($conn,$sql);
        // while($row=mysqli_fetch_assoc($result))
        // {
        //     echo "<tr><td>".$row['id']."</td>";
        //     echo "<td>".$row['userid']."</td>";
        //     echo "<td>".$row['address']."</td>";
        //     echo "<td>".$row['name']."</td>";
        //     echo "<td>".$row['pincode']."</td>";
        //     echo "<td>".$row['mobile_no']."</td>";
        //     echo "<td>".$row['email']."</td>";
        //     echo "<td>".$row['order_date']."</td>";
        //     echo "</tr>";
        // }



    ?>
   <!--  </tbody>
</table>
 -->
   <div class="recent_order">
           <table class="table table-striped table-light">
           
           <thead>
             
             <tr class="text-center">
               
               <th>Order Id</th>
               <!-- <th>User Id</th> -->
               <th>Name</th>
               <th>Address</th>
               <th>Pin code</th>
               <th>Mobile No</th>
               <th>E-mail ID</th>
               <th>Total Amount</th>
               <th>Payment Mode</th>
               <th>Payment Status</th>
               <th>Order Date</th>
               <th>View</th>
               <th>Status</th>
               <!-- <th>Order Status</th> -->
               
              
               
             </tr>
           </thead>
           <tbody id="myTable">

           <?php
           include'connection.php';
           // $sql5="select * from orders order by order_date DESC";
           $sql5="select distinct orders.id,orders.name,orders.address,orders.pincode,orders.mobile_no,orders.email,orders.total_amount,orders.payment_mode,orders.order_date,order_items.order_status from orders inner join order_items on orders.id=order_items.order_id order by orders.order_date DESC";
            $result=mysqli_query($conn,$sql5);
            while($row=mysqli_fetch_assoc($result))
            {
              // echo"<tr><td><img src='".$row['image']."' width='100' height='100'/></td>";
              echo"<td>".$row['id']."</td>";
              // echo"<td>".$row['userid']."</td>";
              echo"<td>".$row['name']."</td>";
              echo"<td>".$row['address']."</td>";
              echo"<td>".$row['pincode']."</td>";
              echo"<td>".$row['mobile_no']."</td>";
              echo"<td>".$row['email']."</td>";
              echo"<td>".$row['total_amount']."</td>";
              echo"<td>".$row['payment_mode']."</td>";
             // echo"<td><select onchange='fun(this.options[this.selectedIndex].value,".$row['id'].")' class='btn btn-info' >
             //        <option>".$row['payment_status']."</option>
             //         <option value='Pending'>Pending</option>
                     
             //         <option value='Successfull' >Seccessfull</option>

                     
             //        </select></td>";
              echo"<td>Pending</td>";
              echo"<td>".$row['order_date']."</td>";
              echo"<td><a href='vieworderdetails.php?oid=".$row['id']."' class='btn btn-dark'>View Details</a></td>";
              // echo"<td><select onchange='fun(this.options[this.selectedIndex].value,".$row['id'].")' class='btn btn-warning'>
              //        <option>".$row['order_status']."</option>
              //        <option value='Pending'>Pending</option>
              //        <option value='Processing'>Processing</option>
              //        <option value='Ready To Ship'>Ready To Ship</option>
              //        <option value='Transist'>Transist</option>
              //        <option value='Delivered'>Delivered</option>

              // </select></td>";

              $status=$row['order_status'];
              if($status=='Delivered'){

              echo "<td><button class='btn btn-success disabled'>".$row['order_status']."</button></td>";
            
             }
             elseif($status=='cancelled'){
               echo "<td><button class='btn btn-danger disabled'>".$row['order_status']."</button></td>";
             }elseif($status=='Processing'){
               echo "<td><button class='btn btn-primary disabled'>".$row['order_status']."</button></td>";
             }elseif($status=='Transist'){
               echo "<td><button class='btn btn-secondary disabled'>".$row['order_status']."</button></td>";
                }elseif($status=='Ready To Ship'){
               echo "<td><button class='btn btn-warning disabled'>".$row['order_status']."</button></td>";
                 }


             else{
                echo "<td><button class='btn btn-info disabled'>".$row['order_status']."</button></td>";
             }
                

              echo"</tr>";




            }

          

        ?>




             
           </tbody>
           </table>
         </div>







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