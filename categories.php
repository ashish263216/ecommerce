<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Categories</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/boots.css">
    <style>
        body{
            /* background-color:#1ecbe1; */
            background-color:#7d9d62;
        }
        .submitcenter{
          text-align:center;
        }
    </style>
</head>
<body>
    <div class="container-fluid ">
    <?php include_once 'navbar.php' ?>
          <div class="row text-center">
            <h2 class="mt-3"> Add Categories </h2>
           </div>
           
            <form  method="POST"  action="" enctype="multipart/form-data">
              
                <div class=" col-sm-6 form-group  mx-auto ">
                    <label for="">Categories</label>
                    <input type="text"  class="form-control "  name="cat_name" placeholder="Enter category" required>
              </div>
                
              <div class=" col-sm-6 form-group mt-5 mx-auto ">
                      <label for="">Photo</label>
                     <input accept="image/*" type='file' id="imgInp" name="fileToUpload" class="form-control " />
                       <br>
                     <img id="blah" src="#" alt="preview image"  width="100"  height="100" />
              </div>

           <div class="row">
              <div class="col-sm-12 text-center">
              <input type="submit" name="submit"  value="Add Category +" class="btn btn-primary mt-5 ">
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
include'connection.php';

if(isset($_POST["submit"])) 
{
$target_dir = "uploads/";//path
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql="INSERT INTO Categories(cat_name,image)values('".$_POST['cat_name']."','".$target_file."')";
        mysqli_query($conn,$sql);

    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
   echo"<script>alert('Category has been added successfully')</script>";
   echo"<script>window.location='categories.php'</script>";
}
?>