<?php
 include'connection.php';
 $id=$_GET['id'];
 $sql="SELECT *FROM sub_categories where id=$id";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SubCategory</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/boots.css">

</head>
<body>
    <div class="container">
    <?php  include_once 'navbar.php' ?>
        <h2 class="text-center mt-5">Edit SubCategory</h2>
        <div class="row mt-5">
            <div class="col-sm-6 mx-auto">
                <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                <label>Sub Category Name</label>
                <input type="text" class="form-control" value="<?php echo $row['sub_name'];  ?>" name="name" />
                </div>

                <div class="form-group mt-3">
                <label>Photo</label>
                <input accept="image/*" type='file' id="imgInp" name="fileToUpload" class="form-control " />
                       <br>
                     <img id="blah" src='<?php echo $row['image']; ?>' alt="preview image"  width="100"  height="100" />
                </div>
             </div>
         </div>
         <div class="row mt-3">
             <div class="col-sm-12 text-center">
                  <a href="viewsubcategories.php">
                 <input type="text" value="Cancel" name="cancel" class="btn btn-danger mx-4 "style="width:100px;">
                  </a>
                <input type="submit" value="Save" name="submit" class="btn btn-primary" style="width:100px;">
             </div>
         </div>      
    </form>
            

    </div>

    <!-- upload image preview script start-->
    <script>
        imgInp.onchange = evt => {
         const [file] = imgInp.files
             if (file) {
           blah.src = URL.createObjectURL(file)
          }
        }
        </script>

      <!--upload image preview script end-->

</body>
</html>


<?php  
if(isset($_POST["submit"])) 
{
  $x=$_POST['name'];
  $sql2="update sub_categories set sub_name='".$x."' where id='".$_GET['id']."'";
  mysqli_query($conn,$sql2);
  // $y=$_FILES["fileToUpload"]['name'];
$target_dir = "uploads/";//path
$target_file = $target_dir .basename($_FILES["fileToUpload"]['name']);


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql="update sub_categories set image= '".$target_file."' where id='".$_GET['id']."'";
        mysqli_query($conn,$sql);

    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
     echo"<script>alert('Update successfully')</script>";
     echo"<script>window.location='viewsubcategories.php'</script>";
}
?>

