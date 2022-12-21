<?php
include('includes/connect.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="./images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>amazon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>



    <header>
        <nav class="navbar  navbar-expand-lg variant-dark bg-dark">
            <li><button class="openbtn bg-dark" onclick="openNav()">☰</button>
                <a class="navbar-brand ms-3 bg-dark" href="/ecommerse/index.php"> amazon</a>

                <span class="dropdown ">

            <li class="nav  text-white   text-white">
                <a class="nav-link active  text-white" aria-current="page" href="Cart.php"><i
                        class='fas fa-shopping-cart' style='font-size:17px '></i></a>
            </li>

            <a class=" text-white text-decoration-none  dropdown-toggle " href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                User
            </a>

            <ul class="dropdown-menu  " aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item " href="#">Orders</a></li>
                <li><a class="dropdown-item " href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Log out</a></li>
            </ul>
            </span>
            </li>
            <form class="d-flex " action="" method="get" role="search">
                <input class="form-control justify-content-end" name="search_data" type="search"
                    placeholder="Search Products..." aria-label="Search">
                <!-- <button class="btn btn-outline-warning" type="submit"><i class="fas fa-search"></i></button> -->
                <input type="submit" value="Search" name="search_product" class="btn btn-outline-warning">
            </form>
        </nav>
    </header>




    <?php




// $select_query="Select * from `products` ";
if(isset($_GET['search_product'])){
    $search_data=$_GET['search_data'];
$search_query="Select * from `products` where product_name like 
  '% $search_data%' ";
$result_query=mysqli_query($connection,$search_query);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_name'];

$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "
    <h1 class='ms-2 mt-5 mb-4'>
  No Featured Products   
</h1>
    <h2 class='text-center text-danger mt-5'>
     Sorry..! No results match . No product found of this category </h2>";
}else{


while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_name=$row['product_name'];
$product_desc=$row['product_desc'];
$product_brand=$row['product_brand'];
$product_img1=$row['product_img1'];
$product_price=$row['product_price'];
$cat_id=$row['cat_id'];
echo "
<h1 class='ms-2 mt-5 mb-4'>
Featured Products   
</h1>
<div class='col mb-3 mt-3 ms-5  justify-content-center ' style='width: 18rem;'>
<div class='card '>
   <a href='productview.php?product_id=$product_id' class= 'text-decoration-none text-black'>
<img src='./admin/product_images/$product_img1' alt='$product_name' class='card-img-top'>
<div class='card-body'>
<small style='text-reset'>$product_brand</small>
<h4 class='card-title text-reset mt-1 '>$product_name</h4>
<h6>$product_desc</h6>
</a>  

<div class='rating'>
<span>
    <i class='fas fa-star'></i>
    <i class='fas fa-star'></i>
    <i class='fas fa-star'></i>
    <i class='fas fa-star'></i>
    <i class='fas fa-star'></i>
</span>
</div>
<p class='card-text'>Price : ₹$product_price</p>
<a href='#' class='btn btn-warning btn-sm'>Add to Cart</a>
  </div>
</div>
</div>  ";
  }  
}}
?>














    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <h3 style="font-weight:bold;">Categories</h3>

        <?php

$select_cat= "Select * from `categories`";
$result_cat=mysqli_query($connection,$select_cat);
// $row_data=mysqli_fetch_assoc($result_cat);
// echo $row_data['cat_name'];

while($row_data=mysqli_fetch_assoc($result_cat)){
  $cat_name=$row_data['cat_name'];
  $cat_id=$row_data['cat_id'];
  echo " <a href='index.php?category=$cat_id'>$cat_name</a>";
}
?>
    </div>











    <!-- ---------------------------------------html end--------------------------------------------------------------------------- -->


    <!-- ---------------------------------------html end--------------------------------------------------------------------------- -->



    <!-- -----------------------------------bootsrap js------------------------------------------------------------------------------- -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- ----------------------------------------bootsrap js-------------------------------------------------------------------------- -->







    <!-- ------------------------footer start------------------------------------------------------------------------------ -->
    <footer id="#footer" class="bg-light text-center footer  text-white  ">
        <hr style="font-weight:bold">
        <!-- Grid container -->
        <div class="container p-4 pb-0">

            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: black ">
            © 2022 Copyright:
            <a class="text-white" style="text-decoration:none">vaibhavrandale.com

        </div>
        <!-- Copyright -->
    </footer>
    <!-- ------------------------footer end------------------------------------------------------------------------------ -->

    <script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
    </script>


</body>

</html>