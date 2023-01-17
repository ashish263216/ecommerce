<?php
 include 'connection.php';
 $sql="select * from login";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/boots.css">

</head>
<body>
    <?php  include_once 'navbar.php' ?>
    <div class="container-fluid">
        <div class="row text-center mt-3"><h3>Change Password</h3></div>
        <div class="row ">
                <form  method="POST" action="" >
                    <div class="col-sm-6 mx-auto my-3  mt-5 form-group">
                    <label for="">Current Password</label>
                    <input type="password" class="form-control" value="<?php echo $row['password'];?>" name="crtpassword" placeholder="Enter Current Password">
                    </div>

                    <div class="col-sm-6  mx-auto my-3 form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password">
                    </div>

                    <div class="col-sm-6 mx-auto my-3 form-group">
                    <label for="">Confirm Password</label>
                    <input type="password"  class="form-control" name="cnfpassword" placeholder="Enter Confirm Password" required>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12 mt-4">
                        <input type="submit" class="btn btn-info" name="submit" value="Change Password">
                         </div>
                    </div>

                </form>
            
        </div>
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
<?php
if(isset($_POST['submit']))
{
    if($_POST['newpassword']== $_POST['cnfpassword']){
    $sql2="update login set password='".md5($_POST['newpassword'])."'";
    mysqli_query($conn,$sql2);
    echo "<script>alert('Password change successfull')</script>";
    }else
    {
        echo "<script>alert('Incorrect Password')</script>";  
    }
}


?>