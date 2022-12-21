<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_name=$_POST['product_name'];
    $product_desc=$_POST['product_desc'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
 
    //$product_status='true';

    //accessign images
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

   //accessign  temperoroy image name
   $temp_img1=$_FILES['product_img1']['temp_name'];
   $temp_img2=$_FILES['product_img2']['temp_name'];
   $temp_img3=$_FILES['product_img3']['temp_name'];

   
   //checking empty condition
   if($product_name=='' || $product_desc=='' || $product_category=='' ||
   $product_brand=='' ||  $product_price=='' || $product_img1==''||
   $product_img2=='' ||   $product_img3=='' ){
    echo "<script>alert('Please fill all the availabe fields')</script>";
exit();

}else{
   move_uploaded_file( $temp_img1,"./product_images/$product_img1") ;
   move_uploaded_file( $temp_img2,"./product_images/$product_img2") ;
   move_uploaded_file( $temp_img3,"./product_images/$product_img3") ;

//insert query

$insert_products="Insert into `products` (
    product_name, product_desc, cat_id, product_brand,
    product_img1, product_img2, product_img3, product_price) values ('$product_name','$product_desc','$product_category','$product_brand','$product_img1','$product_img2','$product_img3','$product_price' )";
    $result_query=mysqli_query($connection,$insert_products);
    if( $result_query){
        echo "<script>alert('Product added Successfully')</script> ";
    }

}
  }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg=light">
    <div class="container mt-3">
        <h1 class="text-center ">Insert Product</h1>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_name" class="form-label" >Product Name</label>
    <input type="text" name="product_name" id="product_name" 
    class="form-control " placeholder="Enter Product name" 
    autocomplete="off" required>
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_desc" class="form-label" >Product Descroption</label>
    <input type="text" name="product_desc" id="product_desc" 
    class="form-control " placeholder="Enter Product description" 
    autocomplete="off" required>
</div>

<div class="form-outline mb-4 w-50 m-auto">
   <select name="product_category" id="" class="form-select">
    <option value="">Select a category</option>

<?php


$select_query="Select * from `categories` ";
$result_query=mysqli_query($connection,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
$cat_title=$row['cat_name'];
$cat_id=$row['cat_id'];
echo "  <option value='$cat_id'>$cat_title</option>";
}
?>


    <!-- <option value="">category1</option>
    <option value="">category2</option>
    <option value="">category3</option>
    <option value="">category4</option> -->
   </select>
</div>


<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_brand"  name="Product_brand" class="form-label" >Brand</label>
    <input type="text" name="product_brand" id="product_brand" 
    placeholder="Enter Product brand"  class="form-control " 
     required>
   </select>
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_img1" class="form-label" >Image 1</label>
    <input type="file" name="product_img1" id="product_img1" 
    class="form-control " 
     required>
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_img2" class="form-label" >Image 2</label>
    <input type="file" name="product_img2" id="product_img2" 
    class="form-control " 
     required>
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_img3" class="form-labe3" >Image 3</label>
    <input type="file" name="product_img3" id="product_img3" 
    class="form-control " 
     required>
</div>


<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_price" class="form-label" >Product Price</label>
    <input type="text" name="product_price" id="product_price" 
    class="form-control " placeholder="Enter Product price" 
    autocomplete="off" required>
</div>

<div class="form-outline mb-4 w-50 m-auto">
 <input type="submit" name="insert_product" class="btn btn-warning btn-sm m-auto" value="Insert Product">
</div>

</form>

    </div>
</body>
</html>