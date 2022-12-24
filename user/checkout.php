<?php
include('../includes/connect.php');


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


            </li>
            <form class="d-flex " action="search_product.php" method="get" role="search">
                <input class="ms-3 form-control justify-content-end" name="search_data" type="search"
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




    <!-- ---------------------------------------------------------------------------------- -->
    <div class="row px-1">
        <div class="col-md-12">
            <div class="row">
                <?php
if(!isset($_SESSION['username'])){
   include ('SigninScreen.php');
}else{
    include ('./payment.php');
}

            ?>
            </div>
        </div>
    </div>

    <!-- ---------------------------------------------------------------------------------- -->





    <!-- ------------------------footer start------------------------------------------------------------------------------ -->
    <footer id="#footer" class="bg-light footer lg text-center text-white  ">
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