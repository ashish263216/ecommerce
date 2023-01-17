
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
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
<div class="container">
        <div class="row text-center">
            <h2 class="mt-3"> Add Products</h2>
        </div>
            <form  method="POST"  action=" " enctype="multipart/form-data">
              <div class="row">

                <div class=" col-sm-6 form-group   mx-auto">
                    <label for="">Categories</label>

                    <select class="form-control" name="cat_id">
                    <option>Select Categories</option>
                    <?php
                        include 'connection.php';
                        $sql="select * from categories";
                        $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result))
                      {
                        ?>

                          <option value="<?php echo $row['id']; ?>"><?php echo $row['cat_name']; ?></option>
                          
                          <?php
                      }
                      ?>

                    </select>
              </div>
          
              <div class=" col-sm-6 form-group  mx-auto">
                <label for="">Subcategory</label>
                <select class="form-control" name="sub_id">
                    <option>Select Subcategories</option>

                     <?php
                     $sql="select * from sub_categories";
                     $result=mysqli_query($conn,$sql);

                     while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['sub_name']; ?></option>
                      
                    <?php
                    }
                    ?>
               </select>
                </div>
                  </div>

                  <div class="row">

                <div class=" col-sm-6 form-group  mt-2 mx-auto">
                    <label for="">Product name</label>
                    <input type="text" name="product_name" class="form-control"  placeholder="Enter Product Name" >
                  </div>

                  <div class=" col-sm-6 form-group mt-2 mx-auto">
                    <label for="">MRP</label>
                    <input type="text" name="mrp" class="form-control"  placeholder="Original Price" >
                  </div>

                  </div>

                  <div class="row">
                  <div class=" col-sm-6 form-group  mt-2 mx-auto">
                    <label for="">Selling Price</label>
                    <input type="text" name="selling_price" class="form-control"  placeholder="Offer Price" >
                  </div>
    
                  <div class=" col-sm-6 form-group  mt-2 mx-auto">
                    <label for="">Units</label>
                    <select class="form-control" name="units">
                    <option>Pcs</option>
                    <option>Kg</option>
                    <option>Liter</option>
                  </select>
                  </div>

                  </div>

                  <div class="row">

                  <div class=" col-sm-6 form-group mt-2 mx-auto">
                    <label for="">Qty</label>
                    <input type="text" name="qty" class="form-control" value="1" read only >
                  </div>

                  <div class=" col-sm-6 form-group mt-2 mx-auto">
                    <label for="">Stock</label>
                    <input type="text" name="stock" class="form-control"  placeholder="Total stock" >
                  </div>

                  </div>
                  <div class="row">
                  
              <div class=" col-sm-4 form-group  mt-2 mx-auto">
                <label for="">Photo</label>
                     <input accept="image/*" type='file' id="imgInp" name="fileToUpload" class="form-control" />
                       <br>
                     <img id="blah" src="#" alt="preview image"  width="100"  height="100" />
              </div>

              <div class="col-sm-12 text-center">
              <input type="submit" name="submit" value="Add Product +" class="btn btn-primary mt-5"><br><br>
              </div>
                  </div>
            </form>
        
          </div>
    
      </div>

       <!--image upload preview script start-->
      <script>
        imgInp.onchange = evt => {
         const [file] = imgInp.files
             if (file) {
           blah.src = URL.createObjectURL(file)
          }
        }
        </script>
      <!--image upload preview script end-->

</body>
</html>

<?php  
include'connection.php';

if(isset($_POST["submit"])) 
{
$target_dir = "uploads/";//path
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql="INSERT INTO products(cat_id,sub_id,product_name,image,qty,stock,units,mrp,selling_price)values('".$_POST['cat_id']."','".$_POST['sub_id']."','".$_POST['product_name']."','".$target_file."','".$_POST['qty']."' , '".$_POST['stock']."' ,'".$_POST['units']."' , '".$_POST['mrp']."', '".$_POST['selling_price']."')";
        mysqli_query($conn,$sql);

    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  echo"<script>alert('Product has been  added successfully')</script>";
  
  echo"<script>window.location='products.php'</script>";



}
?>
