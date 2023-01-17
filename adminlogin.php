
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title> 
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/adminloginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span><img  src="assets/images/favicon.png" width="50" height="50"> E-commerce </span></div>
        
        <form  method="POST" action="">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Admin Name" name="userid" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="adminpassword" required >
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit"  name='login'>
          </div>
        
        </form>

      </div>
    </div>

  </body>
</html>

<?php  
if(isset($_POST['login']))
{
include'connection.php';
session_start();
session_regenerate_id(true);
$sql="SELECT * FROM login where userid='".($_POST['userid'])."' AND password='".($_POST['adminpassword'])."'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) 
{
  $_SESSION['userid']=$_POST['userid'];
  $_SESSION['password']=$_POST['adminpassword'];
echo"<script> alert('Success Login')</script>";
echo"<script>window.location='index.php' </script>";
}
else
{
  echo"<script> alert('Invalid userid or password')</script>";
}
}
?>
