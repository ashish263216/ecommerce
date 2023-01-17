<?php  
include'connection.php';
$sql="SELECT *FROM categories";
$result=mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add SubCategories</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/boots.css">
    <style>
        body{
          background-color:#7d9d62;
        }
    </style>
</head>
<body>
    <div class="container-fluid ">
    <?php  include_once 'navbar.php' ?>
          <div class="row text-center">
            <h2 class="mt-3">Add Subcategories </h2>
          </div>

            <form method="POST"  action=" " enctype="multipart/form-data">
              
                <div class=" col-sm-6 form-group  mx-auto">
                    <label for="">Categories</label>

                    <select class="form-control" name="cat_id">
                         <option>Select categories</option>
                         <?php
                        while($row=mysqli_fetch_assoc($result))
                        {

                         ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['cat_name']; ?></option>
                        

                        <?php 

                            }
                        ?>  
                    </select>
              </div>
          
              <div class=" col-sm-6 form-group mt-5 mx-auto">
                <label for="">Subcategory</label>
               <input type="text" class="form-control" name="sub_name" placeholder="Enter Subcategory">
                </div>
                
              <div class=" col-sm-6 form-group mt-5 mx-auto">
                <label for="">Photo</label>
                     <input accept="image/*" type='file' id="imgInp" name="fileToUpload" class="form-control" />
                       <br>
                     <img id="blah" src="#" alt=" preview image"  width="100"  height="100" />
              </div>

              <div class="col-sm-12 text-center">
              <input type="submit" name="submit" value="Add SubCategory +" class="btn btn-primary mt-5">
              </div>
            </form>
          

    
      </div>

  <!--upload image preview start-->
      <script>
        imgInp.onchange = evt => {
         const [file] = imgInp.files
             if (file) {
           blah.src = URL.createObjectURL(file)
          }
        }
        </script>
<!--upload image preview end-->

</body>
</html>

<?php  
include'connection.php';

if(isset($_POST["submit"])) 
{
$target_dir = "uploads/";//path
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql="INSERT INTO sub_categories(cat_id,sub_name,image)values('".$_POST['cat_id']."','".$_POST['sub_name']."','".$target_file."')";
       if (mysqli_query($conn, $sql)) {
  echo 'New record created successfully';
}

    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
   
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  echo"<script>alert('Subcategory has been added successfully')</script>";
  echo"<script>window.location='subcategories.php'</script>";
}
?>