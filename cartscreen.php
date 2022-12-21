<?php
include('includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Screen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



    </style>
</head>

<body>




    <header>
        <nav class="navbar  navbar-expand-lg  variant-dark bg-dark">
            <li><button class="openbtn bg-dark" onclick="openNav()">☰</button>
                <a class="navbar-brand ms-3 bg-dark" href="/ecommerse/index.php"> amazon</a>

                <span class="dropdown">

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
            <form class="d-flex " action="search_product.php" method="get" role="search">
                <input class="form-control justify-content-end" name="search_data" type="search"
                    placeholder="Search Products..." aria-label="Search">
                <!-- <button class="btn btn-outline-warning" type="submit"><i class="fas fa-search"></i></button> -->
                <input type="submit" value="Search" name="search_product" class="btn btn-outline-warning">
            </form>
        </nav>
    </header>



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



    <div>
        <h1 class="my-3 ms-2">Shopping Cart</h1>
        <div class="row ms-3 ">
            <div class="col md-8 ">
                <!-- <div class="alert w-50 ms-3 alert-info" role="alert">
                    Cart is empty. <a href="index.php">Go to shopping</a>
                </div> -->
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row align-items-center ">

                            <div class="col md-4">
                                <img src="shirt.png" class="img-fluid rounded img-thumbnail" alt="">
                                <span> <a href='productview.php'>name</a></span>
                            </div>

                            <div class="col md-3">
                                <a href="" variant="light">
                                    <i class="fas fa-minus-circle"></i>
                                </a> &nbsp;
                                <span> no of</span>
                                &nbsp;
                                <a href="" variant="light">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>

                            <div class="col md-3"> Price</div>

                            <!-- <div class="col md-2"> -->
                            <a class="col md-2" variant="light">
                                <i class="fas fa-trash"></i>
                            </a>
                            <!-- </div> -->
                        </div>
                    </li>
                </ul>
            </div>


            <div class="col md-4">
                <div class="card ms-5" style="width:20rem; ">
                    <div class="card-body">
                        <ul class="list-group " variant="flush">
                            <li class="list-group-item">
                                <h3> Subtotal (1 item): <br>
                                    ₹price</h3>
                            </li>
                            <li class="list-group-item">
                                <div class="ms-3">
                                    <a href="" value="" type="button" class='btn btn-p '>Proceed to
                                        Checkout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>


















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