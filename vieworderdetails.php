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
      <span class="text">Dashboard</span>

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

           <table class="table table-striped table-light">
           
           <thead>
             
             <tr class="text-center">
               <th>User Id</th>
               <th>Order Id</th>
               <th>Product Image</th>
               <th>Product Name</th>
               <th>Qty</th>
               <th>Price</th>
               <th>Amount</th>
               <th>Order Date</th>
               <th>Update Date</th>
               <th>Status</th>
               
              
               
             </tr>
           </thead>
           <tbody id="myTable">

           <?php

            include'connection.php';
            
            // $sql9="select * from order_items where order_id='".$_GET['oid']."'";
            $sql19= "select  order_items.order_id, order_items.userid,order_items.created_at,order_items.updated_at, order_items.id,products.product_name,products.image,order_items.price,order_items.qty,order_items.order_status from products inner join order_items on products.id=order_items.product_id where order_id='".$_GET['oid']."'";
            $result19=mysqli_query($conn,$sql19);
            
            while($row19=mysqli_fetch_assoc($result19))
              
            {
                echo "<tr>";
                echo"<td>".$row19['userid']."</td>";
              echo"<td>".$row19['order_id']."</td>";
              echo"<td><img src='../admin/".$row19['image']."' width='100' height='100' alt='no pic'/></td>";
              echo"<td>".$row19['product_name']."</td>";
              echo"<td>".$row19['qty']."</td>";
              echo"<td>".$row19['price']."</td>";
              $total=$row19['qty'] * $row19['price'];
              echo"<td>".$total."</td>";
              echo"<td>".$row19['created_at']."</td>";
              echo"<td>".$row19['updated_at']."</td>";
              echo"<td><select onchange='fun1(this.options[this.selectedIndex].value,".$row19['id'].")' class='btn btn-warning'>
                     <option>".$row19['order_status']."</option>
                     <option value='Pending'>Pending</option>
                     <option value='Processing'>Processing</option>
                     <option value='Ready To Ship'>Ready To Ship</option>
                     <option value='Transist'>Transist</option>
                     <option value='Delivered'>Delivered</option>

              </select></td>";
        
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

    <script type="text/javascript">
    function fun1(value,id) {
      let url = "http://localhost/admin/vieworderdetails.php";
     window.location.href= url+"?id="+id+"&status="+value;
     let url1 ="vieworderdetails.php";
     window.location= url1+"?oid="+<?php echo"'".$_GET['oid']."'";?>;
     alert('Update Successfully');
    }
    </script>
     
</body>
</html>
<?php  include'footer.php' ?>

<?php
  if(isset($_GET['id'])&&($_GET['status']))
  {
    $sql1="update order_items set order_status='".$_GET['status']."' where id='".$_GET['id']."'";
    mysqli_query($conn,$sql1);
    "<script>window.location='vieworderdetails.php'</script>";
  }

  

  

  


?>