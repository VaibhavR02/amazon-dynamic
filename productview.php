<?php
include('includes/connect.php');

session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>
        Product view
    </title>

    <style>
    header .navbar-brand {
        margin-left: 0px
    }

    .footer {
        margin-top: 370px;

    }

    .img-large {
        max-width: 80%;
    }

    .btn-warning:hover {
        background-color: rgba(17, 17, 226, 0.945);
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
                <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item " href="#">Orders</a></li>
                    <li><a class="dropdown-item " href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <!-- ------------------------------------------------------------------------------------ -->
                    <?php
     
     if(!isset($_SESSION['name'])){
       echo "  
         
                         <li><a class='dropdown-item' href='./user/SigninScreen.php'>Sign In</a></li>
                     </ul>
                 </span>
     ";
     }else{
         echo "  
         
                         <li><a class='dropdown-item' href='./user/SignoutScreen.php'>Sign out</a></li>
                     </ul>
                 </span>
     ";
     }
     ?>

                    <!-- <li><a class="dropdown-item" href="./user/checkout.php">Sign In in</a></li>
                </ul>
            </span> -->

                    <!-- ------------------------------------------------------------------------------------ -->
                    </li>
                    <form class="d-flex " action="search_product.php" method="get" role="search">
                        <input class="form-control justify-content-end" name="search_data" type="search"
                            placeholder="Search Products..." aria-label="Search">
                        <!-- <button class="btn btn-outline-warning" type="submit"><i class="fas fa-search"></i></button> -->
                        <input type="submit" value="Search" name="search_product" class="btn btn-outline-warning">
                    </form>
        </nav>
    </header>


    <!-- ------------------------------------------------------------------------- -->
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
    <!-- ------------------------------------------------------------------------- -->

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
    echo "<script>window.open('productview.php','_self')</script>";
}else{
$insert_query="Insert into `cart_details` 
(product_id,ip_address,quantity) Values ($get_product_id,'$get_ip_address',0)";
$result_query=mysqli_query($connection,$insert_query);
echo "<script>alert('Item added to cart')</script>";
   
echo "<script>window.open('cartscreen.php','_self')</script>";


}
}
?>

    <!-- ------------------------adding in cart------------------------------------------ -->





















    <!-- --------------------------------------------------------- -->
    <?php

if(isset($_GET['product_id'])){
  $product_id=$_GET['product_id'];
 $select_query="Select * from `products` where product_id=$product_id ";
 $result_query=mysqli_query($connection,$select_query);
 while($row=mysqli_fetch_assoc($result_query)){
 $product_name=$row['product_name'];
 $product_id=$row['product_id'];
 $cat_id=$row['cat_id'];
 $product_img1=$row['product_img1'];
 $product_img2=$row['product_img2'];
 $product_img3=$row['product_img3'];
 $product_price=$row['product_price'];
 $product_desc=$row['product_desc'];

 echo "
 <div class='container mt-3'>
 <div class='row'>

 <div class='col md-6 '>
 <img src='./admin/product_images/$product_img1' alt='product_img1' class='img-large'>
 </div>

 <div class='col md-3'>
 <ul class='list-group list-group-flush' >
  <li class='list-group-item' >
  <h1>$product_name</h1>
  </li>
  <li class='list-group-item' >
  <div class='rating'>
    <span>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
    </span>
    </div>
  </li>
  <li class='list-group-item' >Price: ₹$product_price  </li>
  
  <li class='list-group-item' ><h5>Description:</h5> $product_desc </li>

 

 </ul>
</li>
 </div>

 <div class='col md-3 mt-3'>
 <div class='card ms-5' style='width: 15rem;'>
 <div class='card-body'>

 <ul class='list-group list-group-flush'>

 <li class='list-group-item'>
 <div class='row'>
<div class='col'>Price :₹$product_price </div>

  </li>

  <li class='list-group-item'>
  
  <div class='row '>
 <div class='col'>Status: <span class='badge bg-success '>In Stock</span></div>
   </div>
   </li>

   <li class='list-group-item'>

  <div class='d-grid'>
  
  
  <a href='cartscreen.php?add_to_cart=$product_id'> <div class='btn btn-warning mt-3 ms-4' type='submit'  variant='primary'>Add to Cart </div></a>
  </div>
   
  
    

</ul>

 </div>
 </div>
 </div>
 </div>
</div>";
 }}
?>


    <!-- ------------------------------------------------------------------ -->
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
    echo "<script>window.open('cartscreen.php')</script>";
}else{
$insert_query="Insert into `cart_details` 
(product_id,ip_address,quantity) Values ($get_product_id,'$get_ip_address',0)";
$result_query=mysqli_query($connection,$insert_query);
echo "<script>alert('Item added to cart')</script>";
   
echo "<script>window.open('cartscreen.php')</script>";


}
}
?>


    <!-- ------------------------------------------------------------------ -->


    <!-- ----------------------------------------------------------------------------------------
  
 </li>
  <li class='list-group-item'>
  <div class='row xs-1 md-2 g-2' >
  <div class='col'>
  <div class='card'>
    <a href='' class='thumbnail' type='button' variant='light' >
  <img src='./admin/product_images/$product_img2' alt='$product_name'>
  <img src='./admin/product_images/$product_img3' alt='$product_name'>
    </a>
  </div>
  </div>
  </div>
  
  </li>





------------------------------
//   <ListGroup.Item>
//   <Row xs={1} md={2} className="g-2">
//     {[product.image, ...product.images].map((x) => (
//       <Col key={x}>
//         <Card>
//           <Button
//             className="thumbnail"
//             type="button"
//             variant="light"
//             onClick={() => setSelectedImage(x)}
//           >
//             <Card.Img variant="top" src={x} alt="product" />
//           </Button>
//         </Card>
//       </Col>
//     ))}
//   </Row>
// </ListGroup.Item>

------------------------------------------------------------
  -->



    <main>


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




        <!-- ------------------------footer start------------------------------------------------------------------------------ -->
        <footer id="#footer" class="bg-light footer lg text-center text-white  ">
            <hr style="font-weight:bold">
            <!-- Grid container -->
            <div class="container p-4 pb-0">

                <!-- Section: Social media -->
                <section class="mb-4">
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


            <div class="text-center p-3" style="background-color: black ">
                © 2022 Copyright:
                <a class="text-white" style="text-decoration:none">vaibhavrandale.com
            </div>
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