
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <!-- Boxiocns CDN Link -->
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/css/boots.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <style>
       td{
         text-align:center;
       }
     </style>
   </head>
<body>
<!--navbar-->
<?php include 'navbar.php';?>
<!--navbar end-->
 
<!--section start-->
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Welcome <?php echo "".$_SESSION['userid']."";?></span>
      
      <!-- <div class="search">
        <div class="search_container">
          <i class='bx bx-search-alt-2 srcimg'></i>
        <input type="text" name="search" placeholder="Search here" id="src">
        </div>
      </div> -->
      <div class="search">
      
      <input class="form-control " id="myInput" type="text" placeholder="Search here...">
      </div>

      <div id="time">
        
      </div>
      
    </div>

        <div class="main" style="width=100%;">
            <div class="box_container">
            <div class="box"><h5>Products</h5> <h3>50 +</h3></div>
            <div class="box"><h5>New Users <h3>101 + </h3></h5></div>
            <div class="box"><h5>New Orders</h5> <h3>555 +</h3></div>
            <div class="box"><h5>Total Profit</h5> <h3>7.5M +</h3></div>
         </div>
          
         <!-- <div class="barchart1"><canvas id="myChart"></canvas> </div> -->
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
           $sql5="select distinct orders.id,orders.name,orders.address,orders.pincode,orders.mobile_no,orders.email,orders.total_amount,orders.payment_mode,orders.order_date,order_items.order_status from orders inner join order_items on orders.id=order_items.order_id order by orders.order_date DESC LIMIT 10";
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
</section>

    
    
  

  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e)=>{
     let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
     arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });
    </script>
  


    <!--filter search  script start-->
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
    <!--filter search script end-->

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="assets/js/chart.js"></script>
 <script>
   function fun(value,id)
   {
    
    let url = "http://localhost/admin/index.php";
     window.location.href= url+"?id="+id+"&status="+value;
     alert('update Successfully');
     window.location='index.php';

     }

  
 </script>

     
</body>
</html>

<?php
  // if(isset($_GET['id'])&&($_GET['status']))
  // {
  //   $sql="update orders set order_status='".$_GET['status']."' where id='".$_GET['id']."'";
  //   mysqli_query($conn,$sql);
  //   "<script>window.location='index.php'</script>";
    
    
  // }

?>
<?php  include'footer.php' ?>

1