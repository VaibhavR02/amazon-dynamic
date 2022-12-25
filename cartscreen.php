<?php
include('includes/connect.php');
session_start();
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


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Screen</title>
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

    .pt-2 {
        padding-top: 1rem !important;
    }

    .dropdown-menu[data-bs-popper] {
        top: 100%;
        left: -213px;
        margin-top: var(--bs-dropdown-spacer);
    }

    .checkout:hover {
        background-color: blue;
        color: white;
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

            <span class="dropdown">


                <a class=" text-white text-decoration-none ms-3  dropdown-toggle " href="#" role="button"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    User
                </a>

                <ul class="dropdown-menu my-2 " aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item " href="#">Orders</a></li>
                    <li><a class="dropdown-item " href="#">
                            Action</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <!-- ------------------------------------------------------------------------------------ -->
                    <?php
     
     if(!isset($_SESSION['name'])){
       echo "  
         
                         <li><a class='dropdown-item' href='../user/SigninScreen.php'>Sign In</a></li>
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

        </nav>
    </header>



    <!-- ------------------------------------------------------------------------- -->

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
    echo "<script>window.open('index.php','_self')</script>";
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



    <!-- -------------------------------------- -->
    <?php
        $select_query="Select * from `products`";
    $result_query=mysqli_query($connection,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_name=$row['product_name'];
    $product_desc=$row['product_desc'];
    $product_brand=$row['product_brand'];
    $product_img1=$row['product_img1'];
    $product_price=$row['product_price'];
    $cat_id=$row['cat_id'];}
    ?>
    <!-- ------------------------------------------- -->














    <!-- -----------------------------new cart screen--------------------------- -->

    <h1 class='my-3 ms-2 text-center'>Shopping Cart</h1>

    <div class="container">
        <form action="" method="post">
            <div class="row">

                <table class="table-bordered text-center">

                    <?php                            
$get_ip_address=getIPAddress();
$total=0;
$cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
$result=mysqli_query($connection,$cart_query);

$result_count=mysqli_num_rows($result);
if($result_count>0){

echo "

  <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
";

while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_product="Select * from `products` where product_id='$product_id'";
   $result_product=mysqli_query($connection,$select_product);
   while($row_product_price=mysqli_fetch_array($result_product)){
  $product_price=array($row_product_price['product_price']);

  $price_table=$row_product_price['product_price'];
  $product_name=$row_product_price['product_name'];
  $product_img1=$row_product_price['product_img1'];

  $product_values=array_sum($product_price);
  $total +=$product_values;
  
  
   ?>

                    <tr>

                        <td> <a href="productview.php?product_id=<?php echo $product_id ?>">
                                <?php echo $product_name ?></a></td>
                        <td> <a href="productview.php?product_id=<?php echo $product_id ?>"><img
                                    src="./admin/product_images/<?php echo $product_img1 ?>"
                                    class='my-1 img-fluid rounded img-thumbnail' alt="<?php echo $product_name ?>"></a>
                        </td>
                        <td><input type="number" class="form-input " style="width:45px" name="qty"></td>

                        <!-- ------------------------------------------------------------------------------------ -->
                        <!-- <td>
                                <input type="number" id="typeNumber" style="width:44px" class="  form-input" />
                                <label class="form-label" for="typeNumber"></label>
                            </td> -->
                        <!-- ------------------------------------------------------------------------------------ -->

                        <?php
                            $get_ip_address=getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                $update_cart="Update `cart_details`  set quantity=$quantities where ip_address='$get_ip_address'";
                                $result_product_quantities=mysqli_query($connection,$update_cart);
                                $total=$total*$quantities;
                                
                                 $product_values=$product_values*$quantities;
                            }
                            ?>

                        <td><?php echo $product_values ?></td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>

                            <!-- <a href="" type="button" class="outline-none btn btn-light"><i
                                        class="fa-sharp fa-solid fa-pen-to-square fs-5 me-1 " variant='primary'></i></a> -->
                            <input type="submit" name="update_cart" value="update"
                                class="outline-none btn btn-success btn-sm me-1 mb-1">
                            <input type="submit" value="delete" name="remove_cart"
                                class="outline-none btn btn-danger btn-sm me-1 mb-1">

                            <!-- <a href="" type=" button" class="outline-none btn btn-light ms-1"><i
                                        class='fas fa-trash fs-5' variant='primary'></i></a> -->

                        </td>
                    </tr>
                    <?php
 }}}
 else{
    echo " 
   
    <div class='mt-2 text-center alert w-50 alert-info' role='alert'>
    Cart is empty. <a href='index.php' class='fit-content  '>Go to shopping</a>
</div> 
    ";
 }
                    ?>
                    </tbody>
                </table>
                <div class="d-flex py-3 justify-content-end">

                    <?php                            
$get_ip_address=getIPAddress();

$cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
$result=mysqli_query($connection,$cart_query);

$result_count=mysqli_num_rows($result);
if($result_count>0){ 
    echo " 
  
    <h4 class='px-3 py-2'>Subtotal: ₹<strong class='text-danger'>$total  </strong></h4>

                    <a href='./user/checkout.php'>
                        <div class='checkout btn btn-warning mt-2 ms-3' type='submit' variant='primary'>Proceed to Checkout</div>
                    </a>
                    ";
                    }
                    ?>
                </div>
            </div>
    </div>

    </form>


    <!-- ----------------------------function to remove cart item------------------------------------------------------- -->
    <?php
function remove_cart_item(){
   global $connection;
if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="Delete from `cart_details` where product_id=$remove_id";
        $run_delete=mysqli_query($connection,$delete_query);
        echo "<script>window.open('cartscreen.php','_self')</script>";
    }
}
}

echo $remove_item=remove_cart_item();
    ?>


    <!-- ---------------------------function to remove cart item------------------------------------------- -->


    <!-- -----------------------------new cart screen--------------------------- -->


















    <!-- -----------------------------old cart screen--------------------------- -->

    <!--  <h1 class='my-3 ms-2'>Shopping Cart</h1>

     <div class='alert w-50 ms-3 alert-info' role='alert'>
                    Cart is empty. <a href='index.php'>Go to shopping</a>
                </div> 
   <div class='row ms-3'>
        <div class='col md-8 '>

            <ul class='list-group'>
                <li class='list-group-item'>
                    <div class='row align-items-center '>

                        <div class='col md-4 '>

                            <img src='./admin/product_images/ $product_img1' class='2 img-fluid rounded img-thumbnail'
                                alt='$product_name'>
                            <span>
                                <a href='productview.php?product_id=$product_id'> $product_name</a></span>
                        </div>

                        <div class='col  md-2'>
                            <a href='' variant='light'>
                                <i class='fas fa-minus-circle'></i>
                            </a> &nbsp;
                            <span>1</span>
                            &nbsp;
                            <a href='' variant='light'>
                                <i class='fas fa-plus-circle'></i>
                            </a>
                        </div>

                        <div class='col  md-3'> $product_values
                        </div>

                     
                        <a class='col md-2' variant='light'>
                            <i class='fas fa-trash'></i>
                        </a>

                    </div>
                </li>
            </ul>
        </div>

        <div class='col md-2'>
            <div class='card ms-5' style='width:20rem; '>
                <div class='card-body'>
                    <ul class='list-group ' variant='flush'>
                        <li class='list-group-item'>
                            <h3> Subtotal (1 item): <br>
                                ₹$total </h3>
                        </li>


                        <li class='list-group-item'>
                            <div class=' d-grid'>
                                <a href='SigninScreen.php' value='' type='button' class='btn btn-p '>Proceed to
                                    Checkout</a>
                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    </div>
    </div> -->

    <!-- -----------------------------old cart screen--------------------------- -->


    <script>
    function openNav() {
        document.getElementById('mySidepanel').style.width = '250px';
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
        document.getElementById('mySidepanel').style.width = '0';
    }
    </script>

</body>

</html>