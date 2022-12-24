<?php
include('includes/connect.php');

?>



<?php  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User  IP Address - '.$ip;  
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


    <style>
    header .navbar-brand {
        margin-left: 0px
    }

    .dropdown-menu[data-bs-popper] {
        top: 100%;
        left: -213px;
        margin-top: var(--bs-dropdown-spacer);
    }
    </style>

</head>


<body>




    <header>
        <nav class="navbar  navbar-expand-lg  variant-dark bg-dark">
            <li><button class="openbtn bg-dark" onclick="openNav()">☰</button>
                <a class="navbar-brand  bg-dark" href="/ecommerse/index.php"> amazon</a>

            <li class="nav  text-white  text-white">
                <a class="nav-link active  text-white" aria-current="page" href="cartscreen.php">
                    <i class='fas fa-shopping-cart position-relative' style='font-size:17px '>
                        <span style='font-size:10px'
                            class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">
                            <?php
    if(isset($_GET['add_to_cart'])){
        $get_ip_address=getIPAddress();
       $select_query="Select * from `cart_details` where ip_address= '$get_ip_address' ";
         $result_query=mysqli_query($connection,$select_query);
         $cart_items=mysqli_num_rows($result_query);
     } else{
    $get_ip_address=getIPAddress();
       $select_query="Select * from `cart_details` where ip_address= '$get_ip_address' ";
         $result_query=mysqli_query($connection,$select_query);
         $cart_items=mysqli_num_rows($result_query);
    }
    echo "$cart_items";
    

           ?>
                        </span>
                    </i></a>

            </li>

            <span class="dropdown ">


                <a class=" text-white text-decoration-none ms-3  dropdown-toggle " href="#" role="button"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    User
                </a>

                <ul class="dropdown-menu my-2 " aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item " href="#">Orders</a></li>
                    <li><a class="dropdown-item " href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="./user/checkout.php">Log in</a></li>
                </ul>
            </span>
            </li>
            <form class="d-flex " action="search_product.php" method="get" role="search">
                <input class="form-control justify-content-end" name="search_data" type="search"
                    placeholder="Search Products..." aria-label="Search">
                <!-- <button class="btn btn-outline-warning" type="submit"><i class="fas fa-search"></i></button> -->
                <input type="submit" value="Search" name="search_product" class="btn btn-outline-warning">
            </form>
        </nav>
    </header>


    <!-- --------------------------------------------------- -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <a href="">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="banner-5.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Newly Arrived</h5>
        <p>Some representative placeholder content for the first slide.</p> -->
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <img src="banner-8.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Newly Arrived</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <img src="banner-3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Newly Arrived</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <img src="banner-2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Newly Arrived</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <img src="banner-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Newly Arrived</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <img src="banner-11.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Newly Arrived</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
            </a>
        </div>
        <!-- --------------------------------------------------- -->









        <main>
            <h1 class="ms-2 mt-5">
                Featured Products
            </h1>

            <div id="mySidepanel" class="sidepanel">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <h3 style="font-weight:bold; color:white;">Categories</h3>

                <?php

$select_cat= "Select * from `categories`";
$result_cat=mysqli_query($connection,$select_cat);
// $row_data=mysqli_fetch_assoc($result_cat);
// echo $row_data['cat_name'];

while($row_data=mysqli_fetch_assoc($result_cat)){
  $cat_name=$row_data['cat_name'];
  $cat_id=$row_data['cat_id'];
  echo " <a href='index.php?cat=$cat_id'>$cat_name</a>";
}
?>
            </div>







            <div class="container">
                <div class="row row-cols-1 gd-4 row-cols-md-4 justify-content-center">

                    <!-- ----------fetching products---------------------------------- -->
                    <?php

//get product from categories
// if(!isset($_GET['category'])){
//   $cat_id=$_GET['category'];
  $select_query="Select * from `products`";
    $result_query=mysqli_query($connection,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_name=$row['product_name'];
    $product_desc=$row['product_desc'];
    $product_brand=$row['product_brand'];
    $product_img1=$row['product_img1'];
    $product_price=$row['product_price'];
    $cat_id=$row['cat_id'];
    echo "
    <div class='col mb-3 mt-3   justify-content-center ' style='width: 20rem;'>
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
    <a href='index.php?add_to_cart=$product_id' class='btn btn-warning btn-sm'>Add to Cart</a>
      </div>
    </div>
    </div>  ";
      }  
       
?>


                </div>
            </div>




            <!-- ---------------------------------------html end--------------------------------------------------------------------------- -->

            <!-- <div class='d-flex flex-column site-container'>
<section class='bg-light pt-5 pb-5 shadow-sm'>
<div class='container'>
<div class='row pt-5'>
  <div class='col-12'>
    <h3 class='text-uppercase border-bottom mb-4'>Equal height Bootstrap 5 cards example</h3>
    <h6>brans</h6>
  </div>
</div>
<div class='row'>
  ADD CLASSES HERE d-flex align-items-stretch
  <div class='col-lg-4 mb-3 d-flex align-items-stretch'>
    <div class='card'>
      <img src='./admin/product_images/bag1.jpg' class='card-img-top' alt='Card Image'>
      <div class='card-body d-flex flex-column'>
        <h5 class='card-title'>Dōtonbori Canal</h5>
        <p class='card-text mb-4'>Is a manmade waterway dug in the early 1600's and now displays many landmark commercial locals and vivid neon signs.</p>
        <a href='#' class='btn btn-warning mt-auto align-self-start'>Book now</a>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</div> -->
            <!-- ---------------------------------------html end--------------------------------------------------------------------------- -->



            <!-- -----------------------------------bootsrap js------------------------------------------------------------------------------- -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                crossorigin="anonymous"></script>
            <!-- ----------------------------------------bootsrap js-------------------------------------------------------------------------- -->






            <!-- // --------------------adding in cart---------------------------------------------- -->
            <?php
    if(isset($_GET['add_to_cart'])){
    $get_ip_address=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    
    $select_query="Select * from `cart_details` where ip_address= '$get_ip_address' and
     product_id=$get_product_id";
     $result_query=mysqli_query($connection,$select_query);
     $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows>0){
    echo "<script>alert('This item already inside cart')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}else{
$insert_query="Insert into `cart_details` 
(product_id,ip_address,quantity) Values ($get_product_id,'$get_ip_address',0)";
$result_query=mysqli_query($connection,$insert_query);
echo "<script>alert('Item added to cart')</script>";
   
echo "<script>window.open('index.php','_self')</script>";


}
}
?>

            <!-- ------------------------adding in cart------------------------------------------ -->


            <!-- ------------------------------------cart items------------------------------ -->
            <?php
    if(isset($_GET['add_to_cart'])){
        $get_ip_address=getIPAddress();
       $select_query="Select * from `cart_details` where ip_address= '$get_ip_address' ";
         $result_query=mysqli_query($connection,$select_query);
         $cart_items=mysqli_num_rows($result_query);
     } else{
    $get_ip_address=getIPAddress();
       $select_query="Select * from `cart_details` where ip_address= '$get_ip_address' ";
         $result_query=mysqli_query($connection,$select_query);
         $cart_items=mysqli_num_rows($result_query);
    }
    echo "$cart_items";
    

           ?>
            <!-- ------------------------------------cart items------------------------------ -->


            <!-- ------------------------footer start------------------------------------------------------------------------------ -->
            <footer id="#footer" class="bg-light text-center  text-white  ">
                <hr style="font-weight:bold">
                <!-- Grid container -->
                <div class="container  p-2 pb-0">

                    <!-- Section: Social media -->
                    <section class="mb-4 ">
                        <!-- Facebook -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #3b5998" href="#!"
                            role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #55acee" href="#!"
                            role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39" href="#!"
                            role="button"><i class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac" href="#!"
                            role="button"><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #0082ca" href="#!"
                            role="button"><i class="fab fa-linkedin-in"></i></a>

                        <!-- Section: Social media -->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center p-3 " style="background-color: black ">
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