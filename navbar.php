<?php 
session_start();
if(empty($_SESSION['userid']))
{
  echo"<script>window.location='adminlogin.php'</script>";
  exit();
}
else{


  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!--sidebar start-->
 <div class="sidebar close">
    <div class="logo-details">
        <a href="index.php">
    <i class='bx bx-home-smile'></i>
        </a>
      <span class="logo_name">Admin Panel</span>
        
    </div>
    <ul class="nav-links">
        <!--dashboard-->
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt' > </i>
          <span class="link_name">Dashboard</span>

        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name " href="index.php">Dashboard</a></li>
        </ul>
      </li>

      <!--Categories-->
      <li>
        <div class="iocn-link">
          <a href="categories.php">
            <!-- <i class='bx bx-collection' ></i> -->
            <i class='bx bxs-copyright'></i>
            <span class="link_name">Categories</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="categories.php">Categories</a></li>
          <li><a href="categories.php">Add Categories</a></li>
          <li><a href="viewcategories.php">View Categories</a></li>
          <li><a href="#"></a></li>
        </ul>
      </li>
       
      <!--subcategories-->
      <li>
        <div class="iocn-link">
          <a href="subcategories.php">
            <!-- <i class='bx bx-book-alt' ></i> -->
            <i class='bx bxl-stripe'></i>
            <span class="link_name">Sub Categories</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="subcategories.php">Sub Categories</a></li>
          <li><a href="subcategories.php">Add Subcategories</a></li>
          <li><a href="viewsubcategories.php">View Subcategories</a></li>
          <li><a href="#"></a></li>
        </ul>
      </li>

      <!--Products-->

      <li>
        <div class="iocn-link">
          <a href="products.php">
            <!-- <i class='bx bx-book-alt' ></i> -->
            <i class='bx bxl-product-hunt'></i>
            <span class="link_name">Products</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
          
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="products.php">Products</a></li>
          <li><a href="products.php">Add Products</a></li>
          <li><a href="viewproducts.php">View Products</a></li>
          <li><a href="#"></a></li>
        </ul>
      </li>

      <!--Orders-->

      <li>
        <a href="vieworders.php">
          <!-- <i class='bx bx-pie-chart-alt-2' ></i> -->
          <i class='bx bx-border-all'></i>
          <span class="link_name">Orders</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="vieworders.php">Orders</a></li>
        </ul>
      </li>
 
      <!--Users-->
      <li>
        <a href=""viewusers.php>
          <!-- <i class='bx bx-pie-chart-alt-2' ></i> -->
          <i class='bx bxs-user'></i>
          <span class="link_name">Users</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="viewusers.php">Users</a></li>
        </ul>
      </li>

      <!--Analytics-->
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>

      <!--Chart-->
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      
      <!--Setting-->
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>

      <!--pofile log out-->
      <li>
    <div class="profile-details">
      <div class="profile-content">
      <img src="assets/images/profilepic.png" alt="profileImg">
       
      <ul class="sub-menu">
          <!-- <li><a class="link_name" href="products.php">Admin</a></li> -->
          <li><a href="changepassword.php">Change Password</a></li>
          <li><a href="logout.php">Log Out</a></li>
          <li><a href="#"></a></li>
        </ul>

      </div>
      <div class="name-job">
        <div class="profile_name">Admin</div>
        <div class="job">Admin</div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <!--sidebar end-->

<?php
}
?>
</body>
</html>